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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app/app.js":
/*!*********************************!*\
  !*** ./resources/js/app/app.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// require('./bootstrap');
// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*const app = new Vue({
    el: '#app'
});*/
var html = $('html');
var fileList = [];

var App = function () {
  return {
    init: function init() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $(document).on('click', '[data-toggle="modal"]', function (e) {
        e.preventDefault(); // Get modal Id

        var modalId = $(this).data('modal-id'); // Trigger pre show modal

        $(modalId).trigger('show.modal'); // Show the modal

        App.toggleModal(modalId); // Trigger post show modal

        $(modalId).trigger('shown.modal');
      });
      $(document).on('click', '[data-dismiss="modal"]', function (e) {
        e.preventDefault(); // Get modal Id

        var modalId = '#' + $(this).closest('.modal')[0].id; // Trigger pre hide modal

        $(modalId).trigger('hide.modal'); // Hide the modal

        App.toggleModal(modalId); // Trigger post hide modal

        $(modalId).trigger('hidden.modal');
      }); // Delete/Confirm buttons

      $(document).on('click', '.action .delete-button', function (e) {
        $(this).addClass('is-hidden');
        $(this).closest('.actions').find('.button').addClass('is-hidden');
        $(this).closest('.actions').find('.delete-buttons, .delete-button-confirm, .delete-button-cancel').removeClass('is-hidden');
        e.preventDefault();
      });
      $(document).on('click', '.delete-button-cancel', function (e) {
        $(this).closest('.actions').find('.button').removeClass('is-hidden');
        $(this).closest('.actions').find('.delete-buttons, .delete-button-confirm, .delete-button-cancel').addClass('is-hidden');
        e.preventDefault();
      }); // Load google map places api

      var address = document.getElementById('address');
      /* let autocompleteAddress = new google.maps.places.Autocomplete(address);
        let componentForm = {
           locality: 'long_name',
           administrative_area_level_1: 'short_name',
           postal_code: 'short_name'
       };
        google.maps.event.addListener(autocompleteAddress, 'place_changed', function(e) {
           // Get the place details from the autocomplete object.
           let place = autocompleteAddress.getPlace();
            for (var component in componentForm) {
               document.getElementById(component).value = '';
               document.getElementById(component).disabled = false;
           }
            // Get each component of the address from the place details
           // and fill the corresponding field on the form.
           for (var i = 0; i < place.address_components.length; i++) {
               var addressType = place.address_components[i].types[0];
               if (componentForm[addressType]) {
                   var val = place.address_components[i][componentForm[addressType]];
                   document.getElementById(addressType).value = val;
               }
           }
       });
      */
      // Load jquery-mask

      $('input[name="birthday"]').mask('00/00/0000', {
        placeholder: "__/__/____"
      });
      App.handleNavbar();
      App.handleDropdown(); // Check for uploaded files

      $('#consent-files').closest('.file').find('.file-cta .file-label a').each(function () {
        var key = $(this).data('file-key');
        var fileName = $(this).data('filename');
        fileList[key] = {
          name: fileName,
          uploaded: true
        };
      });
      App.handleConsentFiles();
      $(document).on('click', '.file-remove', function (e) {
        if ($(this).data('file-key').length > 0) {
          var key = $(this).data('file-key');

          if (fileList[key].hasOwnProperty('uploaded')) {
            var id = $(this).closest('form').data('id');
            App.removeFile(id, key);
          }

          fileList.splice(key, 1);
        }

        App.renderFileList();
        e.stopPropagation();
        e.preventDefault();
      });
      $(document).on('change', '[name="consent_file[]"]', function () {
        App.handleConsentFiles();
      });
      $(document).on('change', 'select[name="consent"]', function () {
        var videoURL = $(this).find('option:selected').data('video');
        var consentVideo = modal.find('#consent-video');
        consentVideo.empty().append("<iframe height=\"350px\" width=\"100%\" height=\"auto\" src=\"".concat(videoURL.replace('watch?v=', 'embed/'), "\" allowfullscreen></iframe>"));
      });
      $('#patient-list').select2({
        searchInputPlaceholder: 'Type to search patients'
      });
      $('#procedure-list').select2({
        searchInputPlaceholder: 'Type to search procedures'
      });
    },
    handleNavbar: function handleNavbar() {
      // Get all "navbar-burger" elements
      var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0); // Check if there are any navbar burgers

      if ($navbarBurgers.length > 0) {
        // Add a click event on each of them
        $navbarBurgers.forEach(function ($el) {
          $el.addEventListener('click', function () {
            // Get the target from the "data-target" attribute
            var target = $el.dataset.target;
            var $target = document.getElementById(target); // Toggle the class on both the "navbar-burger" and the "navbar-menu"

            $el.classList.toggle('is-active');
            $target.classList.add('animated');
            $target.classList.toggle('is-active');
          });
        });
      }
    },
    handleDropdown: function handleDropdown() {
      var $dropdowns = document.querySelectorAll('.dropdown:not(.is-hoverable)');

      if ($dropdowns.length > 0) {
        $dropdowns.forEach(function ($el) {
          $el.addEventListener('click', function (event) {
            event.stopPropagation();
            $el.classList.toggle('is-active');
          });
        });
        document.addEventListener('click', function (event) {
          $dropdowns.forEach(function ($el) {
            $el.classList.remove('is-active');
          });
        });
      }
    },
    toggleModal: function toggleModal(modalId) {
      var modal = $(modalId);
      modal.toggleClass('is-active');
      html.toggleClass('is-clipped');
    },
    ajax: function ajax(url, method, dataType, data) {
      return $.ajax({
        url: url,
        type: method,
        datatype: dataType,
        data: data,
        error: function error(err) {// console.log('Error fetching data from ' + url, err);
        }
      });
    },
    ajaxFile: function ajaxFile(url, method, dataType, data) {
      return $.ajax({
        url: url,
        type: method,
        datatype: dataType,
        data: data,
        error: function error(err) {},
        contentType: false,
        processData: false
      });
    },
    serializeForm: function serializeForm(form) {
      var data = form.serializeArray();
      var submit = form.find('.submit');
      $.each(submit, function () {
        var name = $(this).attr('name');
        var value = $(this).attr('value');
        var text = $(this).text();

        if (name && (value || text)) {
          data.push({
            name: name,
            value: value ? value : text
          });
        }
      });
      return data;
    },
    loadModal: function loadModal() {
      var size = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'medium';
      var modalId = 'modal-' + new Date().getTime();
      var modal = "<div class=\"modal\" id=\"".concat(modalId, "\">\n                <div class=\"modal-background\"></div>\n                    <div class=\"modal-content modal-").concat(size, "\">\n                        <div class=\"card animated zoomIn\">\n                            <header class=\"card-header\">\n                                <p class=\"card-header-title modal-title\">Component</p>\n                            </header>\n                            <div class=\"card-content p-lg modal-body is-loading\">\n                            </div>\n                        </div>\n                    </div>\n                <button class=\"modal-close is-large\" aria-label=\"close\" data-dismiss=\"modal\"></button>\n            </div>");
      $('body').append(modal);
      App.toggleModal("#".concat(modalId));
      $('#' + modalId).on('hidden.modal', function (e) {
        $(this).remove();
      });
      return $('#' + modalId);
    },
    disableSubmit: function disableSubmit(form) {
      form.find('button.submit').addClass('is-loading').attr('disabled', true);
    },
    enableSubmit: function enableSubmit(form) {
      form.find('button.submit').removeClass('is-loading').attr('disabled', false);
    },
    getUrlParameter: function getUrlParameter(name) {
      name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
      var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
      var results = regex.exec(location.search);
      return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    },
    alertWithMessage: function alertWithMessage(title, messages, type) {
      var html = '';

      if (_typeof(messages) === 'object') {
        messages.forEach(function (message) {
          html += "<p class=\"has-text-danger\">".concat(message, "</p>");
        });
      } else {
        html = messages;
      }

      swal({
        title: title,
        html: html,
        type: type,
        confirmButtonText: 'Okay',
        confirmButtonClass: 'button submit is-primary',
        buttonsStyling: false
      });
    },
    capitalize: function capitalize(string) {
      return string.charAt(0).toUpperCase() + string.slice(1);
    },
    titleToSlug: function titleToSlug(text) {
      return Text.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
    },
    handleConsentFiles: function handleConsentFiles(files) {
      var element = $('#consent-files');
      Array.from(element[0].files).forEach(function (file) {
        fileList.push(file);
      });
      App.renderFileList();
    },
    renderFileList: function renderFileList() {
      var element = $('#consent-files');
      var fileNames = [];
      fileList.forEach(function (file) {
        fileNames.push(file.name);
      });
      element.closest('.file').find('.file-cta > .file-label').remove();

      if (!fileNames.length) {
        element.closest('.file').find('.file-cta').append("\n                        <span class=\"file-label\">Drag and drop files or click here to select</span>\n                    ");
        return;
      }

      fileNames.forEach(function (name, key) {
        element.closest('.file').find('.file-cta').append("\n                        <span class=\"file-label\">\n                            ".concat(name, " <br>\n                            <a class=\"file-remove\" href=\"#\" data-file-key=\"").concat(key, "\">Remove</a>\n                        </span>\n                    "));
      });
    },
    removeFile: function removeFile(consentId, fileIndex) {
      // Execute ajax request
      App.ajax("/consent-requests/delete-file/".concat(consentId), 'post', 'json', {
        fileIndex: fileIndex
      }).fail(function (jqXHR, textStatus) {
        App.alertWithMessage("Oops ".concat(jqXHR.status), 'Internal server error!', 'error');
      }).done(function (data, textStatus) {
        if (data.status) {
          App.alertWithMessage('Success', data.message, 'success');
        } else {
          App.alertWithMessage('Oops', data.message, 'error');
        }
      });
    }
  };
}();

$(document).ready(function () {
  App.init();
});

/***/ }),

/***/ 1:
/*!***************************************!*\
  !*** multi ./resources/js/app/app.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/consentic/resources/js/app/app.js */"./resources/js/app/app.js");


/***/ })

/******/ });