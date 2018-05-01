<p>The API gives information on regards to a member's active projects and a listing of all public projects shared on Innovation. This service provides a gateway to access the information via a REST-ful API. The information is retrieved by creating a specific URI and giving values to filter the data. The information that is returned is a JSON object that contains a set of details and members attached to a particular project; the format of the JSON object is as follows:</p>
<pre>
<code>{
  "status": 200,
  "success": true,
  "version": "innovation-1.0",
  "type": "project",
  "project": {
    "project_id": "projects:44",
    "project_title": "BUILD @ CSUN",
    "abstract": "Establishing a sustainable and CRT-informed overall research environment ...",
    "sponsorList": [
      "National Institutes of Health - NIH"
    ],
    "sponsorCode": "6462",
    "pi": {
      "first_name": "Crist",
      "last_name": "Khachikian",
      ...
    },
    "members": [
      {
        "first_name": "Gabriela",
        "last_name": "Chavira",
        ...
    ],
    "award": [
      {
        "sponsor": "National Institutes of Health - NIH",
        "award_amount": "1060845.00",
        ...
      }
    ],
    "interests": [
      {
        "attribute_id": "research:724",
        "title": "Integrative Biology",
        ...
      }
    ],
  }
}</code>
</pre>
<br>
<h2 id="getting-started" class="type--header type--thin">Getting Started</h2>
  <ol>
    <li><strong>GENERATE THE URI:</strong> Find the usage that fits your need. Browse through collections, instances and query types to help you craft your URI.</li>
    <li><strong>PROVIDE THE DATA:</strong> Use the URI to query your data. See the Usage Example session.</li>
    <li><strong>SHOW THE RESULTS</strong></li>
  </ol>
  <br>
	<h2 id="collections" class="type--header type--thin">Collections</h2>
	<h3 class="type--thin">The collection URI allows the consumer to obtain a list of interest or badges that are part of the entire data set.</h3>
	<ul>
	<strong>Project Listing</strong>
	  <li><a href="{{url('api/projects')}}">{{url('api/projects')}}</a></li>
	<strong>Project Listing with Attached Members</strong>
	  <li><a href="{{url('api/members/projects')}}">{{url('api/members/projects')}}</a></li>
	</ul>
	<br>
	<h2 id="instances" class="type--header type--thin">Instances</h2>
	<h3 class="type--thin">The instance URI allows the consumer to obtain information about a single project.</h3>
	<strong>Single Project</strong>
	<ul>
	  <li><a href="{{url('api/projects/build-csun')}}">{{url('api/projects/build-csun')}}</a></li>
	</ul>
	<p><small><em><strong>Note:</strong> Accepted project identifiers include <b>project slugs</b>.</em></small></p>
	<h2 id="query" class="type--header type--thin">Query</h2>
	<h3 class="type--thin">The query URI allows a consumer to obtain a list of projects related to a specified member.</h3>
	<strong>Specified Member's Projects</strong>
	<ul>
	  <li>
	  	<a href="{{url('api/projects?email=nr_steven.fitzgerald@csun.edu')}}">{{url('api/projects?email=nr_steven.fitzgerald@csun.edu')}}</a>
	  </li>
	</ul>
	<p><small><em><strong>Note:</strong> Accepted parameters are listed below.</em></small></p>
	<h2 id="parameters" class="type--header type--thin">Accepted Parameters</h2>
	<h3 class="type--thin">You may use these parameters filter the data received.</h3>
	<div class="table--responsive">
		<table class="table table--striped table--bordered table--padded">
			<thead>
				<tr>
				  <th>Parameters</th>
				  <th>Accepted filters</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				  <td><code>role</code></td>
				  <td><code>Lead+Principle+Investigator</code><br><code>Principal+Investigator</code><br><code>Proposal+Editor</code><br><code>Investigator</code></td>
				</tr>
				<tr>
				  <td><code>email</code></td>
				  <td>CSUN Faculty Email</td>
				</tr>
			</tbody>
		</table>
	</div>