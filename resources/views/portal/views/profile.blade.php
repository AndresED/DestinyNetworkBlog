@php
    $title = $user->user_nicename;
    $description = str_limit($user->user_about,150);
    $author = $user->user_nicename;
@endphp
@include('portal.layouts.header')
@include('portal.layouts.navbar')
<!-- wrapper -->
<div id="wrapper">
    <section class="hero cover hidden-xs" style="background-image: url({{$user->user_avatar}});">
        <div class="hero-bg"></div>
        <div class="container relative">
            <div class="page-header">
                <div class="page-title">{{$user->user_nicename}}</div>
                <div class="profile-avatar">
                    <div class="thumbnail" data-toggle="tooltip" title="{{$user->user_nicename}}">
                        <a href="">
                            <img src="{{$user->user_avatar}}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="profile-nav height-50 border-bottom-1 border-grey-300  hidden-xs">
        <div class="tab-select sticky">
            <div class="container">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="">About Me</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="bg-grey-50 padding-top-60 padding-top-sm-30">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 hidden-xs">
                    <div class="widget">
                        <div class="panel panel-default">
                            <div class="panel-heading">About me</div>
                            <div class="panel-body">
                                {{$user->user_about}}
                                <ul class="panel-list margin-top-25">
                                    <li><i class="fa fa-clock-o"></i>
                                        Joined {{date('F, Y',strtotime($user->created_at))}}</li>
                                    <li><i class="fa fa-map-marker"></i> {{$user->user_country}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-8">
                    <div class="testimonial testimonial-success">
                        <p><em>"{{$user->user_think}}"</em></p>
                    </div>
                    <div class="clearfix margin-top-30"></div>
                    @if(Auth::check())
                        <form method="POST" action="{{route('pUpdateThink')}}">
                            {{csrf_field()}}
                            <div class="panel panel-default margin-bottom-40">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <textarea class="form-control" rows="4" name="user_think"
                                                  placeholder="What's in your head?..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-icon-left pull-right"><i
                                                class="fa fa-edit"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif

                    <div class="widget widget-list">
                        <div class="panel panel-default">
                            <div class="panel-heading bold">Recent Comments</div>
                            <div class="panel-body">
                                <ul>
                                    @foreach($comments as $comment)
                                        <li>
                                            <a href="{{route('sPost', \DestinyH\Post::find($comment->post_id)->post_slug)}}" class="thumb"><img src="{{\DestinyH\Post::find($comment->post_id)->post_img}}" alt="{{route('sPost',\DestinyH\Post::find($comment->post_id)->post_title)}}"></a>
                                            <div class="widget-list-meta">
                                                <h4 class="widget-list-title"><a href="{{route('sPost',\DestinyH\Post::find($comment->post_id)->post_slug)}}">{{\DestinyH\Post::find($comment->post_id)->post_title}}</a></h4>
                                                <p><i class="fa fa-clock-o"></i> {{ date('F d, Y', strtotime($comment->created_at)) }}</p>
                                                <p>{{str_limit($comment->comment_content,150)}}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
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
<script>
    (function ($) {
        "use strict";
        $(window).scroll(function () {
            if ($(this).scrollTop() > 300) {
                $('body').addClass('fixed-tab');
            } else {
                $('body').removeClass('fixed-tab');
            }
        });
    })(jQuery);
</script>