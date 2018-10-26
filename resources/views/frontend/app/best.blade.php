@extends('frontend.layouts.app')

@section('title', "Best Apps" . ' | ' . app_name())
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
.nav-dashboard li:nth-child(2) {
    border-bottom: 3px solid #66c0f4;
}
</style>
@section('content')
<div class="fullwidth" style="background-image: url({{asset('img/backend/brand/background.jpg')}}); height: 215px;">
    <div class="responsive-width" style="font-family: 'Oswald'; text-align: center;">
        <h1 style="font-weight: bold; font-size: 72px; margin-top: 64px;">BEST</h1>
    </div>
</div>
<div>
<div class="page-info">
<h5 style="color: #c7d5e0;">Sorted by best</h5>
<img src="{{asset('img/backend/icons/info.svg')}}">
</div>
    @foreach($sortedApps as $app)
        <a href="http://104.248.185.46/app/{{$app->path_int}}/{{$app->path_slug}}">
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
<div class="text-center pagination" style="width: 100%;">
    {{ $sortedApps->links() }}
</div>
@endsection