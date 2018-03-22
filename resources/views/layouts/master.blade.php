<!DOCTYPE HTML>



<html class="no-js" data-url="{{ url('/') }}" data-token="{{ csrf_token() }}" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>@yield('title', 'Scholarship') | CSUN</title>
    <meta name="description" content="@yield('description')">
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="http://www.csun.edu/sites/default/themes/csun/favicon.ico">

    {{-- FETCH FONTS --}}
    <script src="//use.typekit.net/gfb2mjm.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
    {{-- GOOGLE ANALYTICS TRACKING CODE --}}
    @if(env('GA_TRACKING_CODE'))
      <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', '{{ env('GA_TRACKING_CODE') }}', 'auto');
        ga('send', 'pageview');
      </script>
    @endif
    {{-- PROJECT STYLES --}}
    {!! Html::style('//fonts.googleapis.com/css?family=Open+Sans:400,700') !!}
    {!! Html::style('css/metaphor.css') !!}
    {!! Html::style('css/app.css') !!}
    {!! Html::style('css/sidebar.css') !!}
    @yield('styles')
    @yield('page-specific-headers')
  </head>
  <body class="{{ getPages() }} bg--off-white">
    @include('layouts.partials.csun-nav')

    <div class="wrapper main" style="">
      @yield("content")
      <a class="btn--feedback" href="{{ url('/feedback') }}" target="_blank">Give Feedback</a>
    </div>
    @include('layouts.partials.csun-footer')
    @include('layouts.partials.meta-footer')
    @yield("scripts")
<!--
  __  __   ___   _____     _
 |  \/  | | __| |_   _|   /_\       Explore Learn Go Beyond
 | |\/| | | _|    | |    / _ \      https://www.metalab.csun.edu/
 |_|  |_| |___|   |_|   /_/ \_\
    _       _        _     ___
  _| |_    | |      /_\   | _ )
 |_   _|   | |__   / _ \  | _ \
   |_|     |____| /_/ \_\ |___/
-->


  </body>
</html>


