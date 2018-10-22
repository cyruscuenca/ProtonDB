@extends('frontend.layouts.app')
<style>
    #app-overview {
        border-bottom: 3px solid #66c0f4;
    }
</style>
<style>
.fullwidth{
      width: calc(100vw - 6px);
      position: relative;
      margin-left: -50vw;
      overflow: hidden; 
      height: 350px;
      border-bottom: none;
      margin-top: -25px;
      left: 50%;
}
.grid-container {
  display: grid;
  height: 100%;
  grid-template-columns: 1.5fr 0.5fr;
  grid-template-rows: 1fr;
  grid-gap: 25px;
  grid-template-areas: " ";
}

</style>
@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <div class="card" style="border: none; background: none;">
        @include('../../includes/partials/app-banner')
    <div class="grid-container" style="padding-top: 25px;">
        <div>
            <section style="width: 100%; min-height: 200px; background: #2a475e; margin-bottom: 25px; border-radius: 2px;">
                <div style="background: #2a475e; height: 50px; width: 100%; margin-top: 25px;">
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
            <section style="width: 100%; background: #2a475e; border-radius: 2px;">
                <div style="background: #2a475e; height: 50px; width: 100%;">
                     <div style="margin-left: 25px; margin-right: 25px; width: calc(100% - 50px); padding-top: 16px;">
                        <h6>System Requirements</h6>
                    </div>
                </div>
                <div class="card" style="margin: 25px; border-radius: 2px; color: #c7d5e0; background: #2a475e; display: inline-block; list-style-type: none; padding: 0; width: 350px; line-height: 185%; font-size: 9.4pt;">
                    <div style="margin: 26px; margin-bottom: 6px;">
                    @if (is_null($app->pc_min_spec))
                        No minimum specs are specefied
                    @endif
                    {!!str_limit($app->pc_min_spec, 700)!!} 
                    <a href="https://store.steampowered.com/app/{{$app->path_int}}" style="float: right; margin-bottom: 10px; color: #66c0f4;">All requirements</a>
                    </div>
                </div>
            </section>
            <section style="width: 100%; background: #2a475e; height: 75px; margin-top: 25px; border-radius: 2px;">
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
        <div style="margin-top: 25px;">
            <div style="background: #2a475e; height: 50px; width: 100%;">
                <div style="margin-left: 25px; margin-right: 25px; width: calc(100% - 50px); padding-top: 16px;">
                    <h6>Overview</h6>
                </div>
            </div>
            <section style="width: 100%; min-height: 250px; background: #2a475e;">
                    <div style="padding: 25px;">
                        <p>Compatibility:</p>
                        <p>Entries: {{$entries->count()}}</p>
                        <p>Linux Native?: {{$app->nativeOrNot}}</p>
                        <p>Most common distro: {{trim($commonDistro, '[""]')}}</p>
                    </div>
            </section>
            <section style="width: 100%; min-height: 250px; background: #2a475e; margin-top: 25px; border-radius: 2px;">
                    <div style="background: #2a475e; height: 50px; width: 100%; margin-top: 25px;">
                        <div style="margin-left: 25px; margin-right: 25px; width: calc(100% - 50px); padding-top: 16px;">
                            <h6>Best Componets</h6>
                        </div>
                    </div>
                    <div style="padding: 25px; color: #c7d5e0;">
                        <p><span style="font-weight: bold;">Best GPU:</span> {{trim($bestGPU, '[""]')}}</p>
                        <p><span style="font-weight: bold;">Best CPU:</span> {{trim($bestCPU, '[""]')}}</p>
                        <p><span style="font-weight: bold;">Best Distro:</span> {{trim($bestDistro, '[""]')}}</p>
                        <p><span style="font-weight: bold;">Best GPU driver:</span> {{trim($bestDriver, '[""]')}}</p>
                    </div>
            </section>
        </div>
        </div>
    </div>
@endsection
