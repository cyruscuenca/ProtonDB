<div style="z-index: 3; background: #c7d5e0; width: 100%; top: 100px; height: 100px; border-bottom: 1px solid #2a475e;">
<section style="text-align: center; width: 100%; margin-top: 25px">
        {{ html()->text('link_input')
                        ->class('form-control')
                        ->placeholder(' Paste Steam URL here')
                        ->style('height: 50px; float: left; background: #c7d5e0; border-radius: 1px; border: 1pt solid #2a475e; border-right: none; display: inline-block; min-width: 214px; width: calc(50% - 60px);')
                        ->attribute('maxlength', 128)
                        ->required()
                        ->autofocus() }}
<button onclick="check(document.getElementById('link_input').value);" style="outline: none; display: inline-block; width: 60px; float: left; height: 50px; border-radius: 0 2px 2px 0; background: #1B2838; color: #c7d5e0; border: 1px solid #2a475e; border-left: none;"><img src="{{asset('img/backend/icons/check.svg')}}"></button>
<li style="float: right;">
    @auth
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
    	<img src="{{ $logged_in_user->picture }}" style="border-radius: 1px; width: 50px; border: 2px solid #66c0f4;">
	</a>
	<ul class="dropdown-menu">
		<li style="background: #223a4f; width: 100%; margin-left: 0; margin-top: -8px; height: 65px;">
			<a style="margin-left: 20px; font-weight: bold;">{{ $logged_in_user->name }}</a>
			<a style="margin-left: 20px;">{{ $logged_in_user->email }}</a>
		</li>
        @can('view backend')
        <li><img src="{{asset('img/backend/icons/admin.svg')}}"><a href="{{ route('admin.dashboard') }}">@lang('navs.frontend.user.administration')</a></li>
        @endcan
		<li><img src="{{asset('img/backend/icons/feedback.svg')}}">Feedback</li>
		<li><img src="{{asset('img/backend/icons/help.svg')}}">Help</li>
		<li><img src="{{asset('img/backend/icons/logout.svg')}}"><a href="{{ route('frontend.auth.logout') }}">Logout</a></li>
	</ul>
	@endauth
    @guest
        <li class="nav-item"><a href="{{route('frontend.auth.login')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.login')) }}">@lang('navs.frontend.login')</a></li>

        @if(config('access.registration'))
                <li class="nav-item"><a href="{{route('frontend.auth.register')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.register')) }}">@lang('navs.frontend.register')</a></li>
        @endif
    @endguest
</li>
</section>
</div>
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
function check(link) {
	console.log(link + ' request sent');
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
		console.log(data.path + ' response recieved');
		window.location = 'http://104.248.185.46/app/' + data.path_int + '/' + data.path_slug;
	})
}
</script>