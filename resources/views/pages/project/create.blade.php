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
  {{--<div class="uploader type--center" id="upload-image">--}}
    {!! Form::open(['url' => 'foo/bar']) !!}
    {{--<form class="type--center">--}}
      {{--<h1 class="fa fa-upload mega"></h1>--}}
      {{--<br>--}}
      {{--<strong>Upload a cover photo</strong>--}}
      {{--<!-- <img src="" id="hide"/> -->--}}
      {{--<br>--}}
      {{--<input id="photoLoad" type="file" accept="image/*">--}}
  {{--</div>--}}
  {{--</form>--}}
    {{ Form::file('image') }}
  <br>
  <br>
  {{ Form::text('video','https://') }}
  {{--<form>
    <label class="type--thin type--left" for="video">Video</label>
    <input type="url" style="width: 50%" id="video" placeholder="https://">
  </form>--}}
  <br>
  <br>
  <form>
    <div class="row">
      <div class="col-xl-8">

        <label class="label--required type--left type--thin" for="title">Project Title</label>
        <input type="text" id="title" placeholder="Enter a title...">
      </div>

      <div class="col-xl-4">
        <label class="label--required type--left type--thin" for="title">Term/Event</label>
        <select name="projEvent" id="projEvent">
          <option value="">Select an Event</option>
          <option value="">Bullring</option>
          <option value="">I-Corps</option>
          <option value="">Other</option>
        </select>
      </div>
    </div>
  </form>
  <br>
  <br>
  <form>
    <div class="row">
      <div class="col-xl-6">
        <label class="label--required type--left type--thin" for="members">Team Members</label>
        <input type="text" id="members" placeholder="Add a new member...">
      </div>
      <div class="col-xl-5">
        <label class="label--required type--left type--thin" for="role">Role</label>
        <input type="text" id="role" placeholder="Enter a role...">
      </div>
      <div class="col-xl-1 margin-top--20 type--center">
        <button role="button" class="btn btn-primary type--center">
          <i class="fa fa-plus" aria-hidden="true"></i> Add</button>
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
  </form>

  <br>
  <br>

  <form>
    <label class="label--required type--thin type--left">Description</label>
    <textarea id="description" name="description" placeholder="Enter a description..."></textarea>
  </form>

  <br>
  <br>

  <form>
    <div>
      <label class="type--thin type--left">Website</label>
      <input type="url" style="width: 50%" id="website" placeholder="https://">
    </div>
  </form>

  <br>
  <br>

  <form>
    <div>
      <label class="label--required type--left type--thin" id="tags">Tags</label>
      <input type="text" style="width: 50%" id="tags" placeholder="Enter a new tag...">
    </div>
  </form>

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