@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

<style>
.grid-container {
  display: grid;
  height: 100%;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: 1fr;
  grid-gap: 0px;
  grid-template-areas: ". . .";
  color: #2a475e;
  border-radius:
}

.grid-container div h1{
  margin-top: 32px;
}
.grid-container2 {
  display: grid;
  height: 100%;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: 1fr;
  grid-gap: 25px;
  grid-template-areas: ". . .";
  color: #2a475e;
  border-radius:
}
.grid-container3 {
  display: grid;
  height: 370px;
  grid-template-columns: 1.35fr 0.65fr;
  grid-template-rows: 1fr;
  grid-gap: 25px;
  grid-template-areas: ". .";
}
.nav-dashboard li:nth-child(1) {
    border-bottom: 3px solid #66c0f4;
}
</style>

@section('content')
<div class="fullwidth" style="background-image: url({{asset('img/backend/brand/background.jpg')}}); height: 525px;">
    <div class="responsive-width" style="font-family: 'Oswald';">
        <h1 style="font-weight: bold; font-size: 72px; margin-top: 175px;">ProtonDB</h1>
        <p style="font-size: 24px;">The best proton games database on the web</p>
        <img style="width: 575px; margin-top: -225px; margin-right: -112px; float: right;" src="{{asset('img/backend/brand/penguin.svg')}}">
    </div>
</div>
<div class="grid-container2" style="margin-top: 25px; height: 75px; text-align: center; font-size: 22px; color: #C7D5E0; border-radius: 1px; font-family: 'Oswald';">
	<a style="background: #7289da; border-radius: 1px; color: #c7d5e0;" target="_blank" href="https://discord.gg/EuqP7JG">
        <div style="margin-top: 19px;">
            <img style="height: 45px; display: inline-block;" src="{{asset('img/backend/icons/discord.svg')}}">
            <h5 style="display: inline-block;">&nbsp;OUR DISCORD</h4>
        </div>
	</a>
	<a style="background: #ff4500; border-radius: 1px; color: #c7d5e0;" target="_blank" href="https://reddit.com/r/steamplay">
        <div style="margin-top: 19px;">
            <img style="height: 40px; display: inline-block;" src="{{asset('img/backend/icons/reddit.svg')}}">
            <h5 style="display: inline-block;">&nbsp;THE SUBREDDIT</h4>
        </div>
	</a>
	<a style="background: #1da1f2; border-radius: 1px; color: #c7d5e0;" target="_blank" href="https://twitter.com/protondb">
        <div style="margin-top: 19px;">
            <img style="height: 40px; display: inline-block;" src="{{asset('img/backend/icons/twitter.svg')}}">
            <h5 style="display: inline-block;">&nbsp;OUR TWITTER</h4>
        </div>
	</a>
</div>
<div class="grid-container" style="margin: 25px 0; background: #2a475e; height: 150px; text-align: center; font-size: 22px; color: #C7D5E0; border-radius: 1px;">
	<div>
		<h1 style="color: #66c0f4;">{{$app_count}}</h1>
		<p>Apps in Database</p>
	</div>
	<div>
		<h1 style="color: #66c0f4;">{{$entries_count}}</h1>
		<p>App Reports in Database</p>
	</div>
	<div>
		<h1 style="color: #66c0f4;">{{$flawless_count}}</h1>
		<p>Apps Reported as Flawless</p>
	</div>
</div>
<section class="grid-container3">
    <div style="background: #2a475e; border-radius: 1px;">
        <div style="background: #2a475e; height: 50px; width: 100%;">
            <div style="background: #30516C; height: 50px; width: 100%; ">
                <div style="margin-left: 25px; margin-right: 25px; width: calc(100% - 50px); padding-top: 16px;">
                    <h6>About</h6>
                </div>
            </div>
            <div style="margin-left: 25px; margin-right: 25px; width: calc(100% - 50px); padding-top: 8px;">
                <p style="line-height: 200%; margin-top: 18px;">ProtonDB.com is a database of compatibility reports and information for all games in the Steam store. Paste a link in the search bar to check if we have the game in our database. Discord and Battle.net link checking is coming soon™. Register to post a report. Statistics refresh every 5 minutes. The site is maintained by @cyrus_cuenca and is not affiliated with Valve Corp. iOS and Android apps are down the line. Powered by donations and advertisement revenue. Send questions to our twitter, or to: hello@cyruscuenca.com</p>
                <p style="font-style: italic; display: inline-block;">October 18, 2018</p>
                <p style="font-style: italic; display: inline-block; margin-left: 25px;">Posted by: Cyrus Cuenca</p>
            </div>
        </div>
    </div>
    <div style="background: #2a475e; height: 300px; border-radius: 1px;">
        <div style="background: #2a475e; height: 50px; width: 100%;">
            <div style="margin-left: 25px; margin-right: 25px; width: calc(100% - 50px); padding-top: 16px;">
                <h6>Ad</h6>
            </div>
        </div>
    </div>
</section>
    @foreach($sortedApps as $app)
        <a href="http://www.steamplay-wiki.local:8000/app/{{$app->path_int}}/{{$app->path_slug}}">
            <div style="overflow: hidden; border-radius: 1px; margin-top: 25px;">
                <div style="width: 100%; height: 92px;">
                </div>
            </div>
            <div style="background: #2a475e; position: relative; width: 100%; height: 92px; margin-top: -92px; z-index: 2;">
                <div style="float: left; display: inline-block; height: 92px; width: 200px; background: linear-gradient(rgba(27, 40, 56, 0.1), rgba(27, 40, 56, 0.1)), url(https://steamcdn-a.akamaihd.net/steam/apps/{{$app->path_int}}/header.jpg); background-size: cover; background-position: center;"></div>
                <div style="display: block; position: relative; float: left; margin-left: 25px;">
                    <p style="font-family: 'Oswald', sans-serif; font-size: 28px; line-height: 100%; color: #c7d5e0; margin-top: 12px;">{{str_limit($app->name , 44)}}</p>
                    <p style="float: left; font-family: 'Oswald', sans-serif; font-size: 14px; color: #C7D5E0; background:  #43a047; width;">&nbsp;FLAWLESS&nbsp;</p>
                </div>
                <p style="float: right; margin-right: 25px; font-family: 'Oswald', sans-serif; font-size: 28px; line-height: 100%; color: #c7d5e0; margin-top: 31px;">{{str_limit(count($app->entry) , 5)}}</p>
            </div>
        </a>
    @endforeach
@endsection
