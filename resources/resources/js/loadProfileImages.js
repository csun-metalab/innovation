/**
 * This was created for improved searching on pages because profile images are loaded from production
 * We're taking away the document hanging by loading images after the DOM is painted.
 */

// Issues the ajax calls to retrieve profile images
function retrieveProfileImages(image, url) {
  var imageId = "#"+image.attr('id');
  $.ajax({
    type     : 'GET',
    url      :  url,
    dataType : 'text',
  })
    .done(function(data) {
      $(imageId).attr("src", data);
      sessionStorage.setItem($(imageId).attr("data-id"), data);
      $(imageId).show();
      $(imageId).siblings('.fa-spinner').first().remove();
    })
    // just in case the ajax call fails spectacularly
    .fail(function(){
      $(imageId).attr("src", "http://www.csun.edu/faculty/imgs/profile-default.png");
      $(imageId).show();
      $(imageId).siblings('.fa-spinner').first().remove();
    });
}

// we're listening on the document ready event to launch the Ajax calls
$(document).ready(function() {
  window.HELIX = {
    html: $('html'),
    body: $('body'),
    env: {
      url: $('html').data('url'),
      token: $('html').data('token')
    }
  };
  // loop through the img tag with profile--icon class
  $(".load--icon").each(function() {
    var defaultImage = "http://www.csun.edu/faculty/imgs/profile-default.png";
    // check the session storage for the value
    if(sessionStorage.getItem($(this).attr("data-id")) && sessionStorage.getItem($(this).attr("data-id")) != defaultImage)  {
      $(this).attr("src", sessionStorage.getItem($(this).attr("data-id")));
      $(this).show();
      $(this).siblings('.fa-spinner').first().remove();
    } else {
      // pass in unique img tag id and url
      retrieveProfileImages($(this), (window.HELIX.env.url + '/api/profile/image/' + $(this).attr("data-id")));
    }
  });
});
