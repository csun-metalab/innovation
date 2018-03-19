
{{-- ADMIN HEADER --}}
{{-- <div class="admin-header"> --}}
<div class="admin-header web-one">
	<div class="container clearfix">
		<div class="administrator pull-left">
			<div class="clearfix">
				@if (Auth::user()->isFaculty())
				<a class="color-white" href="{{ url('profiles')  }}/{{ Auth::user()->emailURI  }}">
				@else
				<a class="color-white" href="#">
				@endif
					<div class="admin-avatar pull-left">
						<img class="img-circle img-responsive" alt="Profile Image" src="{{ Auth::user()->profileImageURL }}">
					</div>
					<div class="admin-name pull-left color-white">{{ Auth::user()->display_name }}</div>
				</a>
			</div>
		</div>
		<div class="admin-nav pull-left">
			@if(Auth::user()->hasRole('admin'))
				<a title="Departments" href="{{ url('admin/departments') }}">Departments</a>
				<a title="Expertise" href="{{ url('admin/expertise') }}">Expertise</a>
				{{-- <a href="{{ url('admin/stories') }}">Stories</a> --}}
				{{-- <a href="{{ url('admin/posts') }}">Infographics</a> --}}
				{{-- <a href="{{ url('admin/questions') }}">Questions</a> --}}
				{{-- <a href="{{ url('admin/videos') }}">Videos</a> --}}
				<a title="Manage" href="{{ url('admin/manage') }}">Manage</a>
				<a title="Settings" href="{{ url('admin/settings') }}">Settings</a>
			@endif
			@if(Auth::user()->hasAnyRole(['chair', 'dept_secretary', 'faculty:editor']))
				<a title="Dashboard" href="{{ url('dashboard/department/'.Auth::user()->departments()->get()->first()->department_id.'/manage-faculty') }}">Dashboard</a>
			@endif
			@if(Auth::user()->isFaculty())
			<a title="Profile" href="{{ url('profiles')  }}/{{ Auth::user()->emailURI  }}">Profile</a>
			@endif
			<a title="Feedback" href="{{ url('feedback') }}">Feedback</a>
			

		</div>
		<div class="admin-nav pull-right" >
			<a title="Logout" href="{{ url('logout') }}">Logout</a>
		</div>
	</div>
</div>
