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
/******/ 	return __webpack_require__(__webpack_require__.s = 7);
/******/ })
/************************************************************************/
/******/ ({

/***/ 7:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(8);


/***/ }),

/***/ 8:
/***/ (function(module, exports) {

var Newsletter = function () {

    return {

        // Execute js module 
        init: function init() {
            Newsletter.main();
        },

        // Main function of the module
        main: function main() {

            // Submit add form
            $(document).on('submit', '#newsletter-form', function (e) {
                event.preventDefault();
                Newsletter.submitForm($(this));
            });

            $(document).on('click', '#submit-contact-us-form', function (e) {
                e.preventDefault();
                Newsletter.contact();
            });
        },

        // Submit function
        submitForm: function submitForm(form) {

            var formData = new FormData(form[0]);
            var url = form.attr('action');
            var method = form.attr('method');

            App.ajaxFile(url, method, 'json', formData).fail(function (jqXHR, textStatus) {
                App.alertWithMessage('Oops ' + jqXHR.status, 'Internal server error!', 'error');
            }).done(function (data, textStatus) {
                App.alertWithMessage(App.capitalize(data.action), data.message, data.action);
                form[0].reset();
            });
        },

        contact: function contact() {
            var form = $('#contact-us-form');
            var data = {
                name: form.find('[name="name"]').val(),
                subject: form.find('[name="subject"]').val(),
                phone: form.find('[name="phone"]').val(),
                email: form.find('[name="email"]').val(),
                company: form.find('[name="company"]').val(),
                body: form.find('[name="body"]').val()
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#submit-contact-us-form').addClass('is-loading');

            App.ajax('/contact', 'POST', 'json', data).fail(function (jqXHR, textStatus) {
                App.alertWithMessage('Oops ' + jqXHR.status, 'Internal server error!', 'error');
            }).done(function (data, textStatus) {
                App.alertWithMessage(App.capitalize(data.action), data.message, data.action);
                $('#submit-contact-us-form').removeClass('is-loading');

                if (data.action != 'error') {
                    $('input, textarea').val('').text('');
                }
            });
        }
    };
}();

$(document).ready(function () {
    Newsletter.init();
});

/***/ })

/******/ });