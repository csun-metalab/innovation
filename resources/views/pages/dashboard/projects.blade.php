@extends('layouts.master')

@section('content')
<div class="section">
  <div class="container">

    <div class="row">

      <div class="col-sm-12">
      {{-- <br> --}}
      <a class="btn btn-default" style="float:right;" href="{{ url('project/step-1') }}">Add a New Project</a>
        <h1 class="type--header type--thin">Innovation Dashboard</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3">
          @include("layouts.partials.admin-sidebar")
      </div>
      <div class="col-lg-9">
          @include('pages.project.partials.delete-modal')
          @if($projects->count() > 0)
          <div class="row">
          @foreach($projects->chunk(2) as $row)
            @foreach($row as $project)
              <div class="col-lg-6">
                <div class="panel ">
                  {{-- expr --}}
                  <div class="panel__header cf mh--66">
                    <div class="pull-right">
 {{--                      @can('is-owner', $project)
                        <a class="pull-right" href="{{ url('project/'.$project->project_id.'/edit') }}"><i class="fa fa-edit" aria-hidden="true"></i> <strong>Edit</strong> </a><br>
                        @if(!$project->cayuse_id)<a href="#" data-modal="#deleteModal" data-id="{{ $project->project_id }}" data-title="{{ $project->project_title }}" class="delete-modal-btn"><i class="fa fa-trash" aria-hidden="true"></i> <strong>Delete</strong> </a>@endif
                        @else
                        <strong>You cannot edit this project.</strong>
                      @endcan --}}
                    </div>
                  </div>
                  <div class="panel__content mh--400">
                    <p><strong><a title="{{ ("$project->project_title") }}" class="color--grey" href="{{ url("project/$project->slug") }}">{{ $project->project_title }}</a></strong></p>
                    <p>{{ str_limit($project->abstract, 140, '...') }}</p>
                  </div>
                  <div class="panel__footer height--55">
                    @if($project->pi)
                    <a title="&nbsp;&nbsp;{{$project->pi->display_name}}" href="?member={{$project->pi->display_name}}" class="nodeco color--grey"><img class="profile--icon" src="{{$project->pi->profile_image()}}" alt="{{$project->pi->display_name}}'s profile icon"/>&nbsp;&nbsp;{{$project->pi->display_name}}</a>
                    @endif
                  </div>
                </div>
              </div>
              @endforeach
          @endforeach
          </div>
          {{ $projects->links() }}
          @else
          <div class="row">
            <div class="col-sm-12">
              <span class="text-muted">You are not in any projects yet.</span>
            </div>
          </div>
          @endif
      </div>
    </div>
  </div>
</div>
    {!! Html::script('js/metaphor.js') !!}
    <script>
      $('.delete-modal-btn').on('click', function(){
        $('#deleteModal form').attr({
          action: $('html').data('url') + '/project/' + $(this).data('id') + '/delete',
          method: 'GET'
        });
        $('#deleteModal .modal__content h3').text($(this).data('title'));
      })
    </script>
@stop
