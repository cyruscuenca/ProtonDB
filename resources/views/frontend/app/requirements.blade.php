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
            <div style="margin-top: 50px;">
            <section style="width: 100%; background: #2a475e; border-radius: 2px;">
                <div style="background: #30516C; height: 50px; width: 100%;">
                     <div style="margin-left: 25px; margin-right: 25px; width: calc(100% - 50px); padding-top: 16px;">
                        <h6>PC Requirements</h6>
                    </div>
                </div>
                <div style="width: 100%;">
                    <div class="card" style="display: inline-block; margin: 25px; position: absolute; border-radius: 2px; color: #c7d5e0; background: #30516C; list-style-type: none; padding: 0; width: 350px; line-height: 185%; font-size: 9.4pt;">
                        <div style="margin: 26px; margin-bottom: 6px;">
                        @if (is_null($app->pc_min_spec))
                            No minimum specs are specefied
                        @endif
                        {!!str_limit($app->pc_min_spec, 700)!!} 
                        <a href="https://store.steampowered.com/app/{{$app->path_int}}" style="float: right; margin-bottom: 10px; color: #66c0f4;">All requirements</a>
                        </div>
                    </div>
                    <div class="card" style="display: inline-block; margin: 25px; margin-left: 400px; border-radius: 2px; color: #c7d5e0; background: #30516C; list-style-type: none; padding: 0; width: 350px; line-height: 185%; font-size: 9.4pt;">
                        <div style="margin: 26px; margin-bottom: 6px;">
                        @if (is_null($app->pc_recom_spec))
                            No recommended specs are specefied
                        @endif
                        {!!str_limit($app->pc_recom_spec, 700)!!} 
                        <a href="https://store.steampowered.com/app/{{$app->path_int}}" style="float: right; margin-bottom: 10px; color: #66c0f4;">All requirements</a>
                        </div>
                    </div>
                </div>
            </section>
            </div>
            <div style="margin-top: 25px;">
            <section style="width: 100%; background: #2a475e; border-radius: 2px;">
                <div style="background: #30516C; height: 50px; width: 100%;">
                     <div style="margin-left: 25px; margin-right: 25px; width: calc(100% - 50px); padding-top: 16px;">
                        <h6>Linux Requirements</h6>
                    </div>
                </div>
                <div style="width: 100%;">
                    <div class="card" style="display: inline-block; margin: 25px; position: absolute; border-radius: 2px; color: #c7d5e0; background: #30516C; list-style-type: none; padding: 0; width: 350px; line-height: 185%; font-size: 9.4pt;">
                        <div style="margin: 26px; margin-bottom: 6px;">
                        @if (is_null($app->linux_min_spec))
                            No minimum specs are specefied
                        @endif
                        {!!str_limit($app->linux_min_spec, 700)!!} 
                        <a href="https://store.steampowered.com/app/{{$app->path_int}}" style="float: right; margin-bottom: 10px; color: #66c0f4;">All requirements</a>
                        </div>
                    </div>
                    <div class="card" style="display: inline-block; margin: 25px; margin-left: 400px; border-radius: 2px; color: #c7d5e0; background: #30516C; list-style-type: none; padding: 0; width: 350px; line-height: 185%; font-size: 9.4pt;">
                        <div style="margin: 26px; margin-bottom: 6px;">
                        @if (is_null($app->linux_recom_spec))
                            No recommended specs are specefied
                        @endif
                        {!!str_limit($app->linux_recom_spec, 700)!!} 
                        <a href="https://store.steampowered.com/app/{{$app->path_int}}" style="float: right; margin-bottom: 10px; color: #66c0f4;">All requirements</a>
                        </div>
                    </div>
                </div>
            </section>
            </div>
            <section style="margin-top: 25px; width: 100%; background: #2a475e; height: 75px; border-radius: 1px;">
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
