@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))
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
.nav-dashboard .nav-item:nth-child(5) {
    border-right: 3px solid #66c0f4;
}
</style>
@section('content')
            <div class="card">
                <div style="width: 100%; height: 225px; background-image: url({{asset('img/backend/crypto.jpg')}}); background-position: center; background-size: cover;">
                </div>
                <img style="height: 100px; width: 400px; position: absolute; margin-top: 65px; left: calc(50% - 200px);" src="{{asset('img/backend/donate.png')}}">
                <div class="card-body">
                    <p>Thank you for considering a donation! I have not set up Adsense, so I depend on donations to cover server costs &nbsp;🙁&nbsp; PayPal support is coming soon™</p>
                <ul>
                    <li><p>Ethereum: 0xCB6e77de5D81C7C80f2a5211B99F9D579c90838C</p></li>
                    <li><p>Bitcoin: 1J9yLaxpvETfcLMw3n476GrxM9Kj3LiRyL</p></li>
                    <li><p>Bitcoin Cash: qz7zcl5d382h0zvqk7wq8a54r7w8jafc5ujvl29w6j</p></li>                   
                </ul>
                </div><!--card-body-->
            </div><!--card-->
@endsection
