@extends('frontend.layouts.app')
<style>
    #app-entries {
        border-bottom: 3px solid #66c0f4;
    }
</style>
@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    @include('../../includes/partials/link-check')
    <div class="card" style="margin-top: 25px;">
    @include('../../includes/partials/app-banner')
        <section style="width: 100%; min-height: 250px; border-top: 1px solid #2a475e;">
            <div style="margin: 25px;">
                <div style="margin-bottom: 25px; width: 100%;">
                    <h5 style="display: inline-block; font-weight: bold;">Test data</h5>
                    <a class="btn" style="float: right;">More</a>
                </div>
                @foreach($entries as $entry)
                <article style="margin-bottom: 25px; display: block;">
                    <img style="width: 50px; border-radius: 1px; margin-right: 25px; float: left; border: 2px solid #66c0f4; display: inline-block;" src="/storage/{{$entry->user->avatar_location}}">
                    <div style="display: inline-block; width: calc(100% - 25px - 50px);">
                        <a href="" style="font-weight: bold; font-size: 11pt; display: inline-block; margin-right: 25px;">{{$entry->user->first_name .' '. $entry->user->last_name}}</a>
                        <p style="display: inline-block; font-size: 11pt; color: #a1b9cb; margin-right: 25px;">{{$entry->updated_at->diffForHumans()}}</p>
                        <p style="display: inline-block; font-size: 11pt; color: #171A21; background: {{ $colors[$entry->compatibility['name']] }}">
                        <span style="margin: 10px;">{{ $entry->compatibility['name'] }}</span>
                        </p>
                        <p style="font-size: 11pt; line-height: 175%;">{{$entry->works}}</p>
                        <a href="" style="font-size: 10pt; font-weight: bold;">READ MORE</a>
                    </div>
                </article>
                @endforeach
            </div>
        </section>
        <section style="width: 100%; border-top: 1px solid #2a475e;">
            <div style="margin: 25px;">
                <a href="https://steamspy.com/app/{{$app->path_int}}" style=" margin-right: 25px;">SteamSpy</a>
                <a href="https://steamdb.info/app/{{$app->path_int}}/graphs/">SteamDB</a>
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
