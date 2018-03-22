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
	template = "<tr data-id='"+ $("#collab option:selected").text() + ',' + $("#collab option:selected").val() + ',' + $("#roleID option:selected").val() +"'><td>" + displayName + "</td><td>" + $("#roleID option:selected").text() + "</td><td> Pending </td><td style='text-align: center;'> <a class='removeCollabBtn'> Cancel </a> </td></tr>";

	$('<input/>', {
		value: $("#collab option:selected").text() + ',' + $("#collab option:selected").val() + ',' + $("#roleID option:selected").val(),
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

$('.select2-roles').select2({
	width:'95%',
	minimumResultsForSearch: Infinity,
	placeholder: 'Select a role...'
})
	
	$('.select2-category').change(function(event){
		var loadingScreen = $('#loading__screen');

		loadingScreen.css({
			'position': 'fixed',
			'top': '0',
			'bottom': '0',
			'left': '0',
			'right': '0',
			'z-index': '5',
			'opacity': '.7',
			'background': '#fff'
		})
		.html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="color: #4a4a4a; position: absolute; top: 40%; left: 50%; margin-left: -25px;"></i>')
		.show();

		$.ajax({
			url: window.HELIX.env.url + '/api/interests/categories/' + event.target.value + '?type=' + $(this).attr('data-type')
		})
		.done(function(request){
			var tags = $('.tags option:selected');

			switch(request.type)
			{
				case 'category':
					var subcategoryList = '', tagList = '';

					for(var i = 0; i < request.subcategories.length; i++)
					{
						subcategoryList += "<option value='" + request.subcategories[i].id+"'>" + request.subcategories[i].title + "</option>";
					}

					for(var y = 0; y < request.tags.length; y++)
					{
						tagList += "<option value='" + request.tags[y].id+"'>" + request.tags[y].title + "</option>";
					}

					$('.subcategory').html(subcategoryList);
					$('.tags').html(tagList).append(tags);
				break;

				case 'subcategory':
					var tagList = '';

					for (var i = 0; i < request.tags.length; i++) 
					{			
						tagList += "<option value='" + request.tags[i].id+"'>" + request.tags[i].title + "</option>";
					}

					$('.tags').html(tagList).append(tags);
				break;
			}
		})
		.fail(function(){
			alert('There was an error loading the project interests. Please try again.');
		})
		.always(function(){
			loadingScreen.hide();
		});
	});



	
// sourceMappingURL=scripts.js.map