/*
| Used for step 3 - Add Collaborators
*/
$('.collaboratorActionBtn').on('click', function(e){
	alert("here");
	e.preventDefault();

	if($('#loading__screen').length == 0)
	{
		$('<div/>', {
			id: 'loading__screen'
		})
		.css({
			'position': 'fixed',
			'top': '0',
			'bottom': '0',
			'left': '0',
			'right': '0',
			'z-index': '5',
			'opacity': '.7',
			'background': '#fff'
		})
		.html('<div style="color: #4a4a4a; position: absolute; top: 40%; left: 50%; margin-left: -35px; font-weight: bold;">One moment...</div>')
		.appendTo($('body'));
	}
	else
	{
		$('#loading__screen').show();
	}

	$.ajax({
		url: $(this).data('url'),
		context: this
	})
	.done(function(){
		switch($(this).text())
		{
			case 'Approve':
				$(this).parent().prev().text('Active');
				$(this).removeClass('collaboratorActionBtn').addClass('removeCollabBtn').text('Remove');

				$('<input/>', {
					type: 'hidden',
					name: 'collaborators[]',
					value: $(this).parents('tr').data('id'),
				}).appendTo($('.project-create-form'));
			break;

			case 'Cancel Invite':
				$(this).parents('tr').remove();
			break;
		}
	})
	.fail(function(response){
		var error = 'There was an error performing this action.';

		if(response.status == 403)
		{
			error = response.responseJSON[0];
		}

		switch($(this).text())
		{
			case 'Approve':
				alert(error);
			break;

			case 'Cancel Invite':
				alert(error);
			break;
		}
	})
	.always(function(){
		$('#loading__screen').hide();
	});
})