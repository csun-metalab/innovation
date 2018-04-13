@extends('layouts.master')
@section('content')

    <div class="create__section">
        <div class="container">
            <br>
            <br>
            <h1 class="type--marginless type--thin type--white">Create a Project</h1>
            <br>
            <br>
            {{--<div class="uploader type--center" id="upload-image">--}}
            {{--<form class="type--center">--}}
            {{--<h1 class="fa fa-upload mega"></h1>--}}
            {{--<br>--}}
            {{--<strong id="upload">Upload a cover photo</strong>--}}
            {{--<!-- <img src="" id="hide"/> -->--}}
            {{--<br>--}}
            {{--<input id="photoLoad" type="file" accept="image/*" onload="fileName()">--}}
            {{--<div id="filePreview"></div>--}}
            {{--</form>--}}
            {{--</div>--}}

            {{--<br>--}}
            {{--<form>--}}
            {{--<label class="type--thin type--left" for="video">Video</label>--}}
            {{--<input type="url" style="width: 50%" id="video" placeholder="https://">--}}
            {{--</form>--}}
        </div>
    </div>
    <br>
    <div class="container">
        <form>
            <div class="row">
                <div class="col-md-8">
                    <label class="label--required type--left type--thin" for="title">Project Title</label>
                    <input type="text" id="title" placeholder="Enter a title...">
                </div>
                <div class="col-md-4">
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
        <hr>
        <form>
            <div class="row">
                <div class="col-md-6">
                    <label class="label--required type--left type--thin" for="members">Team Members</label>
                    <input type="text" id="members" placeholder="Add a new member...">
                </div>
                <div class="col-md-5">
                    <label class="label--required type--left type--thin" for="role">Role</label>
                    <input type="text" id="role" placeholder="Enter a role...">
                </div>
                <div class="col-md-1 margin-top--20 type--center">
                    <button role="button" class="btn btn-primary type--center">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add
                    </button>
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
        <hr>
        <br>
        <form>
            <label class="label--required type--thin type--left">Description</label>
            <textarea id="description" name="description" placeholder="Enter a description..."></textarea>
        </form>
        <br>
        <form>
            <div>
                <label class="type--thin type--left form--long">Website</label>
                <input class="form--long" type="url" id="website" placeholder="https://">
            </div>
        </form>
        <br>
        <div class="row">
            <form>
                <div class="col-md-6" id="create__problem">
                    <label class="label--required type--left type--thin" id="tags">Problem</label>
                    <input class="form--long" type="text" id="tags" placeholder="Enter a new problem...">
                </div>
            </form>
            <form>
                <div class="col-md-6" id="create__solution">
                    <label class="label--required type--left type--thin form--long" id="tags">Solution</label>
                    <input class="form--long" type="text" id="tags" placeholder="Enter a new solution...">
                </div>
            </form>
        </div>
        <br>
        <br>

        <div class="col-md-12 col-xs-12 type--center">
            <div class="col-md-6 col-xs-6 type--right">
                <button class="btn btn-default" role="button">Cancel</button>
            </div>
            <div class="col-md-6 col-xs-6 type--left">
                <button class="btn btn-primary" role="button">Submit</button>
            </div>
        </div>
    </div>

@stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    //changes default upload button to the Upload text
    // $(function () {
    //     $("#upload").on('click', function (e) {
    //         e.preventDefault();
    //         $("#photoLoad:hidden").trigger('click');
    //     });
    // });
    //
    // //preview cover photo filename
    // var input = document.getElementById('photoLoad');
    // var infoArea = document.getElementById('filePreview');
    //
    // input.addEventListener('change', showFileName);
    //
    // function showFileName(event) {
    //     var input = event.srcElement;
    //     var fileName = input.files[0].name;
    //     infoArea.textContent = 'Uploaded ' + fileName + '!';
    // }
</script>