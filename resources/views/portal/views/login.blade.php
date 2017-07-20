@php
    $title = "Login";
    $description = "Login at Destiny Networks and have a good time!";
    $author_ = DestinyH\Option::where('option_name','site_author')->first();
    $author = $author_->option_value;
@endphp
@include('portal.layouts.header')
@include('portal.layouts.navbar')
<!-- wrapper -->
<div id="wrapper">
    <section class="hero hero-panel" style="background-image: url({{asset('img/cover/cover-login.jpg')}});">
        <div class="hero-bg"></div>
        <div class="container relative">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pull-none margin-auto">
                    <div class="panel panel-default panel-login">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-user"></i> Sign In</h3>
                        </div>
                        <div class="panel-body">
                            @if(!Auth::check())
                                @if(session()->has('no_login'))
                                    <div class="alert alert-danger">
                                        <strong>Error!</strong> User/Password not correct! <br>
                                        <center>... or ... <br></center>
                                        Are you sure you've validated you account?

                                    </div>
                                    @php(session()->forget('no_login'))
                                @endif
                                <div class="separator margin-top-10"></div>
                                <form method="POST" action="{{route('pLogin')}}">
                                    {{ csrf_field() }}
                                    <div class="form-group input-icon-left">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="user_login" required
                                               placeholder="Username">
                                    </div>
                                    <div class="form-group input-icon-left">
                                        <i class="fa fa-lock"></i>
                                        <input type="password" class="form-control" name="password" required
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
                                    @php(header("Refresh: 3; url=".route('home')))
                                </div>
                            @endif
                        </div>
                        <div class="panel-footer">
                            @if(!Auth::check())
                                Don't have Destiny Networks account? <a href="{{route('gRegister')}}">Sign Up Now</a>
                            @else
                                Redirecting to home!
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /#wrapper -->
@include('portal.layouts.footer')