window.HELIX = {
  html: $('html'),
  body: $('body'),
  env: {
    url: $('html').data('url'),
    // token: $('html').data('token')
  }
};

$(".url-field").change(function() {
    if (!/^https*:\/\//.test(this.value)) {
        this.value = "http://" + this.value;
    }
});

$(".datepicker").keyup(function(){
    if ($(this).val().length == 2){
        $(this).val($(this).val() + "/");
    }else if ($(this).val().length == 5){
        $(this).val($(this).val() + "/");
    }
});

// Profiles: Image Cropper
  // ===================================//
  // function registerJCropEvents() {

  //   var defaultWidth  = Math.min($('#cropw').val(), 210);
  //   var defaultHeight = Math.min($('#croph').val(), 45);

  //   $('#cropImage').Jcrop({
  //     aspectRatio: 42 / 9,
  //     setSelect: [0,0,defaultWidth,defaultHeight]
  //   });

  //   $('#cropImageContainer').on('cropend', function(e,s,c) {
  //     updateCoords(c);
  //   });
  // }

  // function updateCoords(c) {
  //   $('#cropx').val(c.x);
  //   $('#cropy').val(c.y);
  //   $('#cropw').val(c.w);
  //   $('#croph').val(c.h);
  // };

// Append the hidden input and tr whenever user adds new collaborator
$("#addCollabBtn").on('click',function(e){
	e.preventDefault();
	var error = $('#collab').siblings('strong');

	if($('#collab option:selected').length == 0)
	{
		return error.text('Choose a faculty member to add.');
	}
	else if($('#list tbody tr[data-id*="'+ $('#collab option:selected').val() +'"]').length == 1)
	{
		return error.text('This person has already been added as a collaborator.');
	}
	else if($('#roleID option:selected').val() == 'Lead Principal Investigator' && $('#list tbody tr[data-id*="Lead Principal Investigator"]').length >= 1)
	{
		return error.text('Lead Principal Investigator cannot be included more than once.');
	}
	else
	{
		$('#collab').siblings('strong').text('');
	}

	var displayName = $("#collab option:selected").val() == $('#auid').val() ? $('#collab option:selected').text() + '<span style="opacity: .5;"> &#183 You</span> ' : $('#collab option:selected').text(),
	template = "<tr data-id='"+ $("#collab option:selected").text() + '|' + $("#collab option:selected").val() + '|' + $("#roleID option:selected").val() +"'><td>" + displayName + "</td><td>" + $("#roleID option:selected").text() + "</td><td> Pending </td><td style='text-align: center;'> <a class='removeCollabBtn btn btn-link'> Remove </a> </td></tr>";

	$('<input/>', {
		value: $("#collab option:selected").text() + '|' + $("#collab option:selected").val() + '|' + $("#roleID option:selected").val(),
		name: 'collaborators[]',
		type: 'hidden'

	}).appendTo($('.project-create-form'));

	$(template).appendTo("#list tbody");
})

// Remove the tr and hidden input whenever a user removes the collaborator from the list
$("#list tbody").on('click', '.removeCollabBtn', function(e){
	e.preventDefault();
	$('input[value="'+ $(this).parents('tr').attr('data-id') +'"]').remove();
	$(this).parents('tr').remove();
})


// Append the hidden input and tr whenever user adds new collaborator
$("#addSeekingBtn").on('click',function(e){
    e.preventDefault();
    var error = $('#seeking').siblings('strong');

    if($("#seeking").val().length == 0)
    {
        return error.text('Choose your desired position.');
    }
    else if($('#seek_list tbody tr[data-id*="'+ $("#seeking").val() +'"]').length == 1)
    {
        return error.text('This role has already been added.');
    }
    else
    {
        $('#seeking').siblings('strong').text('');
    }

        template = "<tr data-id='"+ $("#seeking").val()+"'><td>"+$("#seeking").val()+"</td><td style='text-align: center;'> <a class='removeSeekBtn btn btn-link'> Remove </a> </td></tr>";

    $('<input/>', {
        value: $("#seeking").val(),
        name: 'seeking[]',
        type: 'hidden'

    }).appendTo($('.project-create-form'));

    $(template).appendTo("#seek_list tbody");
})
// Remove the tr and hidden input whenever a user removes the seeking from the list
$("#seek_list tbody").on('click', '.removeSeekBtn', function(e){
    e.preventDefault();
    $('input[value="'+ $(this).parents('tr').attr('data-id') +'"]').remove();
    $(this).parents('tr').remove();
})

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
    placeholder: 'Search for team members...',
    minimumInputLength: 3
});

$('.select2-roles').select2({
	width:'95%',
	// minimumResultsForSearch: Infinity,
	placeholder: 'Select a role...',
	tags: true
})

var description = $('#description').val();
var watsonCount = 0;
$( "#description" ).focusout(function() {
  var diffrence = Math.abs(( ($('#description').val().length) - (description.length) ));
  if($('#description').val().length > 200 && watsonCount<3 && $('#description').val() != description){
  		description = $('#description').val();
		$('.watson').remove();
	  	$.ajax({
			url: window.HELIX.env.url + "/api/watson/tags",
			data: { 
		        "data": description, 
		    },
		    type: "POST",
			success: function(data)
			{
				data.forEach(function(tag){
					var tagList = '';
					tagList += "<option class='watson' value='watson:" + tag.text + ":"+ tag.relevance +"' selected>" + tag.text + "</option>";
					$('.tags').append(tagList);
				});
				watsonCount++;
			}
		})
	};
});
		

	
// sourceMappingURL=scripts.js.map