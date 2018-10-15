<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function timeline()
    {
        return view('frontend.timeline');
    }
    public function donate()
    {
        return view('frontend.donate');
    }
}
