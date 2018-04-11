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
  <li class="nav__item nav__item--{{ Request::is('admin/dashboard/events') ? 'active' : ''}}">
    <a title="My Interests" href="{{ url('admin/dashboard/events') }}" class="nav__link">Events</a>
  </li>
</ul>
