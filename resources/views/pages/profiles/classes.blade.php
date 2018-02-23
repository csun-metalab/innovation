  @extends('layouts.master')
@section('navTitle')
Profiles
@stop

@section('content')
@include('pages.profiles.profile')

  <div class="section" style="background-color: #f9f9f9;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
         @include('layouts.sub_nav')
         
            <div class="pull-right">
              <label class="sr-only" for="semester">Semester</label>
              <select name="" id=""> 
                <option value="">-- Select Term --</option>
                <option value="2167" selected="selected">Fall Semester 2016</option><option value="2165">Summer Term 2016</option><option value="2163">Spring Semester 2016</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
    <h2 class="type--header type--thin">Class Schedule </h2>
      <div class="row">
        <div class="col-md-12">
        <style>
          table thead th, table tbody td {
            padding: 10px;
          }
          tr {border-bottom: 1px solid #efefef;}
        </style>
        <div class="bg--white" style="padding:25px; border-radius: 3px;">
          <div class="table--responsive">
          <table class="table">
            <thead>
              <tr style="text-transform: uppercase;">
                <th>Class</th>
                <th style="text-align: center;">Days</th>
                <th style="text-align: center;">Time</th>
                <th style="text-align: center;">Location</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div><strong>COMP 122</strong> <em>(15933)</em></div>
                  <div>Computer Architecture and Assembly Language</div>
                </td>
                <td width="10%" align="center">MoWe</td>
                <td align="center">05:00 PM - 05:25 PM</td>
                <td align="center" width="10%"><i class="fa fa-map-marker" aria-hidden="true"></i> JD 2214</td>
                <td align="middle">
                  <a href="#" title="Class Syllabus"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                  <a href="#" title="Class Books"><i class="fa fa-book" aria-hidden="true"></i></a>
                </td>
              </tr>
              <tr>
                <td>
                  <div><strong>COMP 122L</strong> <em>(15935)</em></div>
                  <div>Computer Architecture and Assembly Language Lab</div>
                </td>
                <td width="10%" align="center"><div>MoWe</div></td>
                <td align="center">05:30 PM - 06:45 PM</td>
                <td width="10%" align="center"><i class="fa fa-map-marker" aria-hidden="true"></i> JD 2214</td>
                <td align="center">
                  <a href="#" class="type--gray" title="Class Syllabus"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                  <a href="#" title="Class Books"><i class="fa fa-book" aria-hidden="true"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
          </div>
          </div>

          <br>

          <h2 class="type--header type--thin">Office Hours  </h2>
          <table class="table table--bordered table--padded table--striped">
            <thead>
              <tr>
                <th>Days</th>
                <th>Hours</th>
                <th>Location</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Mo</td>
                <td>6:45 PM - 7:45 PM</td>
                <td>JD 3338</td>
                <td>COMP 122/L</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @stop