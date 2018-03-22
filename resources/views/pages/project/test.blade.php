@extends('layouts.master')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="cropit/cropit.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="croppie/croppie.css">
<script type="text/javascript" src="upload.js"></script>
<link rel="stylesheet" href="style.css">

<style>
.cropit-preview {
  /* You can specify preview size in CSS */
  width: 960px;
  height: 540px;
}
</style>

<!-- This wraps the whole cropper -->
<div id="image-cropper">
  <!-- This is where the preview image is displayed -->
  <div class="cropit-preview"></div>
  
  <!-- This range input controls zoom -->
  <!-- You can add additional elements here, e.g. the image icons -->
  <input type="range" class="cropit-image-zoom-input" />
  
  <!-- This is where user selects new image -->
  <input type="file" class="cropit-image-input" />
  
  <!-- The cropit- classes above are needed
       so cropit can identify these elements -->
</div>

<script>
$('#image-cropper').cropit();

// In the demos I'm passing in an imageState option
// so it renders an image by default:
// $('#image-cropper').cropit({ imageState: { src: { imageSrc } } });

// Exporting cropped image
$('.download-btn').click(function() {
  var imageData = $('#image-cropper').cropit('export');
  window.open(imageData);
});
</script>
