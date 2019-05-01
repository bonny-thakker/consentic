
Vue.component('spark-register-coupon', {
    /**
     * Load mixins for the component.
     */
    mixins: [
        require('mixins/register'),
    ],

    /**
     * The component's data.
     */
    data() {
        return {
            query: null,
            registerForm: $.extend(true, new SparkForm({
                team: '',
                team_slug: '',
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                terms: false,
                invitation: null
            }), Spark.forms.register),
        };
    },


    watch: {

        /**
         * Watch the team name for changes.
         */
        'registerForm.team': function (val, oldVal) {
            if (this.registerForm.team_slug == '' ||
                this.registerForm.team_slug == oldVal.toLowerCase().replace(/[\s\W-]+/g, '-')
            ) {
                this.registerForm.team_slug = val.toLowerCase().replace(/[\s\W-]+/g, '-');
            }
        },

    },


    /**
     * The component has been created by Vue.
     */
    created() {

        this.query = URI(document.URL).query(true);

        if (this.query.invitation) {
            this.getInvitation();
            this.registerForm.invitation = this.query.invitation;
        }

    },


    methods: {

        /**
         * Attempt to register with the application.
         */
        register() {

            this.registerForm.busy = true;
            this.registerForm.errors.forget();
            return this.sendRegistration();

        },

        /*
         * After obtaining the Stripe token, send the registration to Spark.
         */
        sendRegistration() {
            Spark.post('/register', this.registerForm)
                .then(response => {
                    window.location = response.redirect;
                });
        },

        showTerms(){
            $('#modal-terms').modal('show');
        },

        showPrivacy(){
            $('#modal-privacy').modal('show');
        }

    },


    computed: {

    }
});