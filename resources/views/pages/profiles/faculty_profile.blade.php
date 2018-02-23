
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
      <div class="row section">
        <div class="col-md-3">
          <p class="header--sm"><strong>Contact</strong></p>
          <ul class="list--unstyled">
            <li style="overflow:hidden; text-overflow: ellipsis;"> <a style="white-space: nowrap; color: #4a4a4a; text-decoration: none;" href="mailto:nerces.kazandjian@csun.edu"><i class="fa fa-envelope-o milli type--red"></i> nerces.kazandjian@csun.edu</a> </li>
            <li style="overflow:hidden; text-overflow: ellipsis;"> <a style="white-space: nowrap; color: #4a4a4a; text-decoration: none;" href="http://www.csun.edu/engineering-computer-science/computer-science" target="_blank"><i class="fa fa-globe milli type--red"></i> http://www.csun.edu/engineering-computer-science/computer-science</a> </li>
            <li> <a style="color: #4a4a4a; text-decoration: none;" href="tel:8186773398"><i class="fa fa-phone milli type--red"></i> 818-677-3398</a> </li>
          </ul>

          <hr>

          <p class="header--sm"><strong>Expertise</strong></p>
          <ul class="list--unstyled list--padded">
            <li><a href="#" class="tag tag--success">Cloud Computing (IaaS)</a></li>
            <li><a href="#" class="tag tag--success">Web Technology</a></li>
            <li><a href="#" class="tag tag--success">Web Development</a></li>
            <li><a href="#" class="tag tag--success">Programming Languages</a></li>
            <li><a href="#" class="tag tag--success">Compilers</a></li>
            <li><a href="#" class="tag tag--success">Parallel and Distributed Programming</a></li>
          </ul>

          <br>

        </div>
        <div class="col-md-9">
          <h2 class="type--header type--thin">Biography</h2>
          <p style="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, impedit. Maxime voluptate, nostrum eum enim, rem totam veniam voluptates vero quos aperiam saepe soluta incidunt laudantium. Libero ut totam, eum alias debitis architecto, corporis obcaecati perspiciatis, corrupti et quasi. Voluptatem dolorem molestias aut facere veniam expedita a voluptates veritatis porro voluptas officiis ad tempore vero unde nisi iusto harum fuga aliquid, laudantium et nemo eaque recusandae amet perspiciatis. Recusandae tempore, iure temporibus.</p>

          <br>

          <h2 class="type--header type--thin">Degrees</h2>
          <ul class="timeline">
            <li class="timeline__header"><strong>D.Sc.</strong> 1995, University of Massachusetts Lowell</li>
            <li class="timeline__header"><strong>M.S.</strong> 1990, University of Massachusetts Lowell</li>
            <li class="timeline__header"><strong>B.S.</strong> 1986, Lowell University</li>
          </ul>

          <br>

          <h2 class="type--header type--thin">Connections</h2>
          <div class="row type--center">
            <div class="col-sm-3">
              <div class="panel"><div class="panel__content">Computer Science</div></div>
            </div>
            <div class="col-sm-3">
              <div class="panel"><div class="panel__content">META+Lab</div></div>
            </div>
            <div class="col-sm-3">
              <div class="panel"><div class="panel__content">VISCOM</div></div>
            </div>
            <div class="col-sm-3">
              <div class="panel"><div class="panel__content">Web Coordinating Group (WCG)</div></div>
            </div>
          </div>

          <br>

          <h2 class="type--header type--thin">Badges &amp; Awards</h2>
          <div class="row type--center">
            <div class="col-sm-3">
              <div class="panel"><div class="panel__content">Deal-Badge</div></div>
            </div>
            <div class="col-sm-3">
              <div class="panel"><div class="panel__content">Another-Badge</div></div>
            </div>
            <div class="col-sm-3">
              <div class="panel"><div class="panel__content">The-Badge</div></div>
            </div>
            <div class="col-sm-3">
              <div class="panel"><div class="panel__content">Some-Badge</div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  @stop

