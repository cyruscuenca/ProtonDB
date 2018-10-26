<nav class="navbar navbar-expand-lg mb-4">
    <div class="responsive-width">
        <a class="" href="{{route('frontend.index')}}">
            <img height="70px" style="margin-top: 14px;" src="{{asset('img/backend/brand/icon.svg')}}">
        </a>
        <div style="display: inline-block; float: right; width: 500px; margin-top: 25px;">
        {{ html()->text('link_input')
                                ->class('form-control')
                                ->placeholder(' Paste Steam URL here')
                                ->style('height: 50px; float: left; background: #1B2838; border-radius: 1px; border: 1pt solid #2a475e; border-right: none; display: inline-block; min-width: 214px; width: calc(100% - 60px);')
                                ->attribute('maxlength', 128)
                                ->required()
                                ->autofocus() }}
        <button onclick="check(document.getElementById('link_input').value);" style="outline: none; display: inline-block; width: 60px; float: left; height: 50px; border-radius: 0 2px 2px 0; background: #1B2838; color: #c7d5e0; border: 1px solid #2a475e; border-left: none;"><img src="{{asset('img/backend/icons/check.svg')}}"></button>
        </div>
</nav>
<ul class="navbar-nav">
        <div class="nav-dashboard responsive-width">
                    <ul style="font-family: 'Oswald'; font-size: 13pt;">
                        <li><a href="{{route('frontend.index')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.user.best')) }}"><img src="{{asset('img/backend/icons/home.svg')}}">Home</a></li>
                        <li><a href="{{route('frontend.app.best')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.user.best')) }}"><img src="{{asset('img/backend/icons/star.svg')}}">Best games</a></li>
                        <li><a href="{{route('frontend.app.list')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.user.dashboard')) }}"><img src="{{asset('img/backend/icons/list.svg')}}">Latest games</a></li>
                        <li><a href="{{route('frontend.app.stats')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.app.stats')) }}"><img src="{{asset('img/backend/icons/stats.svg')}}">Statistics</a></li>
                        <div style="float: right; width: 50px;">
                            @auth
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <img src="{{ $logged_in_user->picture }}" style="width: 50px;">
                            </a>
                            <ul class="dropdown-menu" style="margin-top: 15px; margin-left: -250px; z-index: 5; background: #2a475e;">
                                <li style="background: #1b2838; width: 100%; margin-left: 0; height: 75px; font-size: 13pt; margin-bottom: 10px; border-bottom: none;">
                                    <div style="width: 100%; height: 14px;"></div>
                                    <a style="margin-left: 20px; font-weight: bold;">{{ $logged_in_user->name }}</a>
                                    <a style="margin-left: 20px;">{{ $logged_in_user->email }}</a>
                                </li>
                                @can('view backend')
                                <li style="margin-bottom: 15px; margin-top: 10px;"><img style="margin-left: 20px;" src="{{asset('img/backend/icons/admin.svg')}}"><a href="{{ route('admin.dashboard') }}">@lang('navs.frontend.user.administration')</a></li>
                                @endcan
                                <li style="margin-bottom: 15px;"><img style="margin-left: 20px;" src="{{asset('img/backend/icons/feedback.svg')}}">Feedback</li>
                                <li style="margin-bottom: 15px;"><img style="margin-left: 20px;" src="{{asset('img/backend/icons/help.svg')}}">Help</li>
                                <li style="margin-bottom: 15px;"><img style="margin-left: 20px;" src="{{asset('img/backend/icons/timeline.svg')}}">Feature timeline</li>
                                <li style="margin-bottom: 24px;"><img style="margin-left: 20px;" src="{{asset('img/backend/icons/logout.svg')}}"><a href="{{ route('frontend.auth.logout') }}">Logout</a></li>
                            </ul>
                            @endauth
                            @guest
                                <li class="nav-item"><a href="{{route('frontend.auth.login')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.login')) }}">@lang('navs.frontend.login')</a></li>

                                @if(config('access.registration'))
                                        <li class="nav-item"><a href="{{route('frontend.auth.register')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.register')) }}">@lang('navs.frontend.register')</a></li>
                                @endif
                            @endguest
                        </div>
                    </ul>
         </div>
</ul>
<script type="text/javascript"
src="http://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous">
// AJAX setup
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
</script>
<script type="text/javascript">
function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

async function check(link) {
	console.log(link + ' check started');
	var url = "http://104.248.185.46/api/app/check";
	$.ajax({
		type: "POST",
        contentType: "application/json",
        dataType: "json",
		url: url,
		data: JSON.stringify({
			link: link,
		}),
		processData: false,
	})
	.done(function(data) {
		console.log(data.link + ' check recieved');
        if(data.response == "Dispatched") {
		    console.log(data.link + 'Dispatched');
            followup(data.steamid);
        } else {
		console.log(data.link + ' error');
        }
	})
}
async function followup(id) {
	console.log(id + ' followup started');
	var url = "http://104.248.185.46/api/app/followup";
    var timeout = 8;
    var interval = 1;
        for (var i = 0; i < timeout; i++) {
            await sleep(interval * 1000);
        $.ajax({
            type: "POST",
            contentType: "application/json",
            dataType: "json",
            url: url,
            data: JSON.stringify({
                id: id,
            }),
            processData: false,
        })
        .done(function(data) {
            if(data.path_slug != "API cooldown" && data.path_slug != null) {
                console.log(data.path + 'app processed');
                window.location = 'http://104.248.185.46/app/' + data.path_int + '/' + data.path_slug;
            } else if(data.path_slug == "API cooldown" && data.path_slug == null) {
                console.log(data.path + 'API cooling down');
                window.location = 'http://104.248.185.46/stats';
            } else {
                console.log(data.id + 'Invalid response');
            }
        })
    }
}
</script>