@extends('layouts.master')

@section('styles')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
  <div id="loading__screen"></div>
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <a class="btn btn-default" style="float:right;" href="{{ url('project/step-1') }}">Add a New Project</a>
          <h1 class="type--header type--thin">Innovation Dashboard</h1>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3">
          @include("layouts.partials.admin-sidebar")
        </div>
        <div class="col-lg-9">
          {{-- Displays flash messages associated with interests --}}
          <div class="flash-message">
            @foreach (['danger', 'success'] as $message)
              @if(session()->has($message))
                <div class="alert alert--{{ $message }}">
                  {{ session($message) }}
                  <a href="#" class="alert__close" data-alert-close>&times;</a>
                </div>
              @endif
            @endforeach
          </div>
          {{ Form::open(['class' => 'interests' , 'url' => route('personal-interest.store')]) }}

          {{-- Current personal interests --}}

          <div class="row">
            <div class="form__group">
              <div class="col-sm-12">
                @if (count($currentInterests) > 0)
                  <h2 class="type--thin">Current Personal Interests</h2>
                  @foreach($currentInterests as $interest)
                    <a class="tag tag--danger tag--normal tag--removable interest"
                       href="{{ route('personal-interest.destroy', ['id' => $interest->attribute_id]) }}"
                       title="{{ 'Remove '.$interest->hierarchy.'-'.$interest->title }}">{{ $interest->title }}</a>
                  @endforeach
                @endif
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <h2 class="type--thin">Add Personal Interests</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form__group">
                {{ Form::label('Add specific interests')}}
                {{ Form::select('tags[]', [], null, ['class' => 'js-example-tags', 'multiple'=> 'multiple'])}}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              {{Form::submit('Add interests', ['class' => 'btn btn-primary'])}}
            </div>
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
  </div>

  {!! Html::script('js/metaphor.js') !!}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function() {
          $(".js-example-tags").select2({
            tags: true,
            allowClear: true,
            dataType: 'json',
            ajax: {
                url: "{{ url('/api/personal-interests') }}",
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term
                    }
                },
                processResults: function (data) {
                  if (data) {
                    return {
                      results: data
                    };
                  } else {
                      return {
                          results: []
                      }
                  }
                },
                cache: true
            }
          }).on("select2:select", function(e) {
              // This is going to be the area in which
          });
      });

    // Prevent the user from clicking on everything
    $(".interest").click(function() {
      $(".interest").off("click").each(function() {
        $(this).click(function(e) {
          e.preventDefault();
        })
      });
      showDeleting($(this));
    });

    // This removes text and replaces with spinner
    function showDeleting(elem) {
      elem.html('<i class="fa fa-spinner fa-spin"></i> Deleting').removeClass('tag--removable');
    }

  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  {!! Html::script('js/scripts.js') !!}
@stop







