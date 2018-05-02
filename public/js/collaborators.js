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
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */,
/* 1 */,
/* 2 */,
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(4);


/***/ }),
/* 4 */
/***/ (function(module, exports) {

/*
| Used for step 3 - Add Collaborators
*/
$('.collaboratorActionBtn').on('click', function (e) {
	e.preventDefault();

	if ($('#loading__screen').length == 0) {
		$('<div/>', {
			id: 'loading__screen'
		}).css({
			'position': 'fixed',
			'top': '0',
			'bottom': '0',
			'left': '0',
			'right': '0',
			'z-index': '5',
			'opacity': '.7',
			'background': '#fff'
		}).html('<div style="color: #4a4a4a; position: absolute; top: 40%; left: 50%; margin-left: -35px; font-weight: bold;">One moment...</div>').appendTo($('body'));
	} else {
		$('#loading__screen').show();
	}

	$.ajax({
		url: $(this).data('url'),
		context: this
	}).done(function () {
		switch ($(this).text()) {
			case 'Approve':
				$(this).parent().prev().text('Active');
				$(this).removeClass('collaboratorActionBtn').addClass('removeCollabBtn').text('Remove');

				$('<input/>', {
					type: 'hidden',
					name: 'collaborators[]',
					value: $(this).parents('tr').data('id')
				}).appendTo($('.project-create-form'));
				break;

			case 'Cancel Invite':
				$(this).parents('tr').remove();
				break;
		}
	}).fail(function (response) {
		var error = 'There was an error performing this action.';

		if (response.status == 403) {
			error = response.responseJSON[0];
		}

		switch ($(this).text()) {
			case 'Approve':
				alert(error);
				break;

			case 'Cancel Invite':
				alert(error);
				break;
		}
	}).always(function () {
		$('#loading__screen').hide();
	});
});

/***/ })
/******/ ]);