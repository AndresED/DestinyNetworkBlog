@php
    $title = $post->post_title;
    $description = str_limit($post->post_content,150);
    $author = $post->user->user_nicename;
@endphp
@include('portal.layouts.header')
@include('portal.layouts.navbar')
<!-- wrapper -->
<div id="wrapper">
    <section class="hero height-350 hero-game" style="background-image: url({{$post->game->game_img}});">
        <div class="hero-bg"></div>
        <div class="container">
            <div class="page-header">
                <div class="page-title">{{$post->game->game_name}}</div>
                <a href="{{$post->game->game_trailer}}" class="btn btn-success margin-top-30 text-initial"
                   data-toggle="lightbox" data-width="1280">Watch game trailer</a>
            </div>
        </div>
    </section>

    <section class="bg-white no-padding hidden-xs border-bottom-1 border-grey-300" style="height: 54px">
        <div class="tab-select sticky text-center">
            <div class="container">
                <ul class="nav nav-tabs">
                    <li class="active"><a href=""><i class="fa fa-star"></i> {{$post->post_title}}</a></li>
                    <li><a href="{{route('r_forum')}}"><i class="fa fa-quote-left"></i> Forum</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="bg-grey-50">
        <div class="container">
            <div class="row sidebar">
                <div class="col-md-8 leftside">
                    <div class="post post-single">
                        <div class="post-header">
                            <div class="post-title">
                                <h2><a href="">{{$post->post_title}}</a></h2>
                                <ul class="post-meta">
                                    <li><a href="{{route('profile',$post->user->user_slug)}}"><i
                                                    class="fa fa-user"></i> {{$post->user->user_nicename}}</a></li>
                                    <li><i class="fa fa-calendar-o"></i> {{date('F d, Y',strtotime($post->created_at))}}
                                    </li>
                                    <li><a href="#"><i class="fa fa-comments"></i> {{$post->comments->count()}} <span
                                                    class="hidden-xs">Comments</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 margin-bottom-sm-30">
                            <div class="card card-hover">
                                <div class="card-img">
                                    <div class="post-thumbnail" style="margin-bottom: 0!important;">
                                        <img src="{{$post->post_img}}" alt="{{$post->game->game_name}}">
                                        <div class="post-caption">{{$post->game->game_name}}</div>
                                    </div>
                                </div>
                                <div class="caption">
                                    <p>{{$post->post_content}}.</p>
                                </div>
                            </div>
                        </div>

                        <div class="row margin-top-40">
                            <div class="col-md-8">
                                <div class="tags">
                                    <a href="{{$post->game->game_link}}">{{$post->game->game_name}}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="comments">
                        <h4 class="page-header"><i class="fa fa-comment-o"></i> Comments ({{$post->comments->count()}})
                        </h4>
                        @foreach($comments as $comment)
                            <div class="media">
                                <a class="media-left" href="{{route('profile',$comment->user->user_slug)}}">
                                    <img src="{{$comment->user->user_avatar}}" alt="{{$comment->user->user_nicename}}"/>
                                </a>
                                <div class="media-body">
                                    <div class="media-content">
                                        <a href="{{route('profile',$comment->user->user_slug)}}"
                                           class="media-heading">{{$comment->user->user_nicename}}</a>
                                        <span class="date">{{date('F d, Y \a\t H:i a',strtotime($comment->created_at))}}</span>
                                        <p>{{$comment->comment_content}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="text-center">{{ $comments->links() }}</div>
                        @if(Auth::check())
                            <div class="comment-form">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <h4 class="page-header">Leave a comment</h4>
                                <form method="POST" action="{{route('pComment')}}">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <textarea class="form-control bg-white" name="comment_content" rows="6" required placeholder="Your Comment"></textarea>
                                    </div>
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <button type="submit" class="btn btn-primary btn-rounded btn-shadow pull-right">
                                        Submit Comment
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="col-md-4 rightside">
                    <div class="widget widget-game" style="background-image: url({{$post->game->game_img}});">
                        <div class="overlay">
                            <div class="title">{{$post->game->game_name}}</div>

                            <div class="bold text-uppercase margin-top-40">Author</div>
                            <span class="font-size-13">{{$post->game->game_developer}}</span>

                            <div class="bold text-uppercase margin-top-35">Date:</div>
                            <span class="font-size-13">{{date('F d, Y',strtotime($post->game->game_release))}}</span>

                            <div class="description">
                                {{$post->game->game_description}}
                                <a href="{{$post->game->game_link}}" class="btn btn-block btn-primary margin-top-40">Go to site<i
                                            class="fa fa-heart-o margin-left-10"></i></a>
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
    (function ($) {
        "use strict";
        var owl = $(".owl-carousel");

        owl.owlCarousel({
            autoPlay: 3000,
            items: 1, //4 items above 1000px browser width
            itemsDesktop: [1000, 3], //3 items between 1000px and 0
            itemsTablet: [600, 1], //1 items between 600 and 0
            itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option
        });

        $(document).delegate('*[data-toggle="lightbox"]', 'click', function (event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });

        $(window).scroll(function () {
            if ($(this).scrollTop() > 350) {
                $('body').addClass('fixed-tab');
            } else {
                $('body').removeClass('fixed-tab');
            }
        });
    })(jQuery);
</script>