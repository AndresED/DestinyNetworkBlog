@php
    $t = DestinyH\Option::where('option_name','site_title')->first();
    $nav_games = DestinyH\Game::orderBy('game_karma','desc')->take(4)->get();
@endphp
<body class="fixed-header">
<header>
    <div class="container">
        <span class="bar hide"></span>
        <a href="{{route('home')}}" class="logo"><img src="{{asset('img/logo.png')}}" alt="{{$t->option_value}}"></a>
        <nav>
            <div class="nav-control">
                <ul>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">Home</a>
                        <ul class="dropdown-menu default">
                            <li><a href="{{route('posts')}}">View all posts</a></li>
                            <li><a href="{{route('games')}}">View all games</a></li>
                        </ul>
                    </li>
                    <li class="dropdown mega-dropdown">
                        <a href="{{route('games')}}">Games</a>
                            <ul class="dropdown-menu mega-dropdown-menu category">
                                @foreach($nav_games as $g)
                                    <li class="col-lg-3 col-md-3">
                                        <a href="{{route('games')}}/{{$g->game_slug}}">
                                            <img src="{{$g->game_img}}" style="width: 350px!important; height: auto;" alt="{{$g->game_name}}">
                                            <div class="caption" >
                                                <div class="label" style="font-size: 15px">
                                                    <i class="fa fa-heart-o"> {{$g->game_karma}}</i>
                                                </div>
                                                <h3>{{$g->game_name}}</h3>
                                                <p style="max-width: 350px!important;">{{str_limit($g->game_description,40)}}</p>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                    </li>
                    @if(!Auth::check())
                        <li><a href="{{route('gRegister')}}">Register</a></li>
                    @endif
                    <li><a href="{{route('r_forum')}}">Forum</a></li>
                    <li><a href="{{route('gContact')}}">Contact</a></li>
                </ul>
            </div>
        </nav>
        @if(Auth::check())
            <div class="nav-right">
                <div class="nav-profile dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{Auth::user()->user_avatar}}" alt="{{Auth::user()->user_nicename}}"> <span>{{Auth::user()->user_nicename}}</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('profile',Auth::user()->user_slug)}}"><i class="fa fa-user"></i> Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('logout')}}"><i class="fa fa-power-off"></i> Sign Out</a></li>
                    </ul>
                </div>
            </div>
        @else
            <div class="nav-control nav-right">
                <a href="{{route('gLogin')}}">Login</a>
            </div>
        @endif
    </div>
</header>
<!-- /header -->