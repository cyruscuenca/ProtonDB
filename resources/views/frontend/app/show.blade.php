@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    @include('../../includes/partials/link-check')
    <div class="card" style="margin-top: 25px;">
        <div style="overflow: hidden;">
            <div style="background: linear-gradient(rgba(27, 40, 56, 0.12), rgba(27, 40, 56, 0.60)), url(https://steamcdn-a.akamaihd.net/steam/apps/{{$app->path_int}}/header.jpg); background-size: cover; background-position: center; width: 100%; height: 350px; -webkit-filter: blur(3px); -moz-filter: blur(3px); -o-filter: blur(3px); -ms-filter: blur(3px); filter: blur(3px);">
            </div>
        </div>
        <div style="width: 100%; height: 350px; position: absolute;">
            <div style="margin: 25px;">
                <div style="width: 350px; height: 300px; display: inline-block; background: rgba(27, 40, 56, 0.94); border-radius: 2px; float: right;">
                    <div style="margin: 20px;">
                        <h5 style="font-weight: bold; line-height: 150%;">{{$app->name}}</h5>
                        <div style="line-height: 195%; font-size: 11pt; color: #96B0C5;">
                        @if (is_null($app->description))
                            No description
                        @endif
                        {!!str_limit($app->description, 270)!!}
                        </div> <a href="https://store.steampowered.com/app/{{$app->path_int}}" style="position: absolute; bottom: 45px; right: 50px; font-size: 11pt;">Store page</a>
                    </div>
                </div>
                <div style="display: inline-block; float: left; width: 350px;">
                    <img style="border-radius: 2px; width: 350px; margin-bottom: 15px;" src="https://steamcdn-a.akamaihd.net/steam/apps/{{$app->path_int}}/header.jpg">
                    <p style="font-style: italic; font-weight: bold; display: block; margin-bottom: 8px; font-size: 11pt;" href="https://store.steampowered.com/app/{{$app->path_int}}">Release date: {{$app->release_date}}</p>
                    <p style="font-style: italic; font-weight: bold; font-size: 11pt;" href="https://store.steampowered.com/app/{{$app->path_int}}">Updated {{$app->updated_at->diffForHumans()}}</p>
                </div>
            </div>
        </div>
        <div class="card" style="min-height: 250px; border-radius: 2px; color: #96B0C5; list-style-type: none; padding: 0; background: #2a475e; width: 350px; margin: 25px; line-height: 185%; font-size: 9.4pt;">
            <div style="margin: 26px; margin-bottom: 6px;">
            @if (is_null($app->pc_min_spec))
                No minimum specs are specefied
            @endif
            {!!str_limit($app->pc_min_spec, 800)!!} 
            <a href="https://store.steampowered.com/app/{{$app->path_int}}" style="float: right;">All requirements</a></div>
        </div>
        <div style="width: 100%; min-height: 1200px; border-top: 1px solid #2a475e;">
            <div style="margin: 25px;">
                <a href="{{route('frontend.entry.create', $app->path_int)}}">Post your own results</a>
            </div>
        </div>
    </div>

@endsection
