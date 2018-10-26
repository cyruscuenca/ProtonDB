<div class="fullwidth">
    <div style="background: linear-gradient(rgba(27, 40, 56, .5), rgba(27, 40, 56, .5)), url(https://steamcdn-a.akamaihd.net/steam/apps/{{$app->path_int}}/header.jpg); background-size: cover; background-position: center; width: calc(100% + 10px); height: 360px; margin-top: -5px; margin-left: -5px; -webkit-filter: blur(4px); -moz-filter: blur(4px); -o-filter: blur(4px); -ms-filter: blur(4px); filter: blur(4px);">
    </div>
</div>
<div style="width: 100%; height: 350px; position: absolute;">
        <div style="width: 350px; height: 300px; display: inline-block; background: rgba(42, 71, 94, 1); border-radius: 1px; float: right;">
            <div style="margin: 25px;">
                    <h5 style="font-weight: bold; line-height: 150%; font-family: 'Oswald';">{{$app->name}}</h5>
                    <div style="line-height: 195%; font-size: 11pt; color: #96B0C5;">
                    @if (is_null($app->description))
                        No description
                    @endif
                    {!!str_limit($app->description, 200)!!}
                    </div> <a href="https://store.steampowered.com/app/{{$app->path_int}}" style="position: absolute; bottom: 70px; right: 50px; font-size: 11pt;">Store page</a>
                </div>
            </div>
        <div style="display: inline-block; float: left; width: 350px;">
            <img style="border-radius: 2px; width: 350px; margin-bottom: 15px;" src="https://steamcdn-a.akamaihd.net/steam/apps/{{$app->path_int}}/header.jpg">
            <p style="font-style: italic; font-weight: bold; display: block; margin-bottom: 8px; font-size: 11pt;" href="https://store.steampowered.com/app/{{$app->path_int}}">Release date: {{$app->release_date}}</p>
            <p style="font-style: italic; font-weight: bold; font-size: 11pt;" href="https://store.steampowered.com/app/{{$app->path_int}}">Updated {{$app->updated_at->diffForHumans()}}</p>
        </div>
</div>
<div class="fullwidth" style="height: 50px; background: #2a475e; top: 25px;">
        <ul class="app-banner-menu" style="margin: 0; padding: 0; font-size: 13pt; height: 100%; text-align: center; font-family: 'Oswald';">
            <li id="app-overview" style="display: inline-block; margin: 0 25px; height: 100%;"><a style="line-height: 285%; color: #c7d5e0;" href="http://104.248.185.46/app/{{$app->path_int}}/{{$app->path_slug}}">Overview</a></li>
            <li id="app-requirements" style="display: inline-block; margin: 0 25px; height: 100%;"><a style="line-height: 285%; color: #c7d5e0;" href="http://104.248.185.46/app/{{$app->path_int}}/meta/system-requirements">System requirements</a></li>
            <li id="app-entries" style="display: inline-block; margin: 0 25px; height: 100%;"><a style="line-height: 285%; color: #c7d5e0;" href="{{route('frontend.entry.list', $app->path_int )}}">Entries</a></li>
            <li id="app-add-data" style="display: inline-block; margin: 0 25px; height: 100%;"><a style="line-height: 285%; color: #c7d5e0;" href="{{route('frontend.entry.create', $app->path_int)}}">Add test data</a></li>
        </ul>
</div>