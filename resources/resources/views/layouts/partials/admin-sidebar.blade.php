<ul class="nav">
  <li class="nav__item nav__item--{{ Request::is('admin/dashboard') ? 'active' : ''}}">
    <a title="My Projects" href="{{ url('admin/dashboard') }}" class="nav__link">My Projects</a>
  </li>
  <li class="nav__item nav__item--{{ Request::is('admin/dashboard/invitations') ? 'active' : ''}}">
    <a title="Pending Invitations" href="{{ url('admin/dashboard/invitations') }}" class="nav__link" >Pending Invitations
      @if($pendingInvitations > 0)
        <p class="tag tag--danger" style="margin-bottom: 0">{{ $pendingInvitations }}</p>
      @endif
    </a>
  </li>
  <li class="nav__item nav__item--{{ Request::is('admin/dashboard/research-interests') ? 'active' : ''}}">
    <a title="My Interests" href="{{ url('admin/dashboard/research-interests') }}" class="nav__link">My Research Interests</a>
  </li>
  <li class="nav__item nav__item--{{ Request::is('admin/dashboard/academic-interests') ? 'active' : ''}}">
    <a title="My Interests" href="{{ url('admin/dashboard/academic-interests') }}" class="nav__link">My Academic Interests</a>
  </li>
  <li class="nav__item nav__item--{{ Request::is('admin/dashboard/personal-interests') ? 'active' : ''}}">
    <a title="My Interests" href="{{ url('admin/dashboard/personal-interests') }}" class="nav__link">My Personal Interests</a>
  </li>
</ul>
