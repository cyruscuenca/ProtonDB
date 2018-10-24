@extends('frontend.layouts.app')
<style>
    #app-entries {
        border-bottom: 3px solid #2a475e;
    }
</style>
<style>
.pagination>li>a, .pagination>li>span { background: #2a475e; border-radius: 50% !important;margin: 0 5pt; border: 1pt solid #2a475e; height: 32pt; width: 32pt; color: #c7d5e0; font-size: 12pt;}
.pagination > .active > a,
.pagination > .active > a:focus,
.pagination > .active > a:hover,
.pagination > .active > span,
.pagination > .active > span:focus,
.pagination > .active > span:hover {
	background: #2a475e;
	border: 1pt solid #2a475e;
}
.page-link {
    background: #2a475e !important;
    border: 1px solid #2a475e !important;
    color: #c7d5e0 !important;
    margin-top: 25px !important;
}
.nav-dashboard li:nth-child(3) {
    border-bottom: 3px solid #66c0f4;
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
                        <h6>Test Reports</h6>
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
                            <p style="font-size: 11pt; line-height: 175%; color: #c7d5e0;"><span style="font-weight: bold;">Broken: </span>{{$entry->works}}</p>
                            <a href="http://www.steamplay-wiki.local:8000/app/{{$app->path_int}}/entry/{{$entry->id}}" style="font-size: 10pt; font-weight: bold; color: #c7d5e0;">TWEAKS</a>
                        </div>
                    </article>
                    @endforeach
                </div>
            </section>
            </div>
            <div class="text-center pagination" style="width: 100%; margin-bottom: 15px; margin-top: -22px;">
                {{ $entries->links() }}
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
