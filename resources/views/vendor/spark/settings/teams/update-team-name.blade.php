<spark-update-team-name :user="user" :team="team" inline-template>
    <div class="card card-default">
        <div class="card-header">
            {{__('teams.update_team_name')}}
        </div>

        <div class="card-body">
            <!-- Success Message -->
            <div class="alert alert-success" v-if="form.successful">
                {{__('teams.team_name_was_updated')}}
            </div>

            <form role="form">

                <!-- Name -->
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('Name')}}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name" v-model="form.name" :class="{'is-invalid': form.errors.has('name')}">

                        <span class="invalid-feedback" v-show="form.errors.has('name')">
                            @{{ form.errors.get('name') }}
                        </span>
                    </div>
                </div>

                <!-- ABN -->
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('ABN')}}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="abn" v-model="form.abn" :class="{'is-invalid': form.errors.has('abn')}">

                        <span class="invalid-feedback" v-show="form.errors.has('abn')">
                            @{{ form.errors.get('abn') }}
                        </span>
                    </div>
                </div>

                <!-- Address -->
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('Address')}}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="address" v-model="form.address" :class="{'is-invalid': form.errors.has('address')}">

                        <span class="invalid-feedback" v-show="form.errors.has('address')">
                            @{{ form.errors.get('address') }}
                        </span>
                    </div>
                </div>

                <!-- City -->
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('City / Suburb')}}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="city" v-model="form.city" :class="{'is-invalid': form.errors.has('city')}">

                        <span class="invalid-feedback" v-show="form.errors.has('city')">
                            @{{ form.errors.get('city') }}
                        </span>
                    </div>
                </div>

                <!-- State -->
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('State')}}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="state" v-model="form.state" :class="{'is-invalid': form.errors.has('state')}">

                        <span class="invalid-feedback" v-show="form.errors.has('state')">
                            @{{ form.errors.get('state') }}
                        </span>
                    </div>
                </div>

                <!-- Zip -->
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('Postcode')}}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="zip" v-model="form.zip" :class="{'is-invalid': form.errors.has('zip')}">

                        <span class="invalid-feedback" v-show="form.errors.has('zip')">
                            @{{ form.errors.get('zip') }}
                        </span>
                    </div>
                </div>

                <!-- Consent Email -->
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{__('Consent Requests Email')}}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="consent_email" v-model="form.consent_email" :class="{'is-invalid': form.errors.has('consent_email')}">
                        <small class="form-text text-muted">Send a copy of completed consent request emails & PDF forms to this email address.</small>
                        <span class="invalid-feedback" v-show="form.errors.has('consent_email')">
                            @{{ form.errors.get('consent_email') }}
                        </span>
                    </div>
                </div>



                <!-- Update Button -->
                <div class="form-group row mb-0">
                    <div class="offset-md-4 col-md-6">
                        <button type="submit" class="btn btn-primary"
                                @click.prevent="update"
                                :disabled="form.busy">

                            {{__('Update')}}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</spark-update-team-name>
