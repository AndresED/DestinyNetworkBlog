@php
    $title = "Register";
    $description = "Register at Destiny Networks and have a good time!";
    $author_ = DestinyH\Option::where('option_name','site_author')->first();
    $author = $author_->option_value;
@endphp
@include('portal.layouts.header')
@include('portal.layouts.navbar')
<!-- wrapper -->
<div id="wrapper">
    <section class="hero hero-panel" style="background-image: url({{asset('img/cover/cover-register.jpg')}});">
        <div class="hero-bg"></div>
        <div class="container relative">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pull-none margin-auto">
                    <div class="panel panel-default panel-login">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-users"></i> Register</h3>
                        </div>
                        <div class="alert alert-info font-size-12">
                            <strong>Heads up!</strong> Password must have at least tree of this requirements: <br>
                            * A capital letter <strong class="font-size-11">(A-Z)</strong><br>
                            * A letter <strong class="font-size-11">(a-z)</strong><br>
                            * A number <strong class="font-size-11">(0-9)</strong><br>
                            * A symbol <strong class="font-size-11">(^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$)</strong><br>
                        </div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="panel-body">
                            <form id="frm-register" method="POST" action="{{route('pRegister')}}">
                                {{ csrf_field() }}
                                <div class="form-group input-icon-left">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="user_login" placeholder="Username"
                                           required>
                                </div>
                                <div class="form-group input-icon-left">
                                    <i class="fa fa-envelope"></i>
                                    <input type="email" class="form-control" name="user_email" placeholder="Email"
                                           required>
                                </div>
                                <div class="form-group input-icon-left">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" class="form-control" name="password" placeholder="Password"
                                           required>
                                </div>
                                <div class="form-group input-icon-left">
                                    <i class="fa fa-venus-mars"></i>
                                    <select id="gender" name="user_gender" class="form-control" required>
                                        <option value="masculino">Masculino</option>
                                        <option value="femenino">Femenino</option>
                                    </select>
                                </div>
                                <div class="form-group input-icon-left">
                                    <i class="fa fa-birthday-cake"></i>
                                    <input type="date" class="form-control" name="user_birth" required>
                                </div>
                                <div class="form-actions">
                                    <div class="checkbox checkbox-control checkbox-icon checkbox-primary">
                                        <input type="checkbox" id="icon-checkbox1" name="newsletter" checked=>
                                        <label for="icon-checkbox1"><strong>I accept</strong> to get newsletters</label>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group">
                                    {!! Recaptcha::render() !!}
                                </div>
                                <div id="frm-result" style="margin: 0 auto!important;">
                                </div>
                                <div class="alert alert-info">By clicking “Register”, you agree to our <a href="{{route('terms')}}"><strong>Terms of Service</strong></a>
                                </div>
                                <div class="clearfix"></div>
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </form>
                        </div>
                        <div class="panel-footer">
                            Already have an account? <a href="{{route('gLogin')}}">Sign In Now</a>
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
    function checkRecaptcha() {
        res = $('#g-recaptcha-response').val();

        if (res == "" || res == undefined || res.length == 0)
            return false;
        else
            return true;
    }
    $('#frm-register').submit(function (e) {

        if (!checkRecaptcha()) {
            $("#frm-result").text("Please validate your reCAPTCHA.");
            return false;
        }
    });
</script>