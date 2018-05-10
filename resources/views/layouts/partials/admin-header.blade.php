
{{-- ADMIN HEADER --}}
{{-- <div class="admin-header"> --}}
<div class="admin-header web-one">
	<div class="container clearfix">
		<div class="administrator pull-left">
			<div class="clearfix">
				@if (Auth::user()->isFaculty())
				<a class="color-white" href="{{ urlAppName('profiles')  }}/{{ Auth::user()->emailURI  }}">
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
				<a title="Departments" href="{{ urlAppName('/admin/departments') }}">Departments</a>
				<a title="Expertise" href="{{ urlAppName('/admin/expertise') }}">Expertise</a>
				{{-- <a href="{{ url('admin/stories') }}">Stories</a> --}}
				{{-- <a href="{{ url('admin/posts') }}">Infographics</a> --}}
				{{-- <a href="{{ url('admin/questions') }}">Questions</a> --}}
				{{-- <a href="{{ url('admin/videos') }}">Videos</a> --}}
				<a title="Manage" href="{{ urlAppName('/admin/manage') }}">Manage</a>
				<a title="Settings" href="{{ urlAppName('/admin/settings') }}">Settings</a>
			@endif
			@if(Auth::user()->hasAnyRole(['chair', 'dept_secretary', 'faculty:editor']))
				<a title="Dashboard" href="{{ urlAppName('/dashboard/department/'.Auth::user()->departments()->get()->first()->department_id.'/manage-faculty') }}">Dashboard</a>
			@endif
			@if(Auth::user()->isFaculty())
			<a title="Profile" href="{{ urlAppName('/profiles')  }}/{{ Auth::user()->emailURI  }}">Profile</a>
			@endif
			<a title="Feedback" href="{{ urlAppName('/feedback') }}">Feedback</a>
			

		</div>
		<div class="admin-nav pull-right" >
			<a title="Logout" href="{{ urlAppName('/logout') }}">Logout</a>
		</div>
	</div>
</div>
