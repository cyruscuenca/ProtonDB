@extends('frontend.layouts.app')

@section('title', "Latest Apps" . ' | ' . app_name())

@section('content')
@include('../../includes/partials/link-check')
<div>
    @foreach($app as $app)
        <a href="http://www.steamplay-wiki.local:8000/app/{{$app->path_int}}/{{$app->path_slug}}">
            <div style="overflow: hidden; border-radius: 1px; margin-top: 25px;">
                <div style="width: 100%; height: 92px; background: linear-gradient(to right, rgba(52, 168, 83, .1), rgba(27, 40, 56, 1)), url(https://steamcdn-a.akamaihd.net/steam/apps/{{$app->path_int}}/header.jpg); background-size: cover; background-position: center; -webkit-filter: blur(25px); -moz-filter: blur(25px); -o-filter: blur(25px); -ms-filter: blur(25px); filter: blurheight(25px);">
                </div>
            </div>
            <div style="border: 1px solid #2a475e; position: relative; width: 100%; height: 92px; margin-top: -92px; z-index: 2;">
                <div style="float: left; display: inline-block; height: 90px; width: 200px; background: linear-gradient(rgba(27, 40, 56, 0.25), rgba(27, 40, 56, 0.25)), url(https://steamcdn-a.akamaihd.net/steam/apps/{{$app->path_int}}/header.jpg); background-size: cover; background-position: center;"></div>
                <div style="display: block; position: relative; float: left; margin-left: 25px;">
                    <p style="font-family: 'Oswald', sans-serif; font-size: 28px; line-height: 100%; color: #C7D5E0; margin-top: 12px;">{{str_limit($app->name , 44)}}</p>
                    <p style="float: left; font-family: 'Oswald', sans-serif; font-size: 14px; color: #C7D5E0; background: green; width;">&nbsp;FLAWLESS&nbsp;</p>
                </div>
            </div>
        </a>
    @endforeach
</div>
@endsection
