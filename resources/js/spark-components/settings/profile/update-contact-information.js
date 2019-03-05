/*var base = require('settings/profile/update-contact-information');*/

Vue.component('spark-update-contact-information', {
    props: ['user'],

    /**
     * The component's data.
     */
    data() {
        return {
            form: $.extend(true, new SparkForm({
                name: '',
                email: '',
                title: '',
                first_name: '',
                last_name: '',
                phone_number: ''
            }), Spark.forms.updateContactInformation)
        };
    },


    /**
     * Bootstrap the component.
     */
    mounted() {
        this.form.name = this.user.name;
        this.form.email = this.user.email;
        this.form.title = this.user.title;
        this.form.first_name = this.user.first_name;
        this.form.last_name = this.user.last_name;
        this.form.phone_number = this.user.phone_number;
    },


    methods: {
        /**
         * Update the user's contact information.
         */
        update() {
            Spark.put('/app/user/settings', this.form)
                .then(() => {
                    Bus.$emit('updateUser');
                });
        }
    }
});
