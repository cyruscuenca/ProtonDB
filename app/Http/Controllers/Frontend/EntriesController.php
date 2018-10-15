<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Entry, App, Distro, Cpu, Gpu, Compatibility};
use Session;
use Illuminate\Support\Facades\Auth;

class EntriesController extends Controller
{
    public function create($path_int)
    {
        $distros = Distro::all()->pluck('name');
        $cpus = Cpu::all()->pluck('name');
        $gpus = Gpu::all()->pluck('name');
        $compatibilities = Compatibility::all()->pluck('name');
        $app = App::where('path_int', $path_int)->first();
       	return view('frontend.entry.create', compact('distros', 'cpus', 'gpus', 'compatibilities'))->with('app', $app);
    }

    public function store(Request $request)
    {
        $rules = [
            'distro_id' => ['required'],
            'distro_version' => ['required'],
            'cpu_id' => ['required'],
            'gpu_id' => ['required'],
            'app_id' => ['required'],
            'driver_version' => ['required'],
            'compatibility_id' => ['required'],
            'works' => ['required', 'min:25', 'max:350'],
            'broken' => ['required', 'min:25', 'max:350'],
            'tweaks' => ['required', 'min:25', 'max:500'],
            'works_after' => ['required', 'min:25', 'max:350'],
            'broken_after' => ['required', 'min:25', 'max:350'],
        ];
        $this->validate($request, $rules);
        $data = request()->all();
        $data['user_id'] = Auth::user()->id;

        $entry = Entry::create($data);

        Session::flash('flash_message', 'Your entry has been submitted successfully!');
        return back();
    }
    public function show($slug)
    {
        $entry = Entry::whereSlug($slug)->first();
        return view('frontend.entry.show', compact('entry'));
    }
    public function list($path_int)
    {
        $app = App::where('path_int', $path_int)->first();
        $entries = Entry::where('app_id', $app->id)->paginate(8);
        $colors = [
            'Flawless' => '#28b463',
            'Playable' => '#80a043',
            'Barely playable' => '#d4ac0d',
            'Not Playable' => '#ba4a00',
            'Does not start' => '#c0392b',
        ];
        return view('frontend.entry.list')->with('app', $app)->with('entries', $entries)->with('colors', $colors);
    }
    public function destroy($id)
    {
        $destroyedEntry = Entry::onlyTrashed()->findOrFail($id);

        if ($destroyedEntry->photo) {
            unlink('images/' . $destroyedEntry->photo->photo);
            $destroyedEntry->photo()->delete('photo');
        }

        $destroyedEntry->forceDelete($destroyedEntry);
        return back();
    }
}
