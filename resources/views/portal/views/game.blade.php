@php
    $title = $game->game_name;
    $description = str_limit($game->game_description,150);
    $author = $game->game_developer;
@endphp
@include('portal.layouts.header') 
@include('portal.layouts.navbar')
<!-- wrapper -->
<div id="wrapper">
    <section class="hero height-350 hero-game" style="background-image: url({{$game->game_img}});">
        <div class="hero-bg"></div>
        <div class="container">
            <div class="page-header">
                <div class="page-title">{{$game->game_name}}</div>
                <a href="{{$game->game_trailer}}" class="btn btn-success text-initial" data-toggle="lightbox" data-width="1280">Watch game trailer</a>
            </div>
        </div>
    </section>

    <section class="bg-white no-padding hidden-xs border-bottom-1 border-grey-300" style="height: 54px">
        <div class="tab-select text-center sticky">
            <div class="container">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="">{{$game->game_name}}</a></li>
                    <li><a href="{{route('r_forum')}}"><i class="fa fa-quote-left"></i> Forum</a></li>
                    <li><a href="{{$game->game_link}}"><i class="fa fa-link"></i> Go to site</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="bg-grey-50 padding-top-30">
        <div class="container">
            <div class="row">
                <div class="col-md-8 padding-right-20">
                    <div class="panel panel-default panel-post">
                        <div class="panel-body">
                            <div class="post">
                                <div class="post-header post-author">
                                    <a href="{{route('profile',\DestinyH\User::find($game->user_id)->user_slug)}}" class="author" data-toggle="tooltip" title="{{\DestinyH\User::find($game->user_id)->user_nicename}}"><img src="{{\DestinyH\User::find($game->user_id)->user_avatar}}" alt="{{\DestinyH\User::find($game->user_id)->user_nicename}}"></a>
                                    <div class="post-title">
                                        <h3><a href="">{{$game->game_name}}</a></h3>
                                        <ul class="post-meta">
                                            <li><a href="{{route('profile',\DestinyH\User::find($game->user_id)->user_slug)}}"><i class="fa fa-user"></i> {{\DestinyH\User::find($game->user_id)->user_nicename}}</a></li>
                                            <li><i class="fa fa-calendar-o"></i>{{date('F d, Y',strtotime($game->created_at))}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 margin-bottom-sm-30">
                                    <div class="card card-hover">
                                        <div class="card-img">
                                            <div class="post-thumbnail">
                                                <img src="{{$game->game_img}}" alt="{{$game->game_name}}">
                                                <div class="post-caption">{{$game->game_name}}</div>
                                            </div>
                                        </div>
                                            <p>{!! $game->game_big_description !!}.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 padding-left-20">
                    <div class="widget widget-game" style="background-image: url({{$game->game_img}});">
                        <div class="overlay">
                            <div class="title">{{$game->game_title}}</div>

                            <div class="bold text-uppercase margin-top-40">Developer</div>
                            <span class="font-size-13">{{$game->game_developer}}</span>

                            <div class="bold text-uppercase margin-top-35">Release Date:</div>
                            <span class="font-size-13">{{date('F d, Y',strtotime($game->game_release))}}</span>

                            <div class="description">
                                {!! $game->game_description !!}
                                <a href="{{$game->game_link}}" class="btn btn-block btn-primary margin-top-40">Go to site<i class="fa fa-heart-o margin-left-10"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /#wrapper -->
@include('portal.layouts.footer')
<script src={{asset('plugins/ekko-lightbox/ekko-lightbox.min.js')}}></script>
<script src={{asset('plugins/owl-carousel/owl.carousel.min.js')}}></script>
<script>
    (function($) {
        "use strict";
        var owl = $(".owl-carousel");
        owl.owlCarousel({
            autoPlay: 3000,
            items : 1, //4 items above 1000px browser width
            itemsDesktop : [1000,3], //3 items between 1000px and 0
            itemsTablet: [600,1], //1 items between 600 and 0
            itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
        });
        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
        $(window).scroll(function(){
            if ($(this).scrollTop() > 350) {
                $('body').addClass('fixed-tab');
            } else {
                $('body').removeClass('fixed-tab');
            }
        });
    })(jQuery);
</script>