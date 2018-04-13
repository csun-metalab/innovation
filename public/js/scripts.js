/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(2);


/***/ }),
/* 1 */
/***/ (function(module, exports) {

window.HELIX = {
	html: $('html'),
	body: $('body'),
	env: {
		url: $('html').data('url')
		// token: $('html').data('token')
	}
};

$(".url-field").change(function () {
	if (!/^https*:\/\//.test(this.value)) {
		this.value = "http://" + this.value;
	}
});

$(".datepicker").keyup(function () {
	if ($(this).val().length == 2) {
		$(this).val($(this).val() + "/");
	} else if ($(this).val().length == 5) {
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
$("#addCollabBtn").on('click', function (e) {
	e.preventDefault();
	var error = $('#collab').siblings('strong');

	if ($('#collab option:selected').length == 0) {
		return error.text('Choose a faculty member to add.');
	} else if ($('#list tbody tr[data-id*="' + $('#collab option:selected').val() + '"]').length == 1) {
		return error.text('This person has already been added as a collaborator.');
	} else if ($('#roleID option:selected').val() == 'Lead Principal Investigator' && $('#list tbody tr[data-id*="Lead Principal Investigator"]').length >= 1) {
		return error.text('Lead Principal Investigator cannot be included more than once.');
	} else {
		$('#collab').siblings('strong').text('');
	}

	var displayName = $("#collab option:selected").val() == $('#auid').val() ? $('#collab option:selected').text() + '<span style="opacity: .5;"> &#183 You</span> ' : $('#collab option:selected').text(),
	    template = "<tr data-id='" + $("#collab option:selected").text() + ',' + $("#collab option:selected").val() + ',' + $("#roleID option:selected").val() + "'><td>" + displayName + "</td><td>" + $("#roleID option:selected").text() + "</td><td> Pending </td><td style='text-align: center;'> <a class='removeCollabBtn btn btn-link'> Remove </a> </td></tr>";

	$('<input/>', {
		value: $("#collab option:selected").text() + ',' + $("#collab option:selected").val() + ',' + $("#roleID option:selected").val(),
		name: 'collaborators[]',
		type: 'hidden'

	}).appendTo($('.project-create-form'));

	$(template).appendTo("#list tbody");
});

// Remove the tr and hidden input whenever a user removes the collaborator from the list
$("#list tbody").on('click', '.removeCollabBtn', function (e) {
	e.preventDefault();
	$('input[value="' + $(this).parents('tr').attr('data-id') + '"]').remove();
	$(this).parents('tr').remove();
});

var collaborators = $(".select2-collaborator");
$(".select2-collaborator").select2({
	width: '100%',
	ajax: {
		url: window.HELIX.env.url + "/api/collaborators",
		dataType: 'json',
		delay: 250,
		data: function data(params) {
			return {
				q: params.term // search term
			};
		},
		processResults: function processResults(data) {
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
	width: '95%',
	// minimumResultsForSearch: Infinity,
	placeholder: 'Select a role...',
	tags: true
});

var description = "";
var watsonCount = 0;
$("#description").focusout(function () {
	var diffrence = Math.abs($('#description').val().length - description.length);
	description = $('#description').val();
	if (description.length > 200 && watsonCount < 3) {
		$('.watson').remove();
		$.ajax({
			url: window.HELIX.env.url + "/api/watson/tags",
			data: {
				"data": description
			},
			type: "POST",
			success: function success(data) {
				data.forEach(function (tag) {
					var tagList = '';
					tagList += "<option class='watson' value='watson:" + tag.text + ":" + tag.relevance + "' selected>" + tag.text + "</option>";
					$('.tags').append(tagList);
				});
				watsonCount++;
			}
		});
	};
});

// sourceMappingURL=scripts.js.map

/***/ }),
/* 2 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);