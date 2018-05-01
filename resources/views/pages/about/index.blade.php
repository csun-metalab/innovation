@extends('layouts.master')
@section('title',"What's New in Innovation")
@section('content')
<div class="section" style="background-color: #252525;">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h1 class="type--white type--thin type--marginless">About</h1>
          <p class="type--white type--marginless">We have an amazing set of faculty that pursues a diverse set of activities: different pedagogical approaches, different research interests, and unique aspirations. Faculty serve the university in a variety of ways, unique to each faculty member. To more fully highlight the stories of our faculty, facilitate access to information about faculty, and facilitated collaboration among faculty and students, the Faculty App was commissioned. META+LAB, a unit within Academic Affairs, has been working on the Faculty Project, whose primary purpose is to increase the visibility of CSUN's faculty and highlight what the university represents.</p>
        </div>
      </div>
    </div>
  </div>
<div class="section">
  <div class="container">
    <h2>
      @if(Request::is('about/version-history'))
      Version History
      @elseif(Request::is('about/browser-support'))
      Browser History
      @elseif(Request::is('about/faq'))
      FAQ
{{--       @elseif(Request::is('about/api'))
      API Documentation --}}
      @endif
    </h2>
    <hr>
    <div class="row">
      <div class="col-md-3">
        <ul class="nav">
          <li class="nav__item nav__item--{{ setActive(['about/version-history']) }}">
            <a href="{{ url('about/version-history') }}" class="nav__link">Version History</a>
          </li>
        {{-- <li class="nav__item nav__item--{{ setActive(['about/faq']) }}">
        <a href="{{ url('about/faq') }}" class="nav__link">FAQ</a>
        </li> --}}
{{--           <li class="nav__item nav__item--{{ setActive(['about/api']) }}">
            <a href="{{ url('about/api') }}" class="nav__link">API Documentation</a>
          </li> --}}
          <li class="nav__item nav__item--{{ setActive(['about/browser-support']) }}">
            <a href="{{ url('about/browser-support') }}" class="nav__link">Browser Support</a>
          </li>
        </ul>
        <br>
      </div>
      <div class="col-md-9">
            @if(Request::is('about/version-history'))
             @includeIf('pages.about.version-history')
            @elseif(Request::is('about/browser-support'))
             @includeIf('pages.about.browser-support')
            @elseif(Request::is('about/faq'))
             @includeIf('pages.about.browser-support')
            @elseif(Request::is('about/api'))
             @includeIf('pages.about.api')
            @endif
      </div>
    </div>
  </div>
</div>
@endsection