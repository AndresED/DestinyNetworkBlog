@php
    $a = DestinyH\Option::where('option_name','site_about')->first();
    $social_fb = DestinyH\Option::where('option_name','site_facebook')->first();
    $social_tw = DestinyH\Option::where('option_name','site_twitter')->first();
    $social_gg = DestinyH\Option::where('option_name','site_google')->first();
    $social_yt = DestinyH\Option::where('option_name','site_youtube')->first();
    $foo_games = DestinyH\Game::orderBy('game_karma','desc')->take(5)->get();
@endphp
<!-- footer -->
<footer>
    <div class="container">
        <div class="widget row">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <h4 class="title">About Destiny-Networks</h4>
                <p>{{$a->option_value}}</p>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <h4 class="title">Links</h4>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <ul class="nav">
                            @foreach($foo_games as $g)
                                <li><a href="{{$g->game_link}}">{{$g->game_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <ul class="nav">
                            <li><a href="{{route('r_forum')}}">Forum</a></li>
                            @if(!Auth::check())
                                <li><a href="{{route('gRegister')}}">Register</a></li>
                            @endif
                            <li><a href="{{route('gContact')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <h4 class="title">Email Newsletters</h4>
                <p>Subscribe to our newsletter and get notification when new games are available.</p>
                <form method="post" action="{{route('pSubscribe')}}" class="btn-inline form-inverse">
                    {{ csrf_field() }}
                    <input type="email" class="form-control" name="subscriber_email" required placeholder="Email..."/>
                    <button type="submit" class="btn btn-link"><i class="fa fa-envelope"></i></button>
                </form>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{$social_fb->option_value}}" class="btn btn-circle btn-social-icon" data-toggle="tooltip"
                       title="Follow us on Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="{{$social_tw->option_value}}" class="btn btn-circle btn-social-icon" data-toggle="tooltip"
                       title="Follow us on Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="{{$social_gg->option_value}}" class="btn btn-circle btn-social-icon" data-toggle="tooltip"
                       title="Follow us on Google"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="{{$social_yt->option_value}}" class="btn btn-circle btn-social-icon" data-toggle="tooltip"
                       title="Follow us on Youtube"><i class="fa fa-youtube"></i></a></li>
            </ul>
            &copy; {{date("Y")}} Destiny Networks, Inc. All rights reserved.
        </div>
    </div>
</footer>
<!-- /.footer -->

<div id="signin" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title"><i class="fa fa-user"></i> Sign In to Destiny-Networks</h3>
            </div>
            <div class="modal-body">
                @if(!Auth::check())
                    <form method="POST" action="{{route('pLogin')}}">
                        {{ csrf_field() }}
                        <div class="form-group input-icon-left">
                            <i class="fa fa-user"></i>
                            <input type="text" class="form-control" name="user_login" required placeholder="Username">
                        </div>
                        <div class="form-group input-icon-left">
                            <i class="fa fa-lock"></i>
                            <input type="password" class="form-control" name="user_password" required
                                   placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>

                        <div class="form-actions">
                            <div class="checkbox checkbox-icon checkbox-inline checkbox-primary">
                                <input type="checkbox" id="icon-checkbox1" name="remember_me" value="remember" checked>
                                <label for="icon-checkbox1">Remember me</label>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="alert alert-success">
                        <strong>All right!</strong> You are already logged in.
                    </div>
                @endif
            </div>
            @if(!Auth::check())
                <div class="modal-footer text-left">
                    Don't have an account? <a href="{{route('gRegister')}}">Sign Up Now</a>
                </div>
            @endif
        </div>
    </div>
</div><!-- /.modal -->

<!-- Javascript -->
<script src={{asset('plugins/jquery/jquery-3.1.0.min.js')}}></script>
<script src={{asset('plugins/bootstrap/js/bootstrap.min.js')}}></script>
<script src={{asset('js/core.min.js')}}></script>
<script src={{asset('js/code.js')}}></script>
</body>
</html>