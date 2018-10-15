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
.nav-dashboard .nav-item:nth-child(4) {
    border-right: 3px solid #66c0f4;
}
</style>
@section('content')
            <div class="card">
                <div style="width: 100%; height: 225px; background-image: url({{asset('img/backend/keyboard.jpg')}}); background-position: center; background-size: cover;">
                </div>
                <img style="height: 100px; width: 400px; position: absolute; margin-top: 65px; left: calc(50% - 200px);" src="{{asset('img/backend/timeline.png')}}">
                <div class="card-body">
                        <ol class="timeline-list">
                            <li><p>Steam Login Support</p></li>
                            <li><p>Discord Login Support</p></li>
                            <li><p>More responsive design</p></li>
                            <li><p>Better backend algorithms</p></li>
                            <li><p>PayPal donation support</p></li>
                            <li><p>Desktop app</p></li>
                            <li><p>Direct advert sponsorships</p></li>
                            <li><p>Add site forum</p></li>
                        </ol>
                        <p style="margin-left: 40px; margin-top: 16px; float: left; max-width: 400px; display: inline-block;">Want to speed up the release of new features? <a>Donate</a> so our dev can spend more time working on the website! You can suggest new features by emailing us at: hello@cyruscuenca.com</p>
                </div><!--card-body-->
            </div><!--card-->
@endsection
