@section('title', 'Project Photo Crop')
@extends('layouts.master')

@section('styles')
{!! Html::style('css/Jcrop.css') !!}
{!! Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') !!}
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <br><br>
        <h2 class="type--center type--thin">Crop Project Photo</h2>
        <div class="alert alert--warning" id="warningmsg">
          <strong>Note:</strong> You must update the crop field before proceeding.
        </div>
          {{ Form::open(['url' => route('project.photo-post-crop', ['id' => $projectId])]) }}
          {!! Form::hidden('imagePath', $imageSavePath) !!}
          {!! Form::hidden('projectId', $projectId) !!}
          {!! Form::hidden('x', '0', array('id' => 'cropx')) !!}
          {!! Form::hidden('y', '0', array('id' => 'cropy')) !!}
          {!! Form::hidden('w', $defaultWidth, array('id' => 'cropw')) !!}
          {!! Form::hidden('h', $defaultHeight, array('id' => 'croph')) !!}
        <div class="row">
          <div class="col-sm-12">
            <center>
              <div id="cropImageContainer">
                <img src={{ $imagePath }} id="cropImage" alt="Crop New Project Photo" />
              </div>
            </center>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="type--center width--290">
        <div class="cf">
          <button class="btn btn-default form-btn" data-modal="#delete-modal">Cancel</button>
          {!! Form::submit('Crop Project Photo', ['class' => 'btn btn-primary form-btn pull-right disabled', 'id' => 'cropbtn']) !!}
        </div>
      </div>
    </div>
    {{ Form::close() }}
  </div>

  {{-- Modal to make sure that the user really wants to go back after uploading a picture --}}
  <div id="delete-modal" class="modal__outer">
    <div class="modal">
      <div class="modal__header">
        <strong>Are you sure you want to go back?</strong>
      </div>
      <div class="modal__content">Any changes will not be saved and will leave your project without a photo.</div>
      <div class="modal__footer">
        <div class="pull-right">
          <button class="btn btn-default" data-modal-close="#delete-modal">Cancel</button>
          <a href="{{ route('project.photo-delete', ['id' => $projectId]) }}">
              <button class="btn btn-primary">Delete</button>
          </a>
        </div>
      </div>
      <div class="modal__close" data-modal-close="#delete-modal"><i class="fa fa-times" aria-hidden="true"></i></div>
    </div>
  </div>
@stop

@section('scripts')
{!! Html::script('js/metaphor.js') !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
{!! Html::script('js/Jcrop.js') !!}
{!! Html::script('js/scripts.js') !!}
<script type="text/javascript">
  function registerJCropEvents() {

    var defaultWidth  = Math.min($('#cropw').val(), 210);
    var defaultHeight = Math.min($('#croph').val(), 45);

    $('#cropImage').Jcrop({
      aspectRatio: 42 / 9,
      setSelect: [0,0,defaultWidth,defaultHeight]
    });

    $('#cropImageContainer').on('cropend', function(e,s,c) {
      updateCoords(c);
      $('#cropbtn').removeClass('disabled');
      $('#warningmsg').remove();
    });
  }

  function updateCoords(c) {
    $('#cropx').val(c.x);
    $('#cropy').val(c.y);
    $('#cropw').val(c.w);
    $('#croph').val(c.h);
  };
  registerJCropEvents();
</script>
@stop
