// var base = require('settings/teams/update-team-name');

Vue.component('spark-update-team-name', {
    props: ['user', 'team'],

    /**
     * The component's data.
     */
    data() {
        return {
            form: new SparkForm({
                name: '',
                abn: '',
                address: '',
                state: '',
                city: '',
                zip: ''
            })
        };
    },


    /**
     * Prepare the component.
     */
    mounted() {
        this.form.name = this.team.name;
        this.form.abn = this.team.abn;
        this.form.address = this.team.address;
        this.form.state = this.team.state;
        this.form.city = this.team.city;
        this.form.zip = this.team.zip;
    },


    methods: {
        /**
         * Update the team name.
         */
        update() {
            Spark.put(`/app/user/settings/${Spark.teamsPrefix}/${this.team.id}/profile`, this.form)
                .then(() => {
                    Bus.$emit('updateTeam');
                    Bus.$emit('updateTeams');
                });
        }
    }
});
