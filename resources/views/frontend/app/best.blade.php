@extends('frontend.layouts.app')

@section('title', "Best Apps" . ' | ' . app_name())
<style>
.nav-dashboard .nav-item:nth-child(3) {
    border-right: 3px solid #66c0f4;
}
</style>
@section('content')
@include('../../includes/partials/link-check')
<div style="padding-top: 100px;">
<div class="page-info">
<h5 style="color: #2a475e;">Sorted by best</h5>
<img src="{{asset('img/backend/icons/info.svg')}}">
</div>
    @foreach($sortedApps as $app)
        <a href="http://www.steamplay-wiki.local:8000/app/{{$app->path_int}}/{{$app->path_slug}}">
            <div style="overflow: hidden; border-radius: 1px; margin-top: 25px;">
                <div style="width: 100%; height: 92px;">
                </div>
            </div>
            <div style="border: 1px solid #2a475e; position: relative; width: 100%; height: 92px; margin-top: -92px; z-index: 2;">
                <div style="float: left; display: inline-block; height: 90px; width: 200px; background: linear-gradient(rgba(27, 40, 56, 0.1), rgba(27, 40, 56, 0.1)), url(https://steamcdn-a.akamaihd.net/steam/apps/{{$app->path_int}}/header.jpg); background-size: cover; background-position: center;"></div>
                <div style="display: block; position: relative; float: left; margin-left: 25px;">
                    <p style="font-family: 'Oswald', sans-serif; font-size: 28px; line-height: 100%; color: #1b2838; margin-top: 12px;">{{str_limit($app->name , 44)}}</p>
                    <p style="float: left; font-family: 'Oswald', sans-serif; font-size: 14px; color: #C7D5E0; background:  #43a047; width;">&nbsp;FLAWLESS&nbsp;</p>
                </div>
                <p style="float: right; margin-right: 25px; font-family: 'Oswald', sans-serif; font-size: 28px; line-height: 100%; color: #1b2838; margin-top: 31px;">{{str_limit(count($app->entry) , 5)}}</p>
            </div>
        </a>
    @endforeach
</div>
@endsection
