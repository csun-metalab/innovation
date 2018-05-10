<ul class="nav">
    <li class="nav__item nav__item--{{ Request::is(getAppName().'/admin/dashboard') ? 'active' : ''}}">
        <a title="My Projects" href="{{ urlAppName('/admin/dashboard') }}" class="nav__link">My Projects</a>
    </li>
    <li class="nav__item nav__item--{{ Request::is(getAppName().'admin/dashboard/invitations') ? 'active' : ''}}">
        <a title="Pending Invitations" href="{{ urlAppName('/admin/dashboard/invitations') }}" class="nav__link">Pending
            Invitations
            @if($pendingInvitations > 0)
                <p class="tag tag--danger" style="margin-bottom: 0">{{ $pendingInvitations }}</p>
            @endif
        </a>
    </li>
    @if(Auth::user()->isAdmin())
        <li class="nav__item nav__item--{{ Request::is(getAppName().'/admin/dashboard/events') ? 'active' : ''}}">
            <a title="Events" href="{{ urlAppName('/admin/dashboard/events') }}" class="nav__link">Events</a>
        </li>
    @endif


</ul>
