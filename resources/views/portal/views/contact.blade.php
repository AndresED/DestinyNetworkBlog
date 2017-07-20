@php
    $title = "Contact Us";
    $description = "Contact us at Destiny Networks and have a good time!";
    $author_ = DestinyH\Option::where('option_name','site_author')->first();
    $author = $author_->option_value;
@endphp
@include('portal.layouts.header')
@include('portal.layouts.navbar')
<!-- wrapper -->
<div id="wrapper">
    <section class="hero" style="background-image: url({{asset('img/cover/cover.jpg')}});">
        <div class="hero-bg-primary"></div>
        <div class="container">
            <div class="page-header">
                <div class="page-title">Contact Us</div>
            </div>
        </div>
    </section>

    <section class="padding-30">
        <div class="container text-center">
            <h2 class="font-size-22 font-weight-300">We would like to hear <span
                        class="font-weight-500">about you,</span> just send us a message!</h2>
        </div>
    </section>

    <section class="border-top-1 border-bottom-1 border-grey-400 section no-padding no-margin">
        <div id="map" class="height-400"></div>
    </section>

    <section id="contact" class="overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="title">
                        <h4><i class="fa fa-envelope"></i> Lets Get In Touch!</h4>
                        <p>If you have any kind of question just send us a message and we will reply you as soon as
                            possible!</p>
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
                    @if(session()->has('ticket_sent'))
                        <div class="alert alert-success">
                            <strong>Well done!</strong> We got your message. We will reply as soon as possible. <br> Thanks for your comments!
                        </div>
                    @endif
                    <form id="frm-contact" method="POST" action="{{route('pContact')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="email" class="form-control" name="ticket_email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="ticket_subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="7" name="ticket_content" placeholder="Message" required></textarea>
                        </div>
                        <div class="form-group">
                            {!! Recaptcha::render() !!}
                        </div>
                        <div id="frm-result">
                        </div>
                        <div class="text-center margin-top-30">
                            <button type="submit" class="btn btn-primary btn-lg btn-rounded btn-shadow">Send Message
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 height-300">
                    <img src="{{asset('img/content/contact.jpg')}}" class="image-right" alt="">
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /#wrapper -->
@include('portal.layouts.footer')
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="{{asset('plugins/gmaps/prettify.js')}}"></script>
<script src="{{asset('plugins/gmaps/gmaps.js')}}"></script>
<script>
    function checkRecaptcha() {
        res = $('#g-recaptcha-response').val();

        if (res == "" || res == undefined || res.length == 0)
            return false;
        else
            return true;
    }
    $('#frm-contact').submit(function(e) {

        if(!checkRecaptcha()) {
            $( "#frm-result" ).text("Please validate your reCAPTCHA.");
            return false;
        }
    });
</script>

<script>
    (function ($) {
        "use strict";
        var map;
        $(document).ready(function () {
            prettyPrint();
            var map = new GMaps({
                div: '#map',
                scrollwheel: false,
                lat: -12.099176,
                lng: -77.0290819
            });
            var marker = map.addMarker({
                lat: -12.099176,
                lng: -77.0290819
            });
        });
    })(jQuery);
</script>