@section('title', $project->project_title)
@extends('layouts.master')
@section('content')
    <div class="container">
        {{--{{dd($seeking[0]->title)}}--}}
        <br>
        {{-- <div class="row">
            <div class="col-md-12">
                @if ($project->image)
                    <div id="projectPhoto" style="border-style:solid; position: relative";>
                        <img src="{{ env('IMAGE_VIEW_LOCATION').$project->image->src }}" class="img--fluid" alt="Default Project Photo for {{ $project->project_title }}">
                        @can('is-owner', $project)
                            <div style="position:absolute;left: 50%; top: 50%; transform: translate(-50%, -50%);">
                                <a class="btn btn-default btn--full-width" href="{{ route('project.photo-upload', ['id' => $project->project_id]) }}"><i class="fa fa-picture-o"></i> Edit Project Photo</a>
                            </div>
                        @endcan
                    </div>
                @else
                    @can('is-owner', $project)
                        <div id="projectPhoto" style="border-style:dashed; position: relative;">
                            <img src="https://images.unsplash.com/photo-1475092980020-2094a10518d2?dpr=1.25&auto=compress,format&fit=crop&w=840&h=180&q=80&cs=tinysrgb&crop=" class="img--fluid" alt="Project Photo for {{ $project->project_title }}" style="opacity: 0.5">
                            <div style="position:absolute;left: 50%; top: 50%; transform: translate(-50%, -50%);">
                                <a class="btn btn-default btn--full-width" href="{{ route('project.photo-upload', ['id' => $project->project_id]) }}"><i class="fa fa-picture-o"></i> Add Project Photo</a>
                            </div>
                        </div>
                    @endcan
                @endif
            </div>
        </div> --}}
        <br>
        <div id="toggle-featured-row" hidden class="row">
          {{-- Displays flash messages associated with interests --}}
          <div class="flash-message">
            <div role="alertdialog" aria-labelledby="featured projects alert">
              <div id="toggle-featured-alert" class="alert">
                  <span id="toggle-featured-message"></span>
                  <a href="#" class="alert__close" onclick="$('#toggle-featured-row').attr('hidden','hidden')">&times;</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-3 hidden-sm-down">
                @can('is-owner', $project)
                    <div class="mlr--10-0">
                        <a class="btn btn-default btn--full-width" href="{{ url('project/' . $project->slug . '/edit') }}"><i class="fa fa-pencil"></i> Edit Project</a>
                    <br>
                    </div>
                    @if(is_null($project->cayuse_id))
                        <a href="#" data-modal="#deleteModal" data-title="{{ $project->project_title }}" data-id="{{ $project->project_id }}" class="btn btn-primary delete-modal-btn btn--full-width"><i class="fa fa-archive"></i> Archive Project</a>
                        @include('pages.project.partials.delete-modal')
                        <br>
                    @endif
                  <div class="type--header"></div>
                @endcan
                  {{-- Managing the button and messagess for requesting to join the project. --}}
                  <div class="mlr--10-0">
                    {{-- this is where the project is going to check if seeking collaborators --}}
                    @if($attributes->seeking_collaborators && count($project->policies) && $project->visibilityPolicy->policy != 'private')
                        <p class="type--marginless"><strong>Seeking Faculty</strong></p>
                        <div style="margin: 5px 0;">
                          @if(auth()->check() && auth()->user()->hasPendingInvitation($project))
                            {{-- The user has requested to join already.--}}
                            <div style="background: lightblue; padding: 15px;">
                              Your request to join is pending approval of an Investigator.
                            </div>
                          @elseif( session('alreadyMemberMessage') )
                            {{-- If they have just clicked on the button, and the backend response says that they
                            are already a member of the project, then show them the message instead of the button.--}}
                            <div style="background: lightblue; padding: 15px;">
                              {{session('alreadyMemberMessage')}}
                            </div>
                          @else
                            {{-- Show the button --}}
                            <a href="{{ route('project.request-to-join',$project->project_id) }}"
                               class="btn btn-primary btn--full-width">Request to Join</a>
                          @endif
                        </div>
                    @endif
                    @if ($attributes->seeking_students && $project->visibilityPolicy->policy != 'private')
                        <p class="type--marginless"><strong>Seeking Students</strong></p>
                        <div class="mlr--10-0">
                          <a class="btn btn-default btn--full-width" href="{{ route('student-request-form',['projectId'=>$project->project_id]) }}"><i class="fa fa-envelope-o"></i>
                            Apply as a Student</a>
                        </div>
                    @endif
                </div>
                @if( ($attributes->seeking_collaborators || $attributes->seeking_students) && $project->visibilityPolicy->policy != 'private')
                  <div class="type--header"></div>
                @endif
                <div>
                    <p class="milli type--marginless"><strong>Event:</strong></p>
                    <p>{{ $event->first() }}</p>
                </div>
                @if(count($project->award))
                    <p class="milli type--marginless"><strong>Project Sponsors:</strong></p>
                    @foreach($project->sponsorList as $sponsor)
                        <ul class="list--unstyled">
                            <li>{{$sponsor}}</li>
                        </ul>
                    @endforeach
                    <p class="milli type--marginless"><strong>Project Award:</strong></p>
                    <ul class="list--unstyled">
                        <li>${{$project->awardTotal()}}</li>
                    </ul>
                @endif

                    {{-- @if($project->pi)
                        <p class="milli type--marginless"><strong>Project Timeline:</strong></p>
                        <p>{{$project->project_begin_date}} &ndash; {{$project->project_end_date}}</p>
                    @endif --}}
                @if($project->url)
                    <p class="milli type--marginless"><strong>Project Web Page:</strong></p>
                    <ul class="list--unstyled">
                        <li><a href="{{$project->url->link}}">{{$project->url->link}}</a></li>
                    </ul>
                @endif
                @if($project->video)
                    <p class="milli type--marginless"><strong>Project Video:</strong></p>
                    <ul class="list--unstyled">
                        <li><a href={{$project->video->link}}>View Video</a></li>
                    </ul>
                @endif
                <br>
                @if($seeking->count())

                            <p class="milli type--marginless"><strong>Seeking Collaborators:</strong>

                                <span class="tooltip"><i class="fa fa-question-circle" aria-hidden="true"></i>
                                <span class="tooltiptext">
                                            This project is looking for members with the following titles. If you wish to join, contact the team.<br>
                                </span>
                            </span>

                            </p>

                            <ul>
                                @foreach($seeking as $item)
                                <li>{{$item->title}}</li>
                                @endforeach
                            </ul>
                        @endif


                        {{--                 @if($project->pi)
                                            <p class="milli type--marginless"><strong>Lead Principal Investigator:</strong></p>
                                            <div class="dropdown footer-styling">
                                                <a title="{{ $project->pi->display_name }}" class="color--grey nodeco"><img
                                                            class="profile--icon" src="{{$project->pi->profile_image()}}" alt="{{$project->pi->display_name}}'s profile icon"/>
                                                            &nbsp;&nbsp;{{ $project->pi->display_name }}
                                                </a>
                                                <div class="dropdown-content">
                                                    <li>
                                                        <a title="See {{ $project->pi->display_name }}'s projects"
                                                           href="{{ url("project?member=".$project->pi->user_id)}}"
                                                           class="color--grey nodeco">View <b>{{ $project->pi->display_name }}</b>'s
                                                            Projects</a>
                                                    </li>
                                                    <li>
                                                        <a title="See {{ $project->pi->display_name }}'s profile"
                                                           href="{{$project->pi->profile_url()}}" target="_blank"
                                                           class="color--grey nodeco">View <b>{{ $project->pi->display_name }}</b>'s Profile</a>
                                                    </li>
                                                </div>
                                            </div>
                                        @endif --}}
                @if($project->members)
                    <p class="milli"><strong>Project Team:</strong></p>
                    <ul class="list">
                        @foreach($project->members as $member)
                            <li class="dropdown footer-styling">
                                <div>
                                    <a title="{{ $member->display_name }}" class="color--grey nodeco"><img
                                                class="profile--icon" src="{{ $member->profile_image() }}" alt="{{$member->display_name}}'s profile icon"/>
                                      &nbsp;&nbsp;{{ $member->display_name }}
                                    </a>
                                    <ul class="dropdown-content">
                                        <li>
                                            <a title="View {{ $member->display_name }}'s projects"
                                               href="{{ url("project?member=".$member->user_id)}}"
                                               class="color--grey nodeco">View <b>{{ $member->display_name }}</b>'s
                                                Projects</a>
                                        </li>
                                        @if($member->affiliation=="faculty")
                                        <li>
                                            <a title="View {{ $member->display_name }}'s profile"
                                               href="{{$member->profile_url()}}" target="_blank"
                                               class="color--grey nodeco">View <b>{{ $member->display_name }}</b>'s
                                                Profile</a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </li>
                            <li class="pl--45"><h6 class="type--thin">{{$member->pivot->role_position}}</h6></li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="col-md-9">
                <div class="row">
                    <h1 class="kilo type--thin type--marginless">
                        {{-- Button for featuring the project.--}}
                        {{$project->project_title}}
                    </h1>
                </div>
                <hr>
                <div class="hidden-md-up">
                        @can('is-owner', $project)
                            <div class="mlr--10-0">
                                <a class="btn btn-default btn--full-width"
                                   href="{{ url('project/' . $project->slug .'/edit') }}"><i
                                            class="fa fa-pencil"></i> Edit Project</a>
                                <br>
                            </div>
                            @if(is_null($project->cayuse_id))
                                <a href="#" data-modal="#deleteModal" data-title="{{ $project->project_title }}"
                                   data-id="{{ $project->project_id }}"
                                   class="btn btn-primary delete-modal-btn btn--full-width"><i
                                            class="fa fa-trash"></i> Delete Project</a>
                                <br><br>
                            @endif
                          <div class="type--header"></div>
                        @endcan
                    {{-- Mobile view: Managing the button and messagess for requesting to join the project. --}}
                    <div class="mlr--10-0">
                      @if($attributes->seeking_collaborators && count($project->policies) && $project->visibilityPolicy->policy != 'private')
                        <p class="type--marginless"><strong>Seeking Faculty</strong></p>
                        <div style="margin: 5px 0;">
                          @if(auth()->check() && auth()->user()->hasPendingInvitation($project))
                            {{-- The user has requested to join already.--}}
                            <div style="background: lightblue; padding: 15px;">
                              Your request to join is pending approval of an Investigator.
                            </div>

                          @elseif( session('alreadyMemberMessage') )
                            {{-- If they have just clicked on the button, and the backend response says that they
                            are already a member of the project, then show them the message instead of the button.--}}
                            <div style="background: lightblue; padding: 15px;">
                              {{session('alreadyMemberMessage')}}
                            </div>
                          @else
                            {{-- Show the button --}}
                            <a href="{{ route('project.request-to-join',$project->project_id) }}"
                               class="btn btn-primary btn--full-width">Request to Join</a>
                          @endif
                        </div>
                      @endif
                      {{-- if seeking students--}}
                        @if($attributes->seeking_students && $project->visibilityPolicy->policy != 'private')
                            <p class="type--marginless"><strong>Seeking Students</strong></p>
                            <div class="mlr--10-0">
                                <a class="btn btn-default btn--full-width" href="{{ route('student-request-form',['projectId'=>$project->project_id]) }}"><i class="fa fa-envelope-o"></i>
                                    Apply as a Student</a>
                            </div>
                        @endif
                    </div>
                    @if($project->visibilityPolicy->policy != 'private' && ($attributes->seeking_collaborators || $attributes->seeking_students))
                      <div class="type--header"></div>
                    @endif
                    <div>
                        <p class="milli type--marginless"><strong>Event: </strong></p>
                        <p>{{ $event->first() }}</p>
                    </div>
                    @if(count($project->award))
                        <p class="milli type--marginless"><strong>Project Sponsors:</strong></p>
                        @foreach($project->sponsorList as $sponsor)
                            <ul class="list--unstyled">
                                <li>{{$sponsor}}</li>
                            </ul>
                        @endforeach
                        <p class="milli type--marginless"><strong>Project Award:</strong></p>
                        <ul class="list--unstyled">
                            <li>${{$project->awardTotal()}}</li>
                        </ul>
                    @endif
                    {{-- @if($project->pi)
                        <p class="milli type--marginless"><strong>Project Timeline:</strong></p>
                        <p>{{$project->project_begin_date}} &ndash; {{$project->project_end_date}}</p>
                    @endif --}}
                    @if($project->link)
                        @if($project->link->link_type == 'youtube')
                            @if($project->link->link)
                                <p class="milli type--marginless"><strong>Project Video:</strong></p>
                                <ul class="list--unstyled">
                                    <li><a href={{$project->link->link}}>View Video</a></li>
                                </ul>
                            @endif
                        @endif
                    @endif
                    @if($project->project_url)
                        <p class="milli type--marginless"><strong>Project Web Page:</strong></p>
                        <ul class="list--unstyled">
                            <li><a href="{{$project->project_url}}">{{$project->project_url}}</a></li>
                        </ul>
                    @endif
                    <br>
                    @if($project->pi)
                        <p class="milli type--marginless"><strong>Lead Principal Investigator:</strong></p>
                        <div class="dropdown footer-styling">
                            <a title="{{ $project->pi->display_name }}" class="color--grey nodeco"><img
                                        class="profile--icon" src="{{$project->pi->profile_image()}}" alt="{{$project->pi->display_name}}'s profile icon"/>
                                        {{ $project->pi->display_name }}
                            </a>

                            <div class="dropdown-content">
                                <li>
                                    <a title="See {{ $project->pi->display_name }}'s projects"
                                       href="{{ url("project?member=".$project->pi->user_id)}}"
                                       class="color--grey nodeco">View <b>{{ $project->pi->display_name }}</b>'s
                                        Projects</a>
                                </li>
                                <li>
                                    <a title="See {{ $project->pi->display_name }}'s profile"
                                       href="{{$project->pi->profile_url()}}" target="_blank"
                                       class="color--grey nodeco">View <b>{{ $project->pi->display_name }}</b>'s Profile</a>
                                </li>
                            </div>
                        </div>
                    @endif
                    <br><br>
                    @if(count($project->members)>0)
                        <p class="milli"><strong>Project Team:</strong></p>
                        <div class="table--responsive">
                            <table class="table table--simple bg--off-white">
                                <tbody>
                                @foreach ($project->members->chunk(2) as $chunk)
                                    <tr>
                                        @foreach($chunk as $member)
                                            <td class="dropdown-grid list">
                                                <li class="footer-styling">
                                                    <div>
                                                        <a title="{{ $member->display_name }}" class="color--grey nodeco"><img class="profile--icon" src="{{ $member->profile_image() }}" alt="{{$member->display_name}}'s profile icon"/>
                                                          {{ $member->display_name }}
                                                        </a>
                                                    </div>
                                                </li>
                                                <li class="pl--45">
                                                    <h6 class="type--thin">{{$member->pivot->role_position}}</h6>
                                                </li>
                                                <ul class="dropdown-content">
                                                    <li>
                                                        <a title="View {{ $member->display_name }}'s projects"
                                                           href="{{ url("project?member=".$member->user_id)}}"
                                                           class="color--grey nodeco">View
                                                            <b>{{ $member->display_name }}</b>'s Projects</a>
                                                    </li>
                                                    <li>
                                                        <a title="View {{ $member->display_name }}'s profile"
                                                           href="{{$member->profile_url()}}" target="_blank"
                                                           class="color--grey nodeco">View
                                                            <b>{{ $member->display_name }}</b>'s Profile</a>
                                                    </li>
                                                </ul>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            <div class="col-md-10">
                <div class="article">
                    <div class="row"><p class="intro">{!! nl2br(e($project->abstract)) !!}</p></div>
                    @if(count($project->tags))
                    <div class="row">
                        <p><strong>Project Tags:</strong></p>
                        @foreach($project->tags as $tag)
                            <a
                               title="{{ $tag->tag }}"
                               class="btn btn-primary btn-sm">
                              {{$tag->tag}}
                            </a>
                        @endforeach
                    </div>
                        <br><br><br><br><br>
                    @endif
                </div>
                </div>
            <div class="col-md-2">
                            <div class="row">
                                <span id="likeCount" style="float: right;">{{$likes}} Likes</span>
                            </div>
                            <div class="row">
                        @if(auth()->user())
                            <span style="float: right;">
                            @if($liked)
                                <span id="toggle-like-button" class="btn-default" style="background-color:inherit;" title="Unlike This Project">
                                    <span id="likeText"> Unlike</span><i id="like-icon" class="fa fa-thumbs-up type--red" style="margin-left: 5px;" aria-hidden="true" alt="filled-thumbs-up-icon"></i>
                                    </span>
                            @else
                                <span id="toggle-like-button" class="btn-default" style="background-color:inherit;" title="Like This Project">
                                    <span id="likeText"> Like</span><i id="like-icon" class="fa fa-thumbs-o-up" style="margin-left: 5px;" aria-hidden="true" alt="hollow-thumbs-up-icon"></i>
                                </span>
                            @endif
                            </span>
                            </div>
                            <div class="row">
                            <span style="float: right;">
                                @if(auth()->user()->hasRole('admin'))
                                    @if($attributes->is_featured)
                                        <span id="toggle-featured-button" class="btn-default"
                                              style="background-color:inherit;" title="Un-Feature This Project">
                                        <span id="featureText"> Un-Feature </span><i id="featured-star-icon" class="type--red fa fa-star" alt="filled-star-icon"></i>
                                        </span>
                                    @else
                                        <span id="toggle-featured-button" class="btn-default" style="background-color:inherit;" title="Feature This Project">
                                        <span id="featureText"> Feature </span><i id="featured-star-icon" class="fa fa-star-o" alt="hollow-star-icon"></i>
                                        </span>
                                    @endif
                                @endif
                        @else 
                        <a href="/login" id="logIn-like-button" class="btn-default" style="background-color:inherit; float: right;" title="Sign in to like this project">
                                <span id="likeText"> Like</span><i id="like-icon" class="fa fa-thumbs-o-up" style="margin-left: 5px;" aria-hidden="true" alt="hollow-thumbs-up-icon"></i>
                            </a>
                        @endif
                        </span>
                            </div>
                </div>
                <br><br><br><br><br>
            </div>
    </div>
@stop
@section('scripts')
    {!! Html::script('js/metaphor.js') !!}
    {!! Html::script('js/jquery.min.js') !!}

    @can('is-owner', $project)
        <script>
            $('.delete-modal-btn').on('click', function () {
                $('#deleteModal form').attr({
                    action: $('html').data('url') + '/project/' + $(this).data('id') + '/delete',
                    method: 'GET'
                });
                $('#deleteModal .modal__content h3').text($(this).data('title'));
            });
        </script>
    @endcan
    {{-- Script for toggling featured projects. --}}
  <script type="text/javascript">
    // on focus out

    var likes = JSON.parse("{!! json_encode($likes) !!}");

    function toggleStar(data)
    {
      var buttonText = "Feature This Project";
      if (data.is_featured) {
        buttonText = "Un-" + buttonText;
        //Fill in the star
        $('#featured-star-icon').removeClass('fa-star-o').addClass('fa-star').addClass('type--red').attr('alt','filled-star-icon');
        $('#featureText').html(" Un-Feature ");
      }
      else {
        //Make the star hollow
        $('#featured-star-icon').removeClass('fa-star').removeClass('type--red').addClass('fa-star-o').attr('alt','hollow-star-icon');
        $('#featureText').html(" Feature ");
      }
      $('#toggle-featured-button').attr("title",buttonText);

      //Show message
      $('#toggle-featured-alert').removeClass('alert--danger').addClass('alert--success');
    }
    
    $('#toggle-like-button').click(function(){
        //$("#toggle-like-button").prop("disabled",true);   
        
        var buttonText = "Like this Project";
        if ($('#like-icon').hasClass('fa-thumbs-o-up')){
            buttonText = "Unlike this Project";
            //Fill in the like
            $('#like-icon').removeClass('fa-thumbs-o-up').addClass('fa-thumbs-up').addClass('type--red').attr('alt','filled-thumbs-up-icon');
            $('#likeText').html(" Unlike");
            likes += 1;
            $('#likeCount').html(likes + " Likes");
        }
        else {
            //Make the like hollow
            $('#like-icon').removeClass('fa-thumbs-up').removeClass('type--red').addClass('fa-thumbs-o-up').attr('alt','hollow-thumbs-up-icon');
            $('#likeText').html(" Like");
            likes -= 1;
            if(likes == 1)
            $('#likeCount').html(likes + " Like");
            else
            $('#likeCount').html(likes + " Like");
        }
        $('#toggle-like-button').attr("title",buttonText);
     
        //Ajax call to back end to update likes
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }});
        $.ajax({
            url: '{{route('project.like')}}',
            type: "POST",
            data: JSON.stringify(
                {
                    project_id:"{{$project->project_id}}"
                }
            ),
            contentType: "application/json; charset=utf-8",
            dataType   : "json",
            success    : function(data){
                console.log(data);
            },
            //complete : function(){
            //    $("#toggle-like-button").prop("disabled",false);
            //} 
    });

    function displayErrorMessage()
    {
      $('#toggle-featured-alert').addClass('alert--danger').removeClass('alert--success');
    }

    $("#toggle-featured-button").click(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $("html.no-js").attr('data-token')
        }
      });
      $.ajax({
        method: "PUT",
        url: '{{ route('project.toggle-featured', ['projectId'=>$project->project_id]) }}',
        data: {
            project_id: "{{$project->project_id}}"
        },
        success: function(data){

          if(data.status >= 400)
          {
              displayErrorMessage();
          }
          else
          {
              toggleStar(data);
          }
          $('#toggle-featured-row').removeAttr('hidden');
          $('#toggle-featured-message').text(data.message);
        }
      })
    });

    });
  </script>
@stop

{{-- Section for cleaning up session storage:
I have to do the following ugly php command because of a bug in Laravel 5.2 regarding flash messages.
 Please see my comment in the InvitationController@selfInvitation method.
This must be done at the end of the blade file because the session value is used twice:
Once for desktop view, and once for mobile view.
--}}
@php
  // Remove the session value by its key.
  session()->forget('alreadyMemberMessage');
@endphp
