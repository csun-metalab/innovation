@extends('layouts.master')

@section('styles')
{!! Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') !!}

<!-- PROGRESS BAR -->
@endsection

@section('content')
  <div id="loading__screen"></div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <br><br>
        <h2 class="type--center type--thin">Project Theme</h2>
        <br>
        <div class="timeline type--center">

          <ul class="progressbar" >
          <li title="Create A Project" class="active form-btn" data-action="back"> Create A project </li>
          <li title="Project Themes" class="active" >Project Theme</li>
          <li title="Add Collaborators" class="form-btn" data-action="next">Add Collaborators</li>
          <li title="Finish" class="form-btn form-btn-check">Finish</li>
          </ul>

        </div>
        <br><br>
      </div>
      </div>
      <div class="col-sm-8 col-sm-offset-2">
        {{ Form::open(['class' => 'project-create-form']) }}
        <div class="row">
          <div class="col-sm-6">
            {{ Form::label('Academic Discipline') }}
            {{ Form::select('category', $categories, null, ['class' => 'category select2-category', 'data-type' => 'category'] ) }}
          </div>
          <div class="col-sm-6">
            {{ Form::label('Sub-discipline') }}
            {{ Form::select('subcategory', $subcategories, null, ['class' => 'subcategory select2-category', 'data-type' => 'subcategory']) }}
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-12">
            <ul class="list--inline margin--0">
              <li>{{ Form::label('Project Theme') }}</li>
              <li class="margin-left--5"></li>
            </ul>
            {{ Form::select('tags[]', $tags, null, ['class' => 'select2-tags tags', 'multiple' => 'multiple']) }}
          </div>
        </div>
      </div>        
    </div>
    <br>
      <div class="type--center width--290">
        <input type="hidden" value="" name="action">
        <a title="Previous Step" href="#" class="btn btn-default form-btn width--132"  data-action="back">Previous Step</a>
        <a title="Next Step" href="#" class="btn btn-primary form-btn width--132R"  data-action="next">Next Step</a>
        </div>
      {{ Form::close() }}
  </div>


@stop

@section('scripts')
{!! Html::script('js/scripts.js') !!} 
{!! Html::script('js/metaphor.js') !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
    $('.category').select2({
      placeholder: 'Select a category...'
    });

    $('.subcategory').select2({
      placeholder: 'Select a subcategory...'
    });


  $('.form-btn').on('click', function(e){
    $('input[name=action]').val($(this).attr('data-action'));
    return $('.project-create-form').submit();
  })
</script>
{!! Html::script('js/scripts.js') !!} 
@stop
