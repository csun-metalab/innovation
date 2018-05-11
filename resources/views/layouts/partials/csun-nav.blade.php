<nav class= "@yield('nav', 'primary-nav')">
  <div class="container">
    <div class="primary-nav__mobile">
      <div class="primary-nav__btn">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
      </div>
          <a title="California State University, Northridge - Home" href="http://www.csun.edu" class="primary-nav__brand"><span class="sr-only">California State University, Northridge (CSUN)</span></a>
        @if(getAppName()=='SeniorDesign')
            <a title="Home" href="{{ urlAppName('/') }}" class="primary-nav__sub-brand">Senior Design</a>

        @else
            <a title="Home" href="{{ urlAppName('/') }}" class="primary-nav__sub-brand">Innovation</a>

        @endif
          <a title="Skip to main content" class="sr-only" href="#main">Skip to main content</a>
    </div>
    <ul class="primary-nav__links">
    <li><a title="Home" href="{{ urlAppName("/") }}" class="primary-nav__link {{ setActive([getAppName().'/']) }}">Home</a></li>
    <li><a title="Explore Projects" href="{{ urlAppName('/project') }}" class="primary-nav__link {{ setActive([getAppName().'/project*','admin*']) }}">Projects</a></li>
    <li><a title="About" href="{{ urlAppName("/about/version-history") }}" class="primary-nav__link {{ setActive([getAppName().'.about*']) }}">About</a></li>
    @if (Auth::check())
    <li class="drop">
    <a title="Profile" href="#" class="primary-nav__link"> {{Auth::user()->display_name}} <img width="25px" style="border-radius:25pt" src="{{Auth::user()->profile_image()}}"/></a>
    <div class="dropdownContain">
      <div class="dropOut">
        <div class="triangle"></div>
        <ul>
          {{-- This is going to be links in the drop down for faculty links--}}
          @if (Auth::user()->isFaculty())
            <li title="Profile Dashboard" class="{{ setActive([getAppName().'/admin/projects']) }}"><a href="{{urlAppName('/admin/dashboard')}}" class="drop-down__link" title="Dashboard">Dashboard   <i class="{{-- fa fa-tachometer --}}" aria-hidden="true"></i>
            </a></li>
            {{-- Route for user Profile not found --}}
            <li title="Go To My Profile" class="{{ setActive([getAppName().'/admin/Profile'])   }}"><a target="_blank" href="{{Auth::user()->profile_url()}}" class="drop-down__link" title="My Profile"> My Profile  <i class="{{-- fa fa-user --}}" aria-hidden="true"></i>
            </a></li>
          @elseif(Auth::user())
            <li title="Profile Dashboard" class="{{ setActive([getAppName().'/admin/projects']) }}"><a href="{{url('admin/dashboard')}}" class="drop-down__link" title="Dashboard">Dashboard   <i class="{{-- fa fa-tachometer --}}" aria-hidden="true"></i>
              </a></li>
          @endif
          <li title="Sign Out" class="{{ setActive([getAppName().'/admin/logout'])   }}"><a href="{{ urlAppName('logout') }}" class="drop-down__link" title="Logout"> Sign Out  <i class="fa fa-sign-out" aria-hidden="true"></i>
          </a></li>
       </ul>
      </div>
    </div>
    </li>
    @else
    <li class="{{ setActive([getAppName().'/login']) }}"><a href="{{ urlAppName('/login') }}" class="primary-nav__link" title="Login">Login <i class="fa fa-lock" aria-hidden="true"></i></a></li>
    @endif
    </ul>
  </div>
</nav>

