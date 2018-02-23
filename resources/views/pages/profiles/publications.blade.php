
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
            <li class="nav__item">
              <a href="#2014" class="nav__link">2014</a>
            </li>
            <li class="nav__item">
              <a href="#2013" class="nav__link">2013</a>
            </li>
          </ul>
        </div>
        <div class="col-md-9">
        <ul class="timeline">
          <li>
            <div class="type--header">
              <h2 id="2016" class="timeline__header type--marginless">2016 Publications</h2>
            </div>
          </li>
          <li>
            <p class="timeline__event"><strong>12/12/12 - Really Long Title For This Research Publicaiton</strong></p>
            <p class="timeline__content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti culpa laudantium veniam nisi ea, maiores impedit nulla facilis beatae provident, sint expedita. Ab dolore sed sit nesciunt maiores doloribus minima!</p>
          </li>
          <li>
            <p class="timeline__event"><strong>12/10/12 - Really Long Title For This Research Publicaiton</strong></p>
            <p class="timeline__content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti culpa laudantium veniam nisi ea, maiores impedit nulla facilis beatae provident, sint expedita. Ab dolore sed sit nesciunt maiores doloribus minima!</p>
          </li>
          <li>
            <p class="timeline__event"><strong>12/10/12 - Really Long Title For This Research Publicaiton</strong></p>
            <p class="timeline__content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti culpa laudantium veniam nisi ea, maiores impedit nulla facilis beatae provident, sint expedita. Ab dolore sed sit nesciunt maiores doloribus minima!</p>
          </li>
          <li><br></li>
          <li>
            <div class="type--header">
              <h2 id="2015" class="timeline__header type--marginless">2015 Publications</h2>
            </div>
          </li>
          <li>
            <p class="timeline__event"><strong>12/12/12 - Really Long Title For This Research Publicaiton</strong></p>
            <p class="timeline__content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti culpa laudantium veniam nisi ea, maiores impedit nulla facilis beatae provident, sint expedita. Ab dolore sed sit nesciunt maiores doloribus minima!</p>
          </li>
          <li>
            <p class="timeline__event"><strong>12/10/12 - Really Long Title For This Research Publicaiton</strong></p>
            <p class="timeline__content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti culpa laudantium veniam nisi ea, maiores impedit nulla facilis beatae provident, sint expedita. Ab dolore sed sit nesciunt maiores doloribus minima!</p>
          </li>
          <li><br></li>
          <li>
            <div class="type--header">
              <h2 id="2014" class="timeline__header type--marginless">2014 Publications</h2>
            </div>
          </li>
          <li>
            <p class="timeline__event"><strong>12/12/12 - Really Long Title For This Research Publicaiton</strong></p>
            <p class="timeline__content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti culpa laudantium veniam nisi ea, maiores impedit nulla facilis beatae provident, sint expedita. Ab dolore sed sit nesciunt maiores doloribus minima!</p>
          </li>
          <li>
            <p class="timeline__event"><strong>12/10/12 - Really Long Title For This Research Publicaiton</strong></p>
            <p class="timeline__content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti culpa laudantium veniam nisi ea, maiores impedit nulla facilis beatae provident, sint expedita. Ab dolore sed sit nesciunt maiores doloribus minima!</p>
          </li>
          <li><br></li>
          <li>
            <div class="type--header">
              <h2 id="2013" class="timeline__header type--marginless">2013 Publications</h2>
            </div>
          </li>
          <li>
            <p class="timeline__event"><strong>12/12/12 - Really Long Title For This Research Publicaiton</strong></p>
            <p class="timeline__content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti culpa laudantium veniam nisi ea, maiores impedit nulla facilis beatae provident, sint expedita. Ab dolore sed sit nesciunt maiores doloribus minima!</p>
          </li>
          <li>
            <p class="timeline__event"><strong>12/10/12 - Really Long Title For This Research Publicaiton</strong></p>
            <p class="timeline__content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti culpa laudantium veniam nisi ea, maiores impedit nulla facilis beatae provident, sint expedita. Ab dolore sed sit nesciunt maiores doloribus minima!</p>
          </li>
        </ul>
        </div>
      </div>
    </div>
  </div>
  
  @stop
