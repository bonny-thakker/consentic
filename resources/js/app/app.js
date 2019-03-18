
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

const App = function() {

    return {

        init: function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '[data-toggle="modal"]', function(e) {
                e.preventDefault();

                // Get modal Id
                let modalId = $(this).data('modal-id');

                // Trigger pre show modal
                $(modalId).trigger('show.modal');

                // Show the modal
                App.toggleModal(modalId);

                // Trigger post show modal
                $(modalId).trigger('shown.modal');
            });

            $(document).on('click', '[data-dismiss="modal"]', function(e) {
                e.preventDefault();

                // Get modal Id
                let modalId = '#' + $(this).closest('.modal')[0].id;

                // Trigger pre hide modal
                $(modalId).trigger('hide.modal');

                // Hide the modal
                App.toggleModal(modalId);

                // Trigger post hide modal
                $(modalId).trigger('hidden.modal');
            });

            // Delete/Confirm buttons
            $(document).on('click','.action .delete-button', function(e) {
                $(this).addClass('is-hidden');
                $(this).closest('.actions').find('.button').addClass('is-hidden');
                $(this).closest('.actions').find('.delete-buttons, .delete-button-confirm, .delete-button-cancel').removeClass('is-hidden')
                e.preventDefault();
            });

            $(document).on('click','.delete-button-cancel', function(e) {
                $(this).closest('.actions').find('.button').removeClass('is-hidden');
                $(this).closest('.actions').find('.delete-buttons, .delete-button-confirm, .delete-button-cancel').addClass('is-hidden')
                e.preventDefault();
            });

            // Load google map places api
            if($("input#address").length > 0){

                let address = document.getElementById('address');
                let autocompleteAddress = new google.maps.places.Autocomplete(address);

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

            }

            // Load jquery-mask
            $('input[name="birthday"]').mask('00/00/0000', {placeholder: "__/__/____"});

            App.handleNavbar();
            App.handleDropdown();

            // Check for uploaded files
            $('#consent-files').closest('.file')
                .find('.file-cta .file-label a')
                .each(function() {
                    let key = $(this).data('file-key');
                    let fileName = $(this).data('filename');

                    fileList[key] = {
                        name: fileName,
                        uploaded: true
                    };
                });

            App.handleConsentFiles();

            $(document).on('click', '.file-remove', function(e) {

                if($(this).data('file-key').length > 0){
                    let key = $(this).data('file-key');

                    if (fileList[key].hasOwnProperty('uploaded')) {
                        let id = $(this).closest('form').data('id');
                        App.removeFile(id, key);
                    }

                    fileList.splice(key, 1);
                }

                App.renderFileList();

                e.stopPropagation();
                e.preventDefault();

            });

            $(document).on('change', '[name="consent_file[]"]', function() {
                App.handleConsentFiles();
            });

            $(document).on('change', 'select[name="consent"]', function() {
                let videoURL = $(this).find('option:selected').data('video');
                let consentVideo = $('#consent-video');

                consentVideo.empty()
                    .append(`<iframe height="350px" width="100%" height="auto" src="${videoURL.replace('watch?v=', 'embed/')}" allowfullscreen></iframe>`);
            });

            $('#patient-list').select2({
                searchInputPlaceholder: 'Type to search patients'
            });

            $('#procedure-list').select2({
                searchInputPlaceholder: 'Type to search procedures'
            });

            App.loadVideo();

            $(document).on('click', 'form[name="publicConsentRequestQuestions"] button[type="submit"]', function(e) {

               /* $('#consent-request-tab').addClass('is-hidden');
                $('#consent-questions-tab').addClass('is-hidden');
                $('#consent-sign-tab').removeClass('is-hidden');

                setTimeout(function (){

                    App.loadSignature();

                }, 1000);

                e.stopPropagation();
                e.preventDefault();*/

            });

            $(document).on('click', '.video-link', function(e) {

                $('#consent-request-tab').removeClass('is-hidden');
                $('#consent-questions-tab').addClass('is-hidden');
                $('#consent-sign-tab').addClass('is-hidden');

                e.stopPropagation();
                e.preventDefault();

            });

            $(document).on('click', '.questions-link', function(e) {

                $('#consent-request-tab').addClass('is-hidden');
                $('#consent-questions-tab').removeClass('is-hidden');
                $('#consent-sign-tab').addClass('is-hidden');

                e.stopPropagation();
                e.preventDefault();

            });

            $(document).on('click', '.sign-link', function(e) {

                $('#consent-request-tab').addClass('is-hidden');
                $('#consent-questions-tab').addClass('is-hidden');
                $('#consent-sign-tab').removeClass('is-hidden');

                /*setTimeout(function (){
                    App.loadSignature();
                }, 1000);*/

                e.stopPropagation();
                e.preventDefault();

            });

            App.loadSignature();

        },

        handleNavbar: function() {

            // Get all "navbar-burger" elements
            var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

            // Check if there are any navbar burgers
            if ($navbarBurgers.length > 0) {

                // Add a click event on each of them
                $navbarBurgers.forEach(function ($el) {
                    $el.addEventListener('click', function () {

                        // Get the target from the "data-target" attribute
                        var target = $el.dataset.target;
                        var $target = document.getElementById(target);

                        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                        $el.classList.toggle('is-active');
                        $target.classList.add('animated');
                        $target.classList.toggle('is-active');

                    });
                });
            }

        },

        handleDropdown: function() {
            var $dropdowns = document.querySelectorAll('.dropdown:not(.is-hoverable)');

            if ($dropdowns.length > 0) {
                $dropdowns.forEach(function($el) {
                    $el.addEventListener('click', function(event) {
                        event.stopPropagation();
                        $el.classList.toggle('is-active');
                    });
                });
                document.addEventListener('click', function(event) {
                    $dropdowns.forEach(function($el) {
                        $el.classList.remove('is-active');
                    });
                });
            }
        },

        loadVideo: function(restart = false) {

            let videosWatched = $('#consent-video-player-container').data('videos-watched');
            let consentId = $('#consent-video-player-container').data('id');
            let urlSignature = $('#consent-video-player-container').data('url-signature');

            plyrCurrentTime = 0;
            plyr = new Plyr("#consent-video-player", {
                ratio: '16:9',
                listeners: {
                    seek: function customSeekBehavior(e) {
                        // If video already watched
                        // enable fast forward
                        if (videosWatched) {
                            return true;
                        }

                        let newTime = _getTargetTime(plyr, e);

                        if (newTime > plyrCurrentTime) {
                            e.preventDefault();
                            return false;
                        }
                        return true;
                    }
                }
            });

            plyr.on('enterfullscreen', function(event) {
                $('.plyr').css('height', 'initial');
            });

            plyr.on('exitfullscreen', function(event) {
                // $('.plyr').css('height', '400px');
            });

            plyr.on('timeupdate', function(event) {
                plyrCurrentTime = Math.max(plyrCurrentTime, plyr.currentTime);
                if (!videosWatched && plyr.duration  - plyr.currentTime <= 10) {
                    App.videosWatched(consentId, urlSignature);
                }
            });

            plyr.on('ended', function(event) {
                if (!videosWatched) {
                    App.videosWatched(consentId, urlSignature);
                }
                $('#consent-request-tab').addClass('is-hidden');
                $('#consent-questions-tab').removeClass('is-hidden');
                $('.questions-link').parent().removeClass('is-active')
            });

            function _getTargetTime(plyr, input) {
                if (typeof input === "object" && (input.type === "input" || input.type === "change")) {
                    return input.target.value / input.target.max * plyr.media.duration;
                } else {
                    // We're assuming its a number
                    return Number(input);
                }
            }
        },

        videosWatched: function(id,signature) {

            // Prepare data
            let url = `/p/consent-request/${id}?signature=${signature}`;
            let method = 'POST';

            // Execute ajax request
            App.ajax(url, method, 'json', { video_watched: 1 });

        },

        loadSignature: function() {

            $('#signature').jSignature();

            // Add listener to clear button
            $('#clear-signature').click(function(e) {
                e.preventDefault();
                $('#signature').jSignature("reset");
            });

            $('#signature').on('change', function() {

                let datapair = $('#signature').jSignature('getData', 'svg');
                $('[name="consentPatientSignature"]').html(datapair[1]);

            });

            $('#agreement').on('change', function() {
                let value = $(this).is(':checked');
                let submit = $('#submit-signature');

                if (!value) {
                    submit.attr('disabled', true);
                    return;
                }
                submit.attr('disabled', false);
            });

        },

        toggleModal: function(modalId) {
            let modal = $(modalId);

            modal.toggleClass('is-active');
            html.toggleClass('is-clipped');
        },

        ajax: function(url, method, dataType, data) {
            return $.ajax({
                url: url,
                type: method,
                datatype: dataType,
                data: data,
                error: function(err) {
                    // console.log('Error fetching data from ' + url, err);
                }
            });
        },

        ajaxFile: function(url, method, dataType, data) {
            return $.ajax({
                url: url,
                type: method,
                datatype: dataType,
                data: data,
                error: function(err) {
                },
                contentType: false,
                processData: false
            });
        },

        serializeForm: function(form) {
            var data = form.serializeArray();
            var submit = form.find('.submit');

            $.each(submit, function() {
                var name = $(this).attr('name');
                var value = $(this).attr('value');
                var text = $(this).text();
                if (name && (value || text)) {
                    data.push({ name: name, value: (value) ? value : text });
                }
            });

            return data;
        },

        loadModal: function(size = 'medium') {

            let modalId = 'modal-' + new Date().getTime();

            let modal = `<div class="modal" id="${modalId}">
                <div class="modal-background"></div>
                    <div class="modal-content modal-${size}">
                        <div class="card animated zoomIn">
                            <header class="card-header">
                                <p class="card-header-title modal-title">Component</p>
                            </header>
                            <div class="card-content p-lg modal-body is-loading">
                            </div>
                        </div>
                    </div>
                <button class="modal-close is-large" aria-label="close" data-dismiss="modal"></button>
            </div>`;

            $('body').append(modal);

            App.toggleModal(`#${modalId}`);

            $('#'+modalId).on('hidden.modal', function(e) {
                $(this).remove();
            });

            return $('#'+modalId);
        },

        disableSubmit: function(form) {
            form.find('button.submit')
                .addClass('is-loading')
                .attr('disabled', true);
        },

        enableSubmit: function(form) {
            form.find('button.submit')
                .removeClass('is-loading')
                .attr('disabled', false);
        },

        getUrlParameter: function(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        },

        alertWithMessage: function(title, messages, type) {

            let html = '';

            if (typeof messages === 'object') {
                messages.forEach(message => {
                    html += `<p class="has-text-danger">${message}</p>`;
                });
            } else {
                html = messages;
            }

            swal({
                title,
                html,
                type,
                confirmButtonText: 'Okay',
                confirmButtonClass: 'button submit is-primary',
                buttonsStyling: false
            });
        },

        capitalize: function(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        },

        titleToSlug: function(text) {
            return Text
                .toLowerCase()
                .replace(/[^\w ]+/g,'')
                .replace(/ +/g,'-');
        },

        handleConsentFiles: function(files) {

            if($('#consent-files').length > 0){
                let element = $('#consent-files');

                Array.from(element[0].files).forEach(file => {
                    fileList.push(file);
                });

                App.renderFileList();
            }

        },

        renderFileList: function() {
            let element = $('#consent-files');
            let fileNames = [];

            fileList.forEach(file => {
                fileNames.push(file.name);
            })

            element.closest('.file')
                .find('.file-cta > .file-label')
                .remove();

            if (!fileNames.length) {
                element.closest('.file')
                    .find('.file-cta')
                    .append(`
                        <span class="file-label">Drag and drop files or click here to select</span>
                    `);
                return;
            }

            fileNames.forEach((name, key) => {
                element.closest('.file')
                    .find('.file-cta')
                    .append(`
                        <span class="file-label">
                            ${name} <br>
                            <a class="file-remove" href="#" data-file-key="${key}">Remove</a>
                        </span>
                    `);
            });
        },

        removeFile: function(consentId, fileIndex) {
            // Execute ajax request
            App.ajax(`/consent-requests/delete-file/${consentId}`, 'post', 'json', { fileIndex })

                .fail((jqXHR, textStatus) => {
                    App.alertWithMessage(`Oops ${jqXHR.status}`, 'Internal server error!', 'error');
                })

                .done((data, textStatus) => {
                    if (data.status) {
                        App.alertWithMessage('Success', data.message, 'success');
                    } else {
                        App.alertWithMessage('Oops', data.message, 'error');
                    }
                })
        }
    }

}();

$(document).ready(function() {
    App.init();
});

