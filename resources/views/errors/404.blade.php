@php
    $title = "Error 404";
    $description = "";
    $author = "";
@endphp
@include('portal.layouts.header')
@include('portal.layouts.navbar')
<!-- wrapper -->
<div id="wrapper">
    <section class="error-404" style="background-image: url(img/content/404.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="title">
                        <h4><i class="fa fa-bug"></i> 404 - Page Not Found</h4>
                    </div>
                    <p>Apologies, but the page you requested could not be found.</p>
                    <a href="{{route('home')}}" class="btn btn-primary btn-lg margin-top-20 btn-shadow btn-rounded">Back to home</a>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /#wrapper -->
@include('portal.layouts.footer')