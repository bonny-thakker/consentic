const Newsletter = function() {

    return {

        // Execute js module 
        init: function() {
            Newsletter.main();
        },

        // Main function of the module
        main: function() {

            // Submit add form
            $(document).on('submit', '#newsletter-form', function(e) {
                event.preventDefault();
                Newsletter.submitForm($(this));
            });

            $(document).on('click', '#submit-contact-us-form', function(e) {
                e.preventDefault();
                Newsletter.contact();
            });
        },

        // Submit function
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

            App.ajax('/contact', 'POST', 'json', data)
            
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
    Newsletter.init();
});