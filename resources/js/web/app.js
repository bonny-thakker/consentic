
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
                let modalId = '#' + $(this).closest('.modal').attr('id');

                // Trigger pre hide modal
                $(modalId).trigger('hide.modal');

                // Hide the modal
                App.toggleModal(modalId);

                // Trigger post hide modal
                $(modalId).trigger('hidden.modal');

            });

            App.handleNavbar();
            App.handleDropdown();

            // Submit add form
            $(document).on('submit', '#newsletter-form', function(e) {
                $(this).find('.submit').addClass('is-loading')
                event.preventDefault();
                App.submitForm($(this));
            });

            $(document).on('click', '#submit-contact-us-form', function(e) {
                e.preventDefault();
                App.contact();
            });

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

        submitForm: function(form) {

            let formData = new FormData(form[0]);
            let url = form.attr('action');
            let method = form.attr('method');

            App.ajaxFile(url, method, 'json', formData)

                .fail((jqXHR, textStatus) => {
                    App.alertWithMessage(`Oops ${jqXHR.status}`, 'Internal server error!', 'error');
                })

                .done((data, textStatus) => {
                    App.alertWithMessage(App.capitalize(data.action), data.message, data.action);
                    form[0].reset();
                    form.find('.is-loading').removeClass('is-loading');
                })

        },

        contact: function() {
            let form = $('#contact-us-form');
            let data = {
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

            App.ajax('/form/contact', 'POST', 'json', data)

                .fail((jqXHR, textStatus) => {
                    App.alertWithMessage(`Oops ${jqXHR.status}`, 'Internal server error!', 'error');
                })

                .done((data, textStatus) => {
                    App.alertWithMessage(App.capitalize(data.action), data.message, data.action);
                    $('#submit-contact-us-form').removeClass('is-loading');

                    if (data.action != 'error') {
                        $('input, textarea').val('')
                            .text('');
                    }
                })

        },

    }

}();

$(document).ready(function() {
    App.init();
});

