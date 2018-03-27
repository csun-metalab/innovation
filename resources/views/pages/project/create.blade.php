@extends('layouts.master') @section('content')
<link rel="stylesheet" href="croppie.css" />
<script src="croppie.js"></script>

<style>


  .uploader {
    position: relative;
    overflow: hidden;
    width: 1111px;    
    height: 315px;
    padding-top: 100px;
    padding-bottom: 100px;
    border: dashed rgba(0, 0, 0, 0.1);
    opacity: 20%;
  }

  /* #filePhoto {
    position: absolute;
    width: 100%;
    height: 100%;
    top: -50px;
    left: 0;
    z-index: 2;
    opacity: 0;
    cursor: pointer;
  } */

  /* .uploader img {
    position: absolute;
    width: 100%;
    height: 100%;
    top: -1px;
    left: -1px;
    z-index: 1;
    border: none;
  } */

  /* #hide{
    width:100%;
    height:100%
  } */

  #photoLoad{
    padding-top: 10px;
    text-align: center;
  }

</style>

<div class="container">
  <br>
  <br>
  <h1 class="type--left type--thin">Create a Project</h1>
  <br>
  <div class="uploader type--center" id="upload-image">
    {!! Form::open(['url' => 'foo/bar']) !!}
      <h1 class="fa fa-upload mega"></h1>
      <br>
      {{ Form::label("profile_image", "Upload a Cover Photo") }}
      {{ Form::file('profile_image') }}
  </div>
  <br>
  {{ Form::label("video", "Video") }}
  {{ Form::text("video","https://") }}
  <br>
  <br>
  <div class="row">
    <div class="col-xl-8">
      {{ Form::label("title", "Project Title") }}
      {{ Form::text("title",null, array('placeholder' => 'Enter a Title..')) }}
    </div>

    <div class="col-xl-4">
      {{ Form::label("project_event", "Term/Event") }}
      {{ Form::select("project_event", ["BR" => "Bullring", "IC" => "I-Corps", "OT" => "Other"]) }}

    </div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="col-xl-6">
      {{ Form::label("members", "Team Members") }}
      {{ Form::text("members", null, array("placeholder" => "Add a new member...")) }}
    </div>
    <div class="col-xl-5">
      {{ Form::label("role", "Role") }}
      {{ Form::text("role", null, array("placeholder" => "Enter a role...")) }}
    </div>
    <div class="col-xl-1 margin-top--20 type--center">
      {{ Form::button('<i class="fa fa-plus" aria-hidden="true"> Add</i>', ["class" => "btn btn-primary"]) }}
    </div>
  </div>
  <br>
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
            {{ Form::select("status", ["A" => "Active", "I" => "Inactive"])}}
          </td>
          <td>
            {{ Form::button("Remove", ["class" => "btn btn-link"]) }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  {{ Form::label("description", "Description") }}
  {{ Form::textarea("description", null, ["placeholder" => "Enter a description...", "size" => "30x4"])}}

  <br>
  {{ Form::label("website") }}
  {{ Form::text("website","https://") }}

  <br>

    {{ Form::label("tags")}}
    {{ Form::text("tags", null, ["placeholder" => "Enter a new tag..."])}}

  <br>
  <br>

  <div class="type--center">
    <button class="btn btn-primary" role="button">Submit</button>
  </div>
</div>
{!! Form::close() !!}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
// $('#hide').hide()
//   var imageLoader = document.getElementById('filePhoto');
//   imageLoader.addEventListener('change', handleImage, false);

//   function handleImage(e) {
//     var reader = new FileReader();
//     reader.onload = function (event) {
//       $('#hide').show()
//       $('.uploader img').attr('src', event.target.result);
//     }
    
//     reader.readAsDataURL(e.target.files[0]);
    
//   }


// //croppie

// var $image_crop
// $image_crop = $('#upload-image').croppie({
// 	enableExif: true,
// 	viewport: {
// 		width: 200,
// 		height: 200,
// 		type: 'square'
// 	},
// 	boundary: {
// 		width: 300,
// 		height: 300
// 	}
// });
// $('#filePhoto').on('change', function () { 
// 	var reader = new FileReader();
// 	reader.onload = function (e) {
// 		$image_crop.croppie('bind', {
// 			url: e.target.result
// 		}).then(function(){
// 			console.log('jQuery bind complete');
// 		});			
// 	}
// 	reader.readAsDataURL(this.files[0]);
// });  


</script>

@endsection