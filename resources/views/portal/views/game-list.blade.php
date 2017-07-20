@php
    $title = "Games List";
    $description = "Games at Destiny Networks";
    $author_ = DestinyH\Option::where('option_name','site_author')->first();
    $author = $author_->option_value;
@endphp
@include('portal.layouts.header')
@include('portal.layouts.navbar')
<!-- wrapper -->
<div id="wrapper">
    <section class="hero hero-review" style="background-image: url({{asset('img/cover/cover-review.jpg')}});">
        <div class="hero-bg"></div>
        <div class="container">
            <div class="page-header">
                <div class="chart-align">
                    <span class="chart" data-percent="93"><span class="percent color-white"></span></span>
                </div>
                <div class="page-title"><a href="{{$top_game[0]->game_link}}">{{$top_game[0]->game_name}}</a></div>
                <p>{!! $top_game[0]->game_description !!}</p>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row sidebar">
                <div class="col-md-12 leftside">
                    @foreach($games as $game)
                        <div class="post post-review">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="post-thumbnail">
                                        <a href="{{route('games')}}/{{$game->game_slug}}"><img src="{{$game->game_img}}" alt="{{$game->game_name}}"></a>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="post-header">
                                        <span class="label label-success">{{$game->game_karma}}</span>
                                        <div class="post-title">
                                            <h4><a href="{{route('games')}}/{{$game->game_slug}}">{{$game->game_name}}</a></h4>
                                            <ul class="post-meta">
                                                <li><i class="fa fa-calendar-o"></i>{{date('F d, Y',strtotime($game->created_at))}}</li>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p>{!!str_limit($game->game_big_description,250) !!}</p>
                                    <a href="{{route('games')}}/{{$game->game_slug}}" class="btn btn-default btn-sm btn-icon-left margin-bottom-25"><i
                                                class="fa fa-eye"></i>
                                        See more</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center">{{$games->links()}}</div>

                    <div class="headline margin-top-20">
                        <h4>Recommended Posts</h4>
                    </div>
                    <div class="row">
                        @foreach($top_posts as $tp)
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 margin-bottom-sm-30">
                                <div class="card card-post">
                                    <div class="card-img">
                                        <img src="{{$tp->post_img}}" alt="{{$tp->post_name}}">
                                        <div class="meta"><a href="{{route('posts')}}/{{$tp->post_slug}}"><i
                                                        class="fa fa-heart-o"></i>
                                                <span>{{$tp->post_karma}}</span></a></div>
                                    </div>
                                    <div class="caption">
                                        <h3 class="card-title"><a href="{{action('PostController@show',$tp->post_slug)}}">{{$tp->post_title}}</a></h3>
                                        <ul>
                                            <li>
                                                <i class="fa fa-clock-o"></i> {{date('F d, Y',strtotime($tp->created_at))}}
                                            </li>
                                            <li><i class="fa fa-comments"></i> {{$tp->comments->count()}} comments</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<!-- /#wrapper -->
@include('portal.layouts.footer')
<script src="{{asset('plugins/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('plugins/easypiechart/jquery.easypiechart.min.js')}}"></script>
<script>
    (function ($) {
        "use strict";
        var owl = $(".owl-carousel");

        owl.owlCarousel({
            items: 4, //4 items above 1000px browser width
            itemsDesktop: [1000, 3], //3 items between 1000px and 0
            itemsTablet: [600, 1], //1 items between 600 and 0
            itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option
        });

        $(".next").click(function () {
            owl.trigger('owl.next');
            return false;
        })
        $(".prev").click(function () {
            owl.trigger('owl.prev');
            return false;
        })

        $('.chart').easyPieChart({
            easing: 'easeOutBounce',
            barColor: '#5eb404',
            trackColor: '#e3e3e3',
            onStep: function (from, to, percent) {
                $(this.el).find('.percent').text(Math.round(percent));
            }
        });
    })(jQuery);
</script>