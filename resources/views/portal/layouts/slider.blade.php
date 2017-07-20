@php
    $s = DestinyH\Game::orderBy('game_karma','desc')->take(3)->get();
@endphp
<!-- wrapper -->
<div id="wrapper">
    <div id="full-carousel" class="ken-burns carousel slide full-carousel carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#full-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#full-carousel" data-slide-to="1"></li>
            <li data-target="#full-carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active inactiveUntilOnLoad">
                <img src="{{$s[0]->game_img}}" alt="{{$s[0]->game_name}}">
                <div class="container">
                    <div class="carousel-caption">
                        <h1 data-animation="animated animate1 bounceInDown">{{$s[0]->game_name}}</h1>
                        <p data-animation="animated animate7 fadeInUp">{{$s[0]->game_description}}</p>
                        <a href="#signin" data-toggle="modal" class="btn btn-primary btn-lg btn-rounded"
                           data-animation="animated animate10 fadeIn">Sign In Now</a>
                    </div>
                </div>
            </div>

            <div class="item">
                <img src="{{$s[1]->game_img}}" alt="{{$s[1]->game_name}}">
                <div class="container">
                    <div class="carousel-caption">
                        <h1 data-animation="animated animate1 bounceInDown">{{$s[1]->game_name}}</h1>
                        <p data-animation="animated animate7 fadeInUp">{{$s[1]->game_description}}</p>
                        <a href="#signin" data-toggle="modal" class="btn btn-primary btn-lg btn-rounded"
                           data-animation="animated animate10 fadeIn">Sign In Now</a>
                    </div>
                </div>
            </div>

            <div class="item">
                <img src="{{$s[2]->game_img}}" alt="{{$s[2]->game_name}}">
                <div class="container">
                    <div class="carousel-caption">
                        <h1 data-animation="animated animate1 bounceInDown">{{$s[2]->game_name}}</h1>
                        <p data-animation="animated animate7 fadeInUp">{{$s[2]->game_description}}</p>
                        <a href="#signin" data-toggle="modal" class="btn btn-primary btn-lg btn-rounded"
                           data-animation="animated animate10 fadeIn">Sign In Now</a>
                    </div>
                </div>
            </div>

            <a class="left carousel-control" href="#full-carousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="right carousel-control" href="#full-carousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </a>
        </div>
    </div>