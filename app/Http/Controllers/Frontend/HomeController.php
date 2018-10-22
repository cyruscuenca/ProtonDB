<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\{Entry, App};
use Illuminate\Support\Facades\Cache;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $apps = App::with(['entry' => function($query) {
            $query->whereIn('compatibility_id', [1,2]);
        }])->get();
    
        $sorted= $apps->sortByDesc(function ($app, $key) {
            return count($app["entry"]);
        });

        $sortedApps = $sorted->values()->take(5);

        $app_count = Cache::remember('apps', 5, function () {
            return App::all()->count();
        });

        $entries_count = Cache::remember('entries', 5, function () {
            return Entry::all()->count();
        });

        $flawless_count = Cache::remember('entries', 5, function () {
            return Entry::where('distro_id', [1,2])->count();
        });

        return view('frontend.index', compact('sortedApps'), compact('app_count', 'entries_count', 'flawless_count'));
    }
}
