<nav class= "@yield('nav', 'primary-nav')">
  <div class="container">
    <div class="primary-nav__mobile">
      <div class="primary-nav__btn">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
      </div>
          <a title="California State University, Northridge - Home" href="http://www.csun.edu" class="primary-nav__brand"><span class="sr-only">California State University, Northridge (CSUN)</span></a>
             <a title="CSUN Scholarship - Home" href="{{ url('/') }}" class="primary-nav__sub-brand">
          @yield('navTitle', 'Scholarship<small><sub>BETA</sub></small>')
          </a>
          <a title="Skip to main content" class="sr-only" href="#main">Skip to main content</a>
    </div>
    <ul class="primary-nav__links">
    <li><a title="CSUN Scholarship - Home" href="{{ url("/") }}" class="primary-nav__link {{ setActive(['/']) }}">Home</a></li>
    <li><a title="Faculty" href="http://www.csun.edu/faculty/profiles" class="primary-nav__link">Profiles</a></li>
    <li><a title="Faculty Stories" href="http://www.csun.edu/faculty/stories" class="primary-nav__link">Stories</a></li>
    <li><a title="Explore Projects" href="{{ url('project') }}" class="primary-nav__link {{ setActive(['project*','admin*']) }}">Scholarship</a></li>
    <li><a title="About CSUN Scholarship" href="{{ url("/about/version-history") }}" class="primary-nav__link {{ setActive(['about*']) }}">About</a></li>
    @if (Auth::check())
    <li class="drop">
    <a title="Profile" href="#" class="primary-nav__link"> {{Auth::user()->display_name}} <img width="25px" style="border-radius:25pt" src="{{Auth::user()->profile_image()}}"/></a>
    <div class="dropdownContain">
      <div class="dropOut">
        <div class="triangle"></div>
        <ul>
          {{-- This is going to be links in the drop down for faculty links--}}
          @if (Auth::user()->isFaculty())
            <li title="Profile Dashboard" class="{{ setActive(['admin/projects']) }}"><a href="{{url('admin/dashboard')}}" class="drop-down__link" title="Dashboard">Dashboard   <i class="{{-- fa fa-tachometer --}}" aria-hidden="true"></i>
            </a></li>
            {{-- Route for user Profile not found --}}
            <li title="Go To My Profile" class="{{ setActive(['admin/Profile'])   }}"><a target="_blank" href="{{Auth::user()->profile_url()}}" class="drop-down__link" title="My Profile"> My Profile  <i class="{{-- fa fa-user --}}" aria-hidden="true"></i>
            </a></li>
          @elseif(Auth::user()->isStaffBasedOnAffiliation() && Auth::user()->isAdmin())
            <li title="Profile Dashboard" class="{{ setActive(['admin/projects']) }}"><a href="{{url('admin/dashboard')}}" class="drop-down__link" title="Dashboard">Dashboard   <i class="{{-- fa fa-tachometer --}}" aria-hidden="true"></i>
              </a></li>
          @endif
          <li title="Sign Out" class="{{ setActive(['admin/logout'])   }}"><a href="{{ url('logout') }}" class="drop-down__link" title="Logout"> Sign Out  <i class="fa fa-sign-out" aria-hidden="true"></i>
          </a></li>
       </ul>
      </div>
    </div>
    </li>
    @else
    <li class="{{ setActive(['login']) }}"><a href="{{ url('/login') }}" class="primary-nav__link" title="Login">Login <i class="fa fa-lock" aria-hidden="true"></i></a></li>
    @endif
    </ul>
  </div>
</nav>

