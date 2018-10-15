<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\{Entry, App, Distro};
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppsController extends Controller
{
    public function check(Request $request) 
    {
        $url = $request->link;                
        if(filter_var($url, FILTER_VALIDATE_URL) !== false && parse_url($url, PHP_URL_HOST) == "store.steampowered.com" && strlen($url) < 256) {
            $path = (explode('/', parse_url($url, PHP_URL_PATH)));
            foreach ($path as &$frag) {
                if (filter_var($frag, FILTER_VALIDATE_INT) !== false && App::where('path_int', '=', $frag)->first() == null) {
                    $api_url = "https://store.steampowered.com/api/appdetails?appids=";
                    $json = file_get_contents($api_url . $frag);
                    $app_page = collect(json_decode($json,true));
                    $data['name'] = $app_page[$frag]['data']['name'];
                    $data['path_int'] = $frag;
                    $data['path_slug'] = str_limit(str_slug($data['name']), 128);
                    if(isset($app_page[$frag]['data']['short_description'])) {
                        $data['description'] = $app_page[$frag]['data']['short_description'];
                    }
                    if(isset($app_page[$frag]['data']['pc_requirements']['minimum'])) {
                        $data['pc_min_spec'] = $app_page[$frag]['data']['pc_requirements']['minimum'];
                    }
                    if(isset($app_page[$frag]['data']['pc_requirements']['recommended'])) {
                        $data['pc_recom_spec'] = $app_page[$frag]['data']['pc_requirements']['recommended'];
                    }
                    if(isset($app_page[$frag]['data']['linux_requirements']['minimum'])) {
                        $data['linux_min_spec'] = $app_page[$frag]['data']['linux_requirements']['minimum'];
                    }
                    if(isset($app_page[$frag]['data']['linux_requirements']['recommended'])) {
                        $data['linux_recom_spec'] = $app_page[$frag]['data']['linux_requirements']['recommended'];
                    }
                    if($app_page[$frag]['data']['release_date']['coming_soon'] == false) {
                        if(isset($app_page[$frag]['data']['release_date']['date'])) {
                            $data['release_date'] = $app_page[$frag]['data']['release_date']['date'];
                        }
                    }
                    else {
                        $data['release_date'] = "Coming soon";
                    }
                    $app = App::create($data);
                }                    
            }
        }
        else {
            $path = "Invalid link";
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
        $apps = App::latest()->paginate(14);
       	return view('frontend.app.list')->with('apps', $apps);
    }
    public function best()
    {
        $apps = App::with(['entry' => function($query) {
            $query->whereIn('compatibility_id', [1,2]);
        }])->get();
    
        $sorted= $apps->sortByDesc(function ($app, $key) {
            return count($app["entry"]);
        });
    
        $sortedApps = $sorted->values()->all();
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
        $bestGPU = Entry::where('app_id', $app->id)->select('gpu_id')
                        ->groupBy('gpu_id')
                        ->orderByRaw('COUNT(*) DESC')
                        ->limit(1)
                        ->get();
        $bestCPU = Entry::where('app_id', $app->id)->select('cpu_id')
                        ->groupBy('cpu_id')
                        ->orderByRaw('COUNT(*) DESC')
                        ->limit(1)
                        ->get();
        $bestDriver = Entry::where('app_id', $app->id)->select('driver_version')
                        ->groupBy('driver_version')
                        ->orderByRaw('COUNT(*) DESC')
                        ->limit(1)
                        ->get();
        $bestDistro = Entry::where('app_id', $app->id)->select('distro_id')
                        ->groupBy('distro_id')
                        ->orderByRaw('COUNT(*) DESC')
                        ->limit(1)
                        ->get();
        $bestDistro = Distro::where('id', $bestDistro->first()->distro_id)->pluck('name');

        $colors = [
            'Flawless' => '#28b463',
            'Playable' => '#80a043',
            'Barely playable' => '#d4ac0d',
            'Not Playable' => '#ba4a00',
            'Does not start' => '#c0392b',
        ];

        return view('frontend.app.show')
                ->with('app', $app)
                ->with('entries', $entries->latest()->paginate(4))
                ->with('colors', $colors)
                ->with('commonDistro', $commonDistro)
                ->with('bestGPU', $bestGPU)
                ->with('bestCPU', $bestCPU)
                ->with('bestDriver', $bestDriver)
                ->with('bestDistro', $bestDistro);
    }
}