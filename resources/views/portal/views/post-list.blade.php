@php
    $title = "Posts List";
    $description = "Posts at Destiny Networks";
    $author_ = DestinyH\Option::where('option_name','site_author')->first();
    $author = $author_->option_value;
@endphp
@include('portal.layouts.header')
@include('portal.layouts.navbar')
<!-- wrapper -->
<div id="wrapper">
    <section class="hero hero-games height-300" style="background-image: url({{asset('img/cover/cover-game.jpg')}});">
        <div class="hero-bg"></div>
        <div class="container">
            <div class="page-header">
                <div class="page-title bold"><a href="{{$top_game[0]->game_link}}">{{$top_game[0]->game_name}}</a></div>
                <p>{{$top_game[0]->game_description}}</p>
            </div>
        </div>
    </section>

    <section class="tab-select no-padding border-bottom-1 border-grey-300 text-center">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#">All Posts</a></li>
                <li><a href="{{route('r_forum')}}"><i class="fa fa-quote-left"></i> Forum</a></li>
            </ul>
        </div>
    </section>

    <section class="bg-grey-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header text-center text-initial"><i
                                class="fa fa-clock-o"></i>{{\Carbon\Carbon::now()->format('F, Y')}}</h4>
                    <ul class="timeline" id="timeline">
                        @foreach($posts as $post)
                            <li>
                                <div class="timeline-badge primary"></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4><a href="{{route('posts')}}/{{$post->post_slug}}"><i class="fa fa-graduation-cap"></i>{{$post->post_title}}</a></h4>
                                        <img class="full-width" src="{{$post->post_img}}" alt="{{$post->post_title}}"/>
                                    </div>
                                    <div class="timeline-body">
                                        <p>{!! $post->post_content !!}</p>
                                    </div>
                                    <div class="timeline-footer">
                                        <i class="fa fa-calendar-o"></i> {{date('F d, Y',strtotime($post->created_at))}}
                                        <a class="pull-right"><i class="fa fa-comments"></i>{{$post->comments->count()}}</a></a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        <div class="clearfix pull-none"></div>
                    </ul>
                    <div class="text-center">{{ $posts->links() }}</div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /#wrapper -->
@include('portal.layouts.footer')
