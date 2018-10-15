@extends('frontend.layouts.app')
<style>
    #app-overview {
        border-bottom: 3px solid #2a475e;
    }
</style>
@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    @include('../../includes/partials/link-check')
    <div class="card" style="margin-top: 100px; border: none; background: none;">
        @include('../../includes/partials/app-banner')
        <section style="width: 100%; min-height: 250px; border: 1px solid #2a475e; margin: 25px 0;">
            <div style="margin: 25px;">
                <h5 style="display: inline-block; color: #2a475e;">Statistics</h5>
                <a class="btn" style="float: right;">More</a>
            </div>
           <div style="margin: 25px; height: 50px; width: calc(100% - 50px); border: 1px solid #2A475E; color: #2A475E; border-radius: 2px;">
                <div style="padding-top: 14px;">
                    <p style="display: inline-block; margin-left: 25px;">Compatibility:</p>
                    <p style="display: inline-block; margin-left: 25px;">Entries: {{$entries->count()}}</p>
                    <p style="display: inline-block; margin-left: 25px;">Linux Native?: {{$app->nativeOrNot}}</p>
                    <p style="display: inline-block; margin-left: 25px;">Most common distro: {{trim($commonDistro, '[""]')}}</p>
                </div>
           </div>
           <div style="width: calc(100% - 50px); margin: 0 25px; margin-bottom: 25px;">
                <div style="border-radius: 2px; height: 200px; display: inline-block; float: left; height: 200px; width: 140px; background-image: url({{asset('img/backend/specs.jpg')}}); background-size: cover;"></div>
                <div style="display: inline-block; height: 200px; margin-left: 25px; color: #2A475E;">
                    <p><span style="font-weight: bold;">Best GPU:</span> {{$bestGPU->first()->gpu_id}}</p>
                    <p><span style="font-weight: bold;">Best CPU:</span> {{$bestCPU->first()->cpu_id}}</p>
                    <p><span style="font-weight: bold;">Best Distro:</span> {{trim($bestDistro, '[""]')}}</p>
                    <p><span style="font-weight: bold;">Best GPU driver:</span> {{$bestDriver->first()->driver_version}}</p>
                </div>
           </div>
        </section>
        
        <section style="width: 100%; min-height: 250px; border: 1px solid #2a475e;">
            <div style="margin: 25px;">
                <div style="margin-bottom: 25px; width: 100%;">
                    <h5 style="display: inline-block; color: #2a475e;">Test data</h5>
                    <a class="btn" style="float: right;">More</a>
                </div>
                @foreach($entries as $entry)
                <article style="margin-bottom: 25px; display: block;">
                    <img style="width: 50px; border-radius: 1px; margin-right: 25px; float: left; border: 2px solid #66c0f4; display: inline-block;" src="/storage/{{$entry->user->avatar_location}}">
                    <div style="display: inline-block; width: calc(100% - 25px - 50px);">
                        <a href="" style="color: #367097; font-weight: bold; font-size: 11.5pt; display: inline-block; margin-right: 25px;">{{$entry->user['first_name'] .' '. $entry->user['last_name']}}</a>
                        <p style="display: inline-block; font-size: 11pt; color: #1B2838; margin-right: 25px; background: {{ $colors[$entry->compatibility['name']] }}">
                        <span style="margin: 10px;">{{ $entry->compatibility['name'] }}</span>
                        </p>
                        <p style="display: inline-block; font-size: 11pt; color: #2a475e;">{{$entry->updated_at->diffForHumans()}}</p>
                        <p style="font-size: 11pt; line-height: 175%; color: #2a475e;"><span style="font-weight: bold;">Works: </span>{{$entry->works}}</p>
                        <p style="font-size: 11pt; line-height: 175%; color: #2a475e;"><span style="font-weight: bold;">Broken: </span>{{$entry->works}}</p>
                        <a href="" style="font-size: 10pt; font-weight: bold; color: #367097;">TWEAKS</a>
                    </div>
                </article>
                @endforeach
            </div>
        </section>

        <section style="width: 100%; border-top: 1px solid #2A475E; border: 1px solid #2a475e; margin: 25px 0;">
            <div style="width: calc(100% - 50px); margin: 25px;">
                <h5 style="display: inline-block; color: #2a475e;">System Requirements</h5>
                <a class="btn" style="float: right;">More</a>
            </div>
            <div class="card" style="margin: 25px; margin-top: 0; border-radius: 2px; color: #2A475E; background: #C7D5E0; display: inline-block; list-style-type: none; padding: 0; width: 350px; line-height: 185%; font-size: 9.4pt;">
                <div style="margin: 26px; margin-bottom: 6px;">
                @if (is_null($app->pc_min_spec))
                    No minimum specs are specefied
                @endif
                {!!str_limit($app->pc_min_spec, 725)!!} 
                <a href="https://store.steampowered.com/app/{{$app->path_int}}" style="float: right; margin-bottom: 10px; color: #366F96;">All requirements</a></div>
            </div>
        </section>
        <section style="width: 100%; border-top: 1px solid #2a475e; border: 1px solid #2a475e;">
            <div style="margin: 25px;">
                <a href="https://steamspy.com/app/{{$app->path_int}}" style="color: #366F96; margin-right: 25px;">SteamSpy</a>
                <a href="https://steamdb.info/app/{{$app->path_int}}/graphs/" style="color: #366F96;">SteamDB</a>
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
