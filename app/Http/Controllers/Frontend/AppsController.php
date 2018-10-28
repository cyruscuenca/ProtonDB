<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\{Entry, App, Distro};
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Jobs\CheckLink;
use Queue;
use Redis;

class AppsController extends Controller
{
    public function check(Request $request) 
    {
        $url = $request->link;
        $data = [];
        if(filter_var($url, FILTER_VALIDATE_URL) == true && parse_url($url, PHP_URL_HOST) == "store.steampowered.com" && strlen($url) < 256) {
            $path = (explode('/', parse_url($url, PHP_URL_PATH)));
            foreach ($path as $frag) {
                if (filter_var($frag, FILTER_VALIDATE_INT) == true && App::where('path_int', '=', $frag)->first() == null) {
                    dispatch(new CheckLink($frag));
                    $data['response'] = "Dispatched";
                    $data['steamid'] = $frag;
                }
                if (filter_var($frag, FILTER_VALIDATE_INT) == true && App::where('path_int', '=', $frag)->first() !== null) {
                    $data['response'] = "Dispatched";
                    $data['steamid'] = $frag;
                } 
            }
        } else {
            $data['response'] = "Invalid request";
            $data['steamid'] = "Invalid request";
        }
        return response()->json([
            'response' => $data['response'],
            'steamid' => $data['steamid'],
        ]);
    }

    public function followup(Request $request) 
    {
        $id = $request->id;
        if (filter_var($id, FILTER_VALIDATE_INT) == true && App::where('path_int', '=', $id)->first() == null && strlen($id) < 28) {
            $data = [];
            $data['path_int'] = null;
            $data['path_slug'] = "API cooldown";
        }
        elseif(filter_var($id, FILTER_VALIDATE_INT) == true && App::where('path_int', '=', $id)->first() == true && strlen($id) < 28) {
            $data = []; 
            $data['path_int'] = $id;
            $data['path_slug'] = App::where('path_int', $id)->pluck('path_slug');
        }  else {
            $path = "Invalid request";
        }

        return response()->json([
            'path_int' => $data['path_int'],
            'path_slug' => $data['path_slug'],
        ]);
    }

    public function list()
    {
        $apps = App::latest()->paginate(14);   
       	return view('frontend.app.list')->with('apps', $apps);
    }
    public function stats()
    {
        $app_count = Cache::remember('apps', 5, function () {
            return App::all()->count();
        });

        $entries_count = Cache::remember('entries', 5, function () {
            return Entry::all()->count();
        });

        $flawless_count = Cache::remember('entries', 5, function () {
            return Entry::where('compatibility_id', 1)->count();
        });

        $playable_count = Cache::remember('entries', 5, function () {
            return Entry::where('compatibility_id', 2)->count();
        });

        $barely_playable_count = Cache::remember('entries', 5, function () {
            return Entry::where('compatibility_id', 3)->count();
        });       

        $unplayable_count = Cache::remember('entries', 5, function () {
            return Entry::where('compatibility_id', 4)->count();
        });

        $apps = App::latest()->paginate(14);

        return view('frontend.app.stats', compact('apps'), compact('app_count', 'entries_count', 'flawless_count', 'playable_count', 'barely_playable_count', 'unplayable_count'));
    }
    public function best()
    {
        $apps = App::with(['entry' => function($query) {
            $query->whereIn('compatibility_id', [1,2]);
        }]);
        $apps->withCount('entry'); // or withCount('entires') ? not sure how magic laravel's inflector is there
        $apps->orderByDesc('entry_count'); // "_count" appended to relation afaik
        $sortedApps = $apps->paginate(10);
        return view('frontend.app.best', compact('sortedApps'));
    }
    public function search()
    {
        $app = App::latest()->paginate(14);   
       	return view('frontend.app.search')->with('app', $app);
    }
    public function show($path_int)
    {
        $app = App::where('path_int', $path_int)->first();

        // Check if app is native
        if($app->linux_min_spec != null) {
            $app->nativeOrNot = "Yes";
        } else {
            $app->nativeOrNot = "No";
        }

        $entries = Entry::where('app_id', $app->id);

        // Get most common Linux distro
        $commonDistro = Entry::where('app_id', $app->id)->select('distro_id')
                        ->groupBy('distro_id')
                        ->orderByRaw('COUNT(*) DESC')
                        ->limit(1)
                        ->get();
        
        // Get best specs
        $bestGPU = Entry::where('app_id', $app->id)->select('gpu')
                        ->groupBy('gpu')
                        ->orderByRaw('COUNT(*) DESC')
                        ->limit(1)
                        ->get();
        $bestCPU = Entry::where('app_id', $app->id)->select('cpu')
                        ->groupBy('cpu')
                        ->orderByRaw('COUNT(*) DESC')
                        ->limit(1)
                        ->get();
        $bestDriver = Entry::where('app_id', $app->id)->select('driver_version')
                        ->groupBy('driver_version')
                        ->orderByRaw('COUNT(*) DESC')
                        ->limit(1)
                        ->get();
        $bestDistro = $entries->where('app_id', $app->id)->select('distro_id')
                        ->groupBy('distro_id')
                        ->orderByRaw('COUNT(*) DESC')
                        ->limit(1)
                        ->get();
        $bestDistro = $entries->where('id', $bestDistro->first())->pluck('name');

        $entries = Entry::where('app_id', $app->id);
        $colors = [
            'Flawless' => '#28b463',
            'Playable' => '#80a043',
            'Barely playable' => '#d4ac0d',
            'Not playable' => '#ba4a00',
            'Does not start' => '#c0392b',
        ];
        return view('frontend.app.show')
                ->with('app', $app)
                ->with('entries', $entries->latest()->paginate(3))
                ->with('colors', $colors)
                ->with('commonDistro', $commonDistro)
                ->with('bestGPU', $bestGPU)
                ->with('bestCPU', $bestCPU)
                ->with('bestDriver', $bestDriver)
                ->with('bestDistro', $bestDistro);
    }
    public function requirements($path_int)
    {
        $app = App::where('path_int', $path_int)->first();

        return view('frontend.app.requirements')
                ->with('app', $app);
    }
}