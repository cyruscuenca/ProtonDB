@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))
<style>
.timeline-list {
     float: left;
     display: inline-block;
}
.timeline-list li {
    margin-top: 20px;
    background: #c7d5e0;
    width: 275px;
    text-align: center;
    border-radius: 1px;
    color: #2a475e;
}
.timeline-list li p {
    padding: 8px;
}
.nav-dashboard li:nth-child(4) {
    border-bottom: 3px solid #66c0f4;
}
</style>
@section('content')
<div class="fullwidth" style="background-image: url({{asset('img/backend/brand/background.jpg')}}); height: 215px;">
    <div class="responsive-width" style="font-family: 'Oswald'; text-align: center;">
        <h1 style="font-weight: bold; font-size: 72px; margin-top: 64px;">TIMELINE</h1>
    </div>
</div>
<div class="card" style="margin-top: 25px; background: #2a475e; color: #c7d5e0;">
            <div class="card-body">
                        <ol class="timeline-list">
                            <li><p>Steam Login Support</p></li>
                            <li><p>Discord Login Support</p></li>
                            <li><p>More responsive design</p></li>
                            <li><p>Better backend algorithms</p></li>
                            <li><p>PayPal donation support</p></li>
                            <li><p>Discord game support</p></li>
                            <li><p>Desktop app</p></li>
                            <li><p>Direct advert sponsorships</p></li>
                            <li><p>Add site forum</p></li>
                        </ol>
                        <p style="margin-left: 40px; margin-top: 16px; float: left; max-width: 400px; display: inline-block; color: #c7d5e0;">Want to speed up the release of new features? <a>Donate</a> so our dev can spend more time working on the website! You can suggest new features by emailing us at: hello@cyruscuenca.com</p>
            </div><!--card-body-->
</div><!--card-->
@endsection
