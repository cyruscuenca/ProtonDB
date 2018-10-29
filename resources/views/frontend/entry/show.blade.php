@extends('frontend.layouts.app')
<style>
    #app-entries {
        border-bottom: 3px solid #2a475e;
    }
</style>
@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <div class="card" style="border: none; background: none;">
    @include('../../includes/partials/app-banner')
            <div style="margin-top: 25px;">
            <section style="width: 100%; min-height: 200px; background: #2a475e; border-radius: 1px;">
                <div style="background: #30516C; height: 50px; width: 100%; margin-top: 25px;">
                    <div style="margin-left: 25px; margin-right: 25px; width: calc(100% - 50px); padding-top: 16px;">
                        <h6>Full Report</h6>
                    </div>
                </div>
                <div style="margin: 25px;">
                    @foreach($entries as $entry)
                    <article style="display: block;">
                        <img style="width: 50px; border-radius: 1px; margin-right: 25px; float: left; border: 2px solid #66c0f4; display: inline-block;" src="/storage/{{$entry->user->avatar_location}}">
                        <div style="display: inline-block; margin-bottom: 25px; width: calc(100% - 25px - 50px);">
                            <a href="" style="color: #c7d5e0; font-weight: bold; font-size: 11.5pt; display: inline-block; margin-right: 25px;">{{$entry->user['first_name'] .' '. $entry->user['last_name']}}</a>
                            <p style="display: inline-block; font-size: 11pt; color: #1b2838; margin-right: 25px; background: {{ $colors[$entry->compatibility['name']] }}">
                            <span style="margin: 10px;">{{ $entry->compatibility['name'] }}</span>
                            </p>
                            <p style="display: inline-block; font-size: 11pt; color: #c7d5e0;">{{$entry->updated_at->diffForHumans()}}</p>
                            <p style="font-size: 11pt; line-height: 175%; color: #c7d5e0;"><span style="font-weight: bold;">Works: </span>{{$entry->works}}</p>
                            <p style="font-size: 11pt; line-height: 175%; color: #c7d5e0;"><span style="font-weight: bold;">Broken: </span>{{$entry->broken}}</p>
                            <p style="font-size: 11pt; line-height: 175%; color: #c7d5e0;"><span style="font-weight: bold;">Tweaks: </span>{{$entry->tweaks}}</p>
                            <p style="font-size: 11pt; line-height: 175%; color: #66c0f4;"><span style="font-weight: bold;">Works After: </span>{{$entry->works_after}}</p>
                            <p style="font-size: 11pt; line-height: 175%; color: #66c0f4;"><span style="font-weight: bold;">Broken After: </span>{{$entry->broken_after}}</p>
                            <div style="width: 100%; background: #30516c; border-radius: 1px;">
                            <div style="padding: 25px;">
                                <img style="display: inline-block; height: 200px; margin-top: -142px; margin-right: 25px; border-radius: 1px;" src="{{asset('img/backend/specs.jpg')}}">
                                <div style="display: inline-block;">
                                    <h6>Tested on this system:</h6>
                                    <p style="font-size: 11pt; line-height: 175%; margin-top: 15px;"><span style="font-weight: bold;">CPU: </span>{{$entry['cpu']}}</p>
                                    <p style="font-size: 11pt; line-height: 175%;"><span style="font-weight: bold;">GPU: </span>{{$entry['gpu']}}</p>
                                    <p style="font-size: 11pt; line-height: 175%;"><span style="font-weight: bold;">Driver: </span>{{$entry->driver_version}}</p>
                                    <p style="font-size: 11pt; line-height: 175%;"><span style="font-weight: bold;">Distro: </span>{{$entry->distro}}</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </section>
            </div>
            <section style="width: 100%; background: #2a475e; height: 75px; border-radius: 1px;">
                <div style="padding: 25px;">
                    <a href="https://steamspy.com/app/{{$app->path_int}}" style="color: #c7d5e0; margin-right: 25px;">SteamSpy</a>
                    <a href="https://steamdb.info/app/{{$app->path_int}}/graphs/" style="color: #c7d5e0;">SteamDB</a>
                    <div style="float: right;">
                        <a href="http://www.facebook.com/sharer.php?u=https://www.steamplay.games/{{$app->path_int}}" target="_blank">
                            <img style="height: 25px; margin-left: 10px;" src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
                        </a>
                        <a href="http://reddit.com/submit?url=https://www.steamplay.games/{{$app->path_int}}" target="_blank">
                            <img style="height: 25px; margin-left: 10px;" src="https://simplesharebuttons.com/images/somacro/reddit.png" alt="Reddit" />
                        </a>
                        <a href="http://vkontakte.ru/share.php?url=https://www.steamplay.games/{{$app->path_int}}" target="_blank">
                            <img style="height: 25px; margin-left: 10px;" src="https://simplesharebuttons.com/images/somacro/vk.png" alt="VK" />
                        </a>
                        <a href="https://twitter.com/share?url=https://www.steamplay.games/{{$app->path_int}}&amp;hashtags=GamingOnLinux" target="_blank">
                            <img style="height: 25px; margin-left: 10px;" src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
                        </a>
                    </div>
                </div>
            </section>
    </div>
@endsection
