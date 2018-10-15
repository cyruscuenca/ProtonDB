<nav class="navbar navbar-expand-lg mb-4">
    <a class="navbar-brand" href="{{route('frontend.index')}}">
        <div class="logo-container" style="display: flex; align-items: center">
            <img height="70px" style="margin-bottom: 8px; margin-top: 25px; margin-left: 29px;" src="{{asset('img/backend/brand/icon.svg')}}">
            <h1>.IO</h1>
        </div>
    </a>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
                <div class="nav-dashboard">
                    <li class="nav-item"><a href="{{route('frontend.app.stats')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.app.stats')) }}"><img src="{{asset('img/backend/icons/stats.svg')}}">Statistics</a></li>
                    <li class="nav-item"><a href="{{route('frontend.app.list')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.user.dashboard')) }}"><img src="{{asset('img/backend/icons/list.svg')}}">Latest games</a></li>
                    <li class="nav-item"><a href="{{route('frontend.app.best')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.user.best')) }}"><img src="{{asset('img/backend/icons/star.svg')}}">Best games</a></li>
                    <li class="nav-item"><a href="{{route('frontend.timeline')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.timeline')) }}"><img src="{{asset('img/backend/icons/timeline.svg')}}">Feature timeline</a></li>
                    <li class="nav-item"><a href="{{route('frontend.donate')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.donate')) }}"><img src="{{asset('img/backend/icons/money.svg')}}">Donate</a></li>
                    <div class="navbar-social">
                        <ul>
                            <li>
                                <a href="https://www.reddit.com/r/linux_gaming" target="_blank">
                                    <img height="24px" style="margin-top: -2.5px; margin-left: 8px;" src="{{asset('img/backend/icons/reddit.svg')}}">
                                </a>
                            </li>
                            <li>
                                <a href="https://www.twitter.com/steamplaygames" target="_blank">
                                    <img height="24px" style="margin-top: -2.5px;" src="{{asset('img/backend/icons/twitter.svg')}}">
                                </a>
                            </li>
                            <li>
                                <a href="https://discord.gg/EuqP7JG" target="_blank">
                                    <img height="29px" src="{{asset('img/backend/icons/discord.svg')}}">
                                </a>
                            </li>
                        </ul>
                    </div>
        </ul>
    </div>
</nav>
