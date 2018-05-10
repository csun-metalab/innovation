@extends('layouts.master')

@section('content')


<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <nav class="bs-docs-sidebar">
        <ul class="nav nav-stacked sidebar list--unstyled">
        <li class="active">
          <a title="Projects" href="http://www.csun.edu/faculty/about/version-history">Projects</a>
        </li>
        <li class="">
          <a title="Next Steps" href="http://www.csun.edu/faculty/about/next-steps">Next Steps</a>
        </li>
        </ul>
        </nav>
      </div>
      <div class="col-sm-9">

        <h1 class="ml--10">My Projects </h1>
           @if(Auth::user()->projects->count() > 0)
           <table class="table table--striped table--bordered table--padded table--hover">
              @foreach(Auth::user()->projects as $project)
              <tbody>
                  <tr>
                    <td>{{ $project->project_title }}</td>
                    <td class="text--center width--25per>
                      <a title="View" class="nodeco" href='{{ urlAppName('/project/' . $project->project_id) }}'>View</a><span> | </span>
                      <a title="Edit" class="nodeco" href='{{ urlAppName("") }}'> Edit</a>
                    </td>
                  </tr>
              </tbody>
              @endforeach
            </table>
            @else
              <p>You are not in any projects yet.</p>
            @endif
        </div>
      </div>
    </div>
  </div>



@stop
@section('scripts')
{!! Html::script('js/metaphor.js') !!}
@stop
