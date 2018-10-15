@extends('frontend.layouts.app')

@section('title', "Stats" . ' | ' . app_name())
<style>
.timeline-list {
     float: left;
     display: inline-block;
}
.timeline-list li {
    margin-top: 20px;
    background: #2a475e;
    width: 275px;
    text-align: center;
    border-radius: 2px;
}
.timeline-list li p {
    padding: 8px;
}
.nav-dashboard .nav-item:nth-child(1) {
    border-right: 3px solid #66c0f4;
}
</style>
@section('content')
            <div class="card">
                <div style="width: 100%; height: 225px; background-image: url({{asset('img/backend/crypto.jpg')}}); background-position: center; background-size: cover;">
                </div>
                <img style="height: 100px; width: 400px; position: absolute; margin-top: 65px; left: calc(50% - 200px);" src="{{asset('img/backend/timeline.png')}}">
                <div class="card-body">
                </div><!--card-body-->
            </div><!--card-->
@endsection
