@php
    $t = DestinyH\Option::where('option_name','site_title')->first();
    $d = DestinyH\Option::where('option_name','site_description')->first();
    $a = DestinyH\Option::where('option_name','site_author')->first();
if (!isset($title) || !isset($description) || !isset($author))
{
    $title = DestinyH\Option::where('option_name','site_title')->first();
    $description = DestinyH\Option::where('option_name','site_description')->first();
    $author = DestinyH\Option::where('option_name','site_author')->first();
}
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    @if(route::is('home'))
        <title>{{ $t->option_value }}</title>
        <meta name="description" content="{{$d->option_value}}">
        <meta name="author" content="{{$a->option_value}}">
    @else
        <title>{{$title}} | {{ $t->option_value }}</title>
        <meta name="description" content="{{$description}}">
        <meta name="author" content="{{$author}}">
@endif

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href={{asset('apple-touch-icon.png?v=8jeAzlx6Xp')}}>
    <link rel="icon" type="image/png" href={{asset('favicon-32x32.png?v=8jeAzlx6Xp')}} sizes="32x32">
    <link rel="icon" type="image/png" href={{asset('favicon-16x16.png?v=8jeAzlx6Xp')}} sizes="16x16">
    <link rel="manifest" href={{asset('manifest.json?v=8jeAzlx6Xp')}}>
    <link rel="mask-icon" href={{asset('safari-pinned-tab.svg?v=8jeAzlx6Xp')}} color="#5161b5">
    <link rel="shortcut icon" href={{asset('favicon.ico?v=8jeAzlx6Xp')}}>
    <meta name="apple-mobile-web-app-title" content="Destiny Networks">
    <meta name="application-name" content="Destiny Networks">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="msapplication-TileImage" content={{asset('mstile-144x144.png?v=8jeAzlx6Xp')}}>
    <meta name="theme-color" content="#ffffff">
    <!-- FAVICON -->

    <link rel="canonical" href="{{url()->current()}}" />

    <!-- CORE CSS -->
    <link href={{asset('plugins/bootstrap/css/bootstrap.min.css')}} rel="stylesheet">
    <link href={{asset('plugins/font-awesome/css/font-awesome.min.css')}} rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>

    <!-- PLUGINS -->
    <link href={{asset('plugins/animate/animate.min.css')}} rel="stylesheet">
    <link href={{asset('plugins/owl-carousel/owl.carousel.css')}} rel="stylesheet">
    <link href="{{asset('plugins/ekko-lightbox/ekko-lightbox.min.css')}}" rel="stylesheet">

    <!-- THEME CSS -->
    <link href={{asset('css/theme.min.css')}} rel="stylesheet">
    <link href={{asset('css/custom.css')}} rel="stylesheet">

</head>
