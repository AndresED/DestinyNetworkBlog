@php($title = 'Subscribe to newsletters!')
@php($description = 'Subscribe to our newsletter and be always up-to-date!')
@php($author = 'Destiny Networks Inc.')

@include('portal.layouts.header')
@include('portal.layouts.navbar')
<!-- wrapper -->
<div id="wrapper">
    <section class="hero hero-panel" style="background-image: url({{asset('img/cover/cover-login.jpg')}});">
        <div class="hero-bg"></div>
        <div class="container relative">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-10 col-xs-12 pull-none margin-auto">
                    <div class="panel panel-default panel-login">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-user"></i> Subscribe to our newsletters</h3>
                        </div>
                        <div class="panel-body">
                                <p class="lead" style="color: #7B7B7B; font-size: medium; font-weight: bolder">
                                    Subscribe to our newsletter and stay updated on the latest developments and
                                    special offers!
                                </p>
                                <p style="color: #7B7B7B;">
                                    The newsletter keeps you informed on attractive games, inspiring topics and the
                                    latest
                                    news.
                                    You'll be among the first to know about our new services to make you even more
                                    comfortable.
                                </p>
                            <div class="separator margin-top-10"></div>
                            @if(session()->has('no_email'))
                                <div class="alert alert-danger">
                                    <strong>Error!</strong> Either your email is already on database or you did NOT sent a valid email!
                                </div>
                                @php(session()->forget('no_email'))
                            @endif
                            @if(session()->has('no_subscribed'))
                                <div class="alert alert-danger">
                                    <strong>Error!</strong> Try again please!
                                </div>
                                @php(session()->forget('no_subscribed'))
                            @endif
                            @if(session()->has('subscribed'))
                                <div class="alert alert-success">
                                    <strong>Well done!</strong> You successfully subscribed to our newsletter!
                                </div>
                                @php(session()->forget('subscribed'))
                            @endif
                            <form method="POST" action="{{route('pSubscribe')}}">
                                {{ csrf_field() }}
                                <div class="form-group input-icon-left">
                                    <i class="fa fa-envelope-o"></i>
                                    <input type="email" required class="form-control" name="subscriber_email"
                                           placeholder="Enter your email :)">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Subscribe!</button>
                            </form>
                        </div>
                        <div class="panel-footer">
                            Become a member of this awesome family! <a href="{{route('gRegister')}}">Sign Up Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /#wrapper -->
@include('portal.layouts.footer')