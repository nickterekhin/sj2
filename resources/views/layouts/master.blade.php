<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--> <html lang="en-US"> <!--<![endif]-->
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <title>@yield('title') | SeafarersJournal</title>

    <meta name="description" content="@yield('description')" />

    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="HandheldFriendly" content="true"/>
    <meta name="MobileOptimized" content="320"/>

    <!--[if IEMobile]>  <meta http-equiv="cleartype" content="on">  <![endif]-->

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.1.0/flickity.css"> {{-- Download later --}}
    <link href="/css/main.css" rel="stylesheet">

    <link rel="shortcut icon" href="/images/favicon.ico">

    <link rel="apple-touch-icon" href="#">
    <link rel="apple-touch-icon" sizes="114x114" href="#">
    <link rel="apple-touch-icon" sizes="72x72" href="#">
    <link rel="apple-touch-icon" sizes="144x144" href="#">

    @yield('styles')

    <script src="/js/jquery-2.1.4.min.js"></script>
    <script src="//use.typekit.net/nfs1eju.js" type="text/javascript"></script>
    <script type="text/javascript">try { Typekit.load(); } catch (e) { }</script>
    <script src="/js/isotope.pkgd.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/flickity.pkgd.min.js"></script>
    <script src="/js/modernizr.js"></script>

    <script src="/js/main.js"></script>

    @yield('scripts')

    @include('partials.analytics')

</head>

<body>
@yield('facebook')

<header>

</header>

<div class="container-fluid" id="mainContent">
    @yield('content')
    <div class="row row-no-margin vertical-padding-2 hidden-xs"></div>
</div>

<footer>

@include('partials.footer')

</footer>

</body>
</html>