@include('portal.layouts.header')
@include('portal.layouts.navbar')
@include('portal.layouts.slider')
<section class="bg-grey-50 border-bottom-1 border-grey-200 relative">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="title outline">
                    <h4><i class="fa fa-newspaper-o"></i> Recent Post</h4>
                    <p>See what is new on our community!</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($posts as $p)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card card-hover">
                        <div class="card-img">
                            <img src="{{$p->post_img}}" alt="{{$p->post_title}}">
                            <div class="category"><span class="label label-danger">{{$p->post_tag}}</span></div>
                            <div class="meta"><a href="{{route('posts')}}/{{$p->post_slug}}"><i class="fa fa-heart-o"></i> <span>{{$p->post_karma}}</span></a></div>
                        </div>
                        <div class="caption">
                            <h3 class="card-title"><a href="{{route('posts')}}/{{$p->post_slug}}">{{$p->post_title}}</a></h3>
                            <ul>
                                <li>{{ date('F d, Y', strtotime($p->created_at)) }}</li>
                            </ul>
                            <p>{!! str_limit($p->post_content,100) !!} <a href="{{route('posts')}}/{{$p->post_slug}}"><strong>Read this!</strong></a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center">
            <a href="{{route('posts')}}" class="btn btn-primary btn-lg btn-shadow btn-rounded btn-icon-right margin-top-10 margin-bottom-20">Show More<i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="title outline">
                    <h4><i class="fa fa-gamepad"></i> Top Games</h4>
                    <p>Enjoy our coolest games online!</p>
                </div>
            </div>
        </div>
        <div class="row slider">
            <div class="owl-carousel">
                @foreach($top_games as $g)
                    <div class="card card-list">
                        <div class="card-img">
                            <img src="{{$g->game_img}}" alt="{{$g->game_name}}" style="max-width: 270px!important; height: auto">
                            <span class="label label-success">{{$g->game_karma}}</span>
                        </div>
                        <div class="caption">
                            <h4 class="card-title"><a href="{{route('games')}}/{{$g->game_slug}}">{{$g->game_name}}</a></h4>
                            <p>{!! $g->game_description !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
            <a href="#" class="next"><i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</section>
<div class="background-image" style="background-image: url('{{str_replace("https://www.youtube.com/watch?v=","https://img.youtube.com/vi/",$top_games[0]->game_trailer)}}/hqdefault.jpg');">
    <span class="background-overlay"></span>
    <div class="container">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="{{str_replace('https://www.youtube.com/watch?v=','https://www.youtube.com/embed/',$top_games[0]->game_trailer)}}?rel=0&amp;showinfo=0" allowfullscreen></iframe>
        </div>
    </div>
</div>

<section class="bg-primary promo">
    <div class="container">
        <h2>Create your own gaming account on this community</h2>
        <a href="{{route('gRegister')}}" target="_self" class="btn btn-white btn-outline">Register Now<i class="fa fa-user-plus margin-left-10"></i></a>
    </div>
</section>
</div>
<!-- /#wrapper -->
@include('portal.layouts.footer')
<script src={{asset('plugins/owl-carousel/owl.carousel.min.js')}}></script>
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
    })(jQuery);
</script>