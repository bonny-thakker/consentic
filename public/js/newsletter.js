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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/newsletter.js":
/*!************************************!*\
  !*** ./resources/js/newsletter.js ***!
  \************************************/
/*! no static exports found */
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
        App.alertWithMessage("Oops ".concat(jqXHR.status), 'Internal server error!', 'error');
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
        App.alertWithMessage("Oops ".concat(jqXHR.status), 'Internal server error!', 'error');
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

/***/ }),

/***/ 3:
/*!******************************************!*\
  !*** multi ./resources/js/newsletter.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/consentic/resources/js/newsletter.js */"./resources/js/newsletter.js");


/***/ })

/******/ });