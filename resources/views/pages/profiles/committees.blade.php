@extends('layouts.master')
@section('navTitle')
Profiles
@stop

@section('content')
@include('pages.profiles.profile')

 <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          @include('layouts.sub_nav')
        </div>
      </div>
      <p></p>
    
        <div class="col-md-3">
          <ul class="nav">
            <li class="nav__item nav__item--active nav__item--fill">
              <a href="#2016" class="nav__link">2016</a>
            </li>
            <li class="nav__item">
              <a href="#2015" class="nav__link">2015</a>
            </li>
          </ul>
        </div>
        <div class="col-md-9">
        <ul class="timeline">
          <li>
            <div class="type--header">
              <h2 id="2016" class="timeline__header type--marginless">2016 Committees</h2>
            </div>
          </li>
          <li>
            <p class="timeline__event">
              <strong>12/01/16 - (Present)</strong>
              <br>
              Secretary, Academic Technology Committee</p>
          </li>
          <li>
            <p class="timeline__event">
              <strong>10/01/16 - 11/30/16</strong>
              <br>
              Secretary, Academic Technology Committee</p>
          </li>
          <li><br></li>
          <li>
            <div class="type--header">
              <h2 id="2015" class="timeline__header type--marginless">2015 Committees</h2>
            </div>
          </li>
          <li>
            <p class="timeline__event">
              <strong>03/01/15 - 05/30/15</strong>
              <br>
              Secretary, Academic Technology Committee</p>
          </li>
          <li>
            <p class="timeline__event">
              <strong>01/01/15 - 02/30/15</strong>
              <br>
              Secretary, Academic Technology Committee</p>
          </li>
        </ul>
        </div>
      </div>
    </div>
  </div>

@stop