jQuery(document).ready(function($){
    $(".select2-sponsor").select2(
    	{
    		placeholder: 'Sponsor...',
    		allowClear: true
    	});

window.HELIX = {
  html: $('html'),
  body: $('body'),
  env: {
    url: $('html').data('url'),
    // token: $('html').data('token')
  }
};
$( ".select2-departments" ).select2({
	width:'100%',
	allowClear: true ,
    ajax: {
    	url: window.HELIX.env.url + "/api/departments",
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
    placeholder: 'Departments...',
    minimumInputLength: 3
});

$('.select2-types').select2({
    minimumResultsForSearch: Infinity,
    placeholder: 'Type...'
})

$('.select2-collaborators').select2({
    minimumResultsForSearch: Infinity,
    placeholder: 'Collaborators...'
})

	//open/close lateral filter
	$('.cd-filter-trigger').on('click', function(){
		triggerFilter(true);
	});
	$('.cd-filter .cd-close').on('click', function(){
		triggerFilter(false);
	});

	// if($('.panel').length >= 1)
	// {
	// 	// if(getParameterByName('query')){
	// 	//    triggerFilter(true);
	// 	// }else
	// 	if(getParameterByName('department')){
	// 	   triggerFilter(true);
	// 	}else if(getParameterByName('sponsor')){
	// 	   triggerFilter(true);
	// 	}else if(getParameterByName('catagory')){
	// 	   triggerFilter(true);
	// 	}
	// }
	function getParameterByName(name, url) {
	    if (!url) url = window.location.href;
	    name = name.replace(/[\[\]]/g, "\\$&");
	    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
	        results = regex.exec(url);
	    if (!results) return null;
	    if (!results[2]) return '';
	    return decodeURIComponent(results[2].replace(/\+/g, " "));
	}

	function triggerFilter($bool) {
		var elementsToTrigger = $([$('.cd-filter-trigger'), $('.cd-filter'), $('.cd-tab-filter'), $('.cd-gallery')]);
		elementsToTrigger.each(function(){
			$(this).toggleClass('filter-is-visible', $bool);
		});
	}

	//fix lateral filter and gallery on scrolling
	$(window).on('scroll', function(){
		(!window.requestAnimationFrame) ? fixGallery() : window.requestAnimationFrame(fixGallery);
	});

	function fixGallery() {
		var offsetTop = $('.cd-main-content').offset().top,
			scrollTop = $(window).scrollTop();
		if (scrollTop > offsetTop)
			$('.cd-main-content').addClass('is-fixed')
		else{
			$('.cd-main-content').removeClass('is-fixed');
		}
	}

});
