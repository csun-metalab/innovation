@extends('layouts.master')
@section('content')
    <div class="section" style="background-color: #252525;">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="type--white type--thin type--marginless">Create a Project</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <br>
      <div class="row">
          <div class="col-xl-8">
            <div class="form__group">
              {{Form::label('title','Project Title',['class'=>'label--required type--left type--thin'])}}
              {{Form::text('title','',['placeholder'=> "Enter a title..", 'id' => 'title'])}}
            </div>
          </div>
          <div class="col-xl-4">
            <div class="form__group">
              {{Form::label('projectEvent','Term/Event',['class'=>'label--required type--left type--thin'])}}
              {{Form::select('projectEvent',['Select an Event','Bull Ring','I-Corps','Other'])}}
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="form__group">
            {{Form::label('description','Description',['id'=>'label--required type--thin type--left'])}}
            {{Form::textArea('description','',['placeholder'=>'Enter a description...', 'id'=>'description'])}}
          </div>
        </div>
      </div>
      <form>
          <label for="youtube">Video
              <div class="tooltip"><i class="fa fa-question-circle" aria-hidden="true"></i>
                  <span class="tooltiptext">
                      YouTube and Vimeo are the currently supported video-sharing web sites<br>
                  </span>
              </div>
          </label>
          {!! Form::text('youtube', '', ['class'=>'form-control', 'placeholder' => 'http://', 'id' => 'youtube']) !!}
          <small hidden="true" style="color:#ff0011" id="youtubemsg">* Video URL must be from YouTube or Vimeo</small>
        </form>
        <hr>
        <div class="row">
            <div class="col-lg-6 col-md-5">
              <div class="form__group">
                {{Form::label('members','Team Members',['class'=>'label--required type--left type--thin'])}}
                {{Form::select('members',[],null,['id'=>'members','class'=>'select2-collaborator','placeholder'=>'Add a new member...'])}}
              </div>
            </div>
            <div class="col-xs-8 col-md-5">
              <div class="form__group">
                {{Form::label('role','Role',['class'=>'label--required type--left type--thin'])}}
                {{Form::text('role','',['placeholder'=>'Enter a role...','id'=>'role'])}}
              </div>
            </div>
            <div class="col-xs-4 col-md-1 margin-top--25 type--center">
                <button role="button" class="btn btn-primary type--center">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add
                </button>
            </div>
        </div>
        <hr>
      <hr>
      <div class="row">
        <div class="col-sm-12">
          <div class="uploader type--center" id="upload-image">
            <form class="type--center">
              <span id="upload">
              <h1 class="fa fa-upload mega"></h1>
              <br>
              <strong >Upload a cover photo</strong>
              </span>
              <!-- <img src="" id="hide"/> -->
              <br>
              <input id="photoLoad" type="file" accept="image/*" onload="fileName()">
              <div id="filePreview"></div>
            </form>
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-xs-12">
            <div class="table--responsive">
                <table class="table table--bordered table--striped table--padded table--hover">
                    <thead>
                    <th>Team Member</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>Example</td>
                        <td>
                            <select name="status" id="status">Status
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </td>
                        <td>
                            <button type="button" class="btn btn-link" role="button">Remove</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xs-12">
            <div class="form__group">
              {{Form::label('url','Website',['class'=>'type--thin type--left'])}}
              {{Form::text('url','',['placeholder'=>'https://','id'=>'website'])}}
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <div class="form__group">
              {{Form::label('tags','Tags',['class'=>'label--required type--left type--thin'])}}
              {{ Form::select('tags[]', ['',''], null, ['class' => 'select2-tags tags', 'multiple' => 'multiple']) }}
            </div>
          </div>
        </div>
        <div class="type--center">
          <a href="{{url('/project')}}" class="btn btn-default">Cancel</a>
          <button class="btn btn-primary" role="button">Submit</button>
        </div>
    </div>

@stop
@section('scripts')
    {{-- for ajax request csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! Html::script('js/metaphor.js') !!}
    {!! Html::script('js/jquery.min.js') !!}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $(".select2-tags").select2({
          allowClear: true,
          language: {
             noResults: function(){
                 return 'No results found. Create your own by typing the Project Theme and then pressing Enter...';
             }
          },
          placeholder: 'Enter a new tag...',
          tags: true,
        })
        .on('select2:selecting', function(event){
            $('<option/>', {
              id: event.params.args.data.id + '--' + event.params.args.data.text,
              value: event.params.args.data.id + '--' + event.params.args.data.text,
              text: event.params.args.data.text,
              selected: true
            }).appendTo(this);
            $(this).find('option[value="' + event.params.args.data.id + '"]').remove();
          })
        .on('change', function(){
          if(!$(this).siblings('ul').children('li:last-child').is(':visible'))
          {
            $(this).siblings('ul').children('li:last-child').show();
          }
          $(this).siblings('ul').children('li:last-child').html('&#183 Saving...');
          setTimeout($.proxy(function(){
            $(this).siblings('ul').children('li:last-child').html('&#183 Saved!').delay(100).fadeOut();
          }, this), 300);
        });
        $('.form-btn').on('click', function(e){
          $('input[name=action]').val($(this).attr('data-action'));
          return $('.project-create-form').submit();
        })
    </script>
    <script type="text/javascript">
      var collaborators = $(".select2-collaborator");
      $( ".select2-collaborator" ).select2({     
        width:'100%', 
          ajax: {
            url: window.HELIX.env.url + "/api/collaborators",
              dataType: 'json',
              delay: 250,
              data: function (params) {
                  return {
                      q: params.term // search term
                  };
              },
              processResults: function (data) {
                  return {
                      results: data
                  };
              },
              cache: true
          },
          placeholder: 'Search for faculty members...',
          minimumInputLength: 3
      });
    </script>
  
  {!! Html::script('js/scripts.js') !!} 

  {{-- javascript for validation of youtube link --}}
  <script type="text/javascript">
      $("#youtube").focusout(function() {
          // find variables
          var yturl = $(this).val();
          var element = $(this);
          var message = $("#youtubemsg");

          if (yturl.length == 0) { // input is empty: don't show message
              element.css('border-color', '#ccc');
              message.attr("hidden", "true");
          }
          else { // there is input: ajax to validate
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
              $.ajax({
                method: "POST",
                url: '{{ route('validateYoutube') }}',
                data: {url: yturl},
                success: function(data) {
                  if (data == "true") {
                      element.css('border-color', '#ccc');
                      message.attr("hidden", "true");
                  } else {
                      element.css('border-color', '#ff0011');
                      message.removeAttr("hidden");
                  }
              },
          });
      }
    });
  </script>
  <script>
      //changes default upload button to the Upload text
      $(function () {
          $("#upload").on('click', function (e) {
              e.preventDefault();
              $("#photoLoad:hidden").trigger('click');
          });
      });

      //preview cover photo filename
      var input = document.getElementById('photoLoad');
      var infoArea = document.getElementById('filePreview');

      input.addEventListener('change', showFileName);

      function showFileName(event) {
          var input = event.srcElement;
          var fileName = input.files[0].name;
          infoArea.textContent = 'Uploaded ' + fileName + '!';
      }
  </script>
@stop