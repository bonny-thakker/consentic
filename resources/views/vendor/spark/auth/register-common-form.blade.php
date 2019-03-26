<form role="form" class="container">
    <div class="columns is-variable is-8">

        <div class="column">

            <div class="field columns is-variable is-3">
                <div class="control column is-6">
                    <h1 class="title is-2">
                        @if(env('TRIAL_ENABLED'))
                            {{__('Refister Now For A 30 Day Free Trial!')}}
                        @else
                            {{__('Registration')}}
                        @endif
                    </h1>
                </div>

            </div>

            <div class="field columns is-variable is-3">

                <div class="control column p-b-none is-6">
                    <!-- Title  -->
                    <div class="control">

                        {{--  <label class="label is-medium">{{__('Title')}}</label>--}}

                            <select class="input is-medium site-input-size" name="title" v-model="registerForm.title"
                                    :class="{'is-invalid': registerForm.errors.has('title')}" autofocus>
                                <option value="" selected="" disabled="">Title</option>
                                <option value="Doctor">Doctor</option>
                                <option value="Miss">Miss</option>
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Ms.">Ms.</option>

                            </select>

                            <span class="invalid-feedback" v-show="registerForm.errors.has('title')">
                                  @{{ registerForm.errors.get('title') }}
                            </span>

                        </div>

                </div>

            </div>

            <div class="field columns is-variable is-3">
                <div class="control column p-b-none">
                    {{-- <label class="label is-medium">{{__('First Name')}}</label>--}}

                    <div class="control">
                        <input type="text" class="input is-medium site-input-size" name="first_name" placeholder="First Name"
                               v-model="registerForm.first_name"
                               :class="{'is-invalid': registerForm.errors.has('first_name')}" autofocus>

                        <span class="invalid-feedback" v-show="registerForm.errors.has('first_name')">
                            @{{ registerForm.errors.get('first_name') }}
                    </span>
                    </div>
                </div>
                <div class="control column p-b-none">
                    {{--<label class="label is-medium">{{__('Last Name')}}</label>--}}

                    <div class="control">
                        <input type="text" class="input is-medium site-input-size" name="last_name" placeholder="Last Name"
                               v-model="registerForm.last_name"
                               :class="{'is-invalid': registerForm.errors.has('last_name')}" autofocus>

                        <span class="invalid-feedback" v-show="registerForm.errors.has('last_name')">
                        @{{ registerForm.errors.get('last_name') }}
                    </span>
                    </div>
                </div>
            </div>

            <div class="field columns is-variable">
                <div class="control column p-b-none">
                  {{--  <label class="label is-medium">{{__('Email')}}</label>--}}

                    <div class="control">
                        <input type="email" class="input is-medium site-input-size" name="email" placeholder="Email Address" v-model="registerForm.email"
                               :class="{'is-invalid': registerForm.errors.has('email')}">

                        <span class="invalid-feedback" v-show="registerForm.errors.has('email')">
                        @{{ registerForm.errors.get('email') }}
                    </span>
                    </div>
                </div>
            </div>

            <div class="field columns is-variable">
                <div class="control column p-b-none">
                  {{--  <label class="label is-medium">{{__('Mobile Number')}}</label>--}}

                    <div class="control">
                        <input type="text" class="input is-medium site-input-size" name="phone_number" placeholder="Mobile Number" v-model="registerForm.phone_number"
                               :class="{'is-invalid': registerForm.errors.has('phone_number')}" autofocus>

                        <span class="invalid-feedback" v-show="registerForm.errors.has('phone_number')">
                         @{{ registerForm.errors.get('phone_number') }}
                    </span>
                    </div>
                </div>
            </div>


            <div class="field columns is-variable is-3">
                <div class="control column p-b-none">
                   {{-- <label class="label is-medium">{{__('Password')}}</label>--}}

                    <div class="control">
                        <input type="password" class="input is-medium site-input-size" name="password" placeholder="Password" v-model="registerForm.password"
                               :class="{'is-invalid': registerForm.errors.has('password')}">

                        <span class="invalid-feedback" v-show="registerForm.errors.has('password')">
                        @{{ registerForm.errors.get('password') }}
                    </span>
                    </div>
                </div>
                <div class="control column p-b-none">
                   {{-- <label class="label is-medium">{{__('Confirm Password')}}</label>--}}

                    <div class="control">
                        <input type="password" class="input is-medium site-input-size" placeholder="Confirm password" name="password_confirmation"
                               v-model="registerForm.password_confirmation"
                               :class="{'is-invalid': registerForm.errors.has('password_confirmation')}">

                        <span class="invalid-feedback" v-show="registerForm.errors.has('password_confirmation')">
                            @{{ registerForm.errors.get('password_confirmation') }}
                        </span>
                    </div>
                </div>
            </div>

           @if (Spark::usesTeams() && Spark::onlyTeamPlans())


                <div class="field columns is-variable">
                    <div class="control column p-b-none" v-if=" ! invitation">

                        <!-- Team Name -->
                        <div class="control">
                            <input type="text" class="input is-medium site-input-size" name="team"  placeholder="Practice Name" v-model="registerForm.team"
                                   :class="{'is-invalid': registerForm.errors.has('team')}" autofocus>

                            <span class="invalid-feedback" v-show="registerForm.errors.has('team')">
                                    @{{ registerForm.errors.get('team') }}
                                </span>
                        </div>

                    </div>

                @if (Spark::teamsIdentifiedByPath())
                    <!-- Team Slug (Only Shown When Using Paths For Teams) -->
                        <div class="field" v-if=" ! invitation">
                            <label class="label is-medium">{{ __('teams.team_slug') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="input is-medium site-input-size" name="team_slug" v-model="registerForm.team_slug"
                                       :class="{'is-invalid': registerForm.errors.has('team_slug')}" autofocus>

                                <small class="form-text text-muted" v-show="! registerForm.errors.has('team_slug')">
                                    {{__('teams.slug_input_explanation')}}
                                </small>

                                <span class="invalid-feedback" v-show="registerForm.errors.has('team_slug')">
                            @{{ registerForm.errors.get('team_slug') }}
                        </span>
                            </div>
                        </div>
                    @endif

                </div>
               
            @endif

            <div class="field columns is-variable">
                <div class="control column p-b-none">

                    <!-- Terms And Conditions -->
                    <div>
                        <div class="field">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="terms"
                                           :class="{'is-invalid': registerForm.errors.has('terms')}" v-model="registerForm.terms">
                                    <label class="form-check-label" for="terms">
                                        {{--{!! __('I Accept :linkOpen The Terms Of Service :linkClose', ['linkOpen' => '<a href="/terms" target="_blank">', 'linkClose' => '</a>']) !!}--}}
                                        I consent that I have read and agree to be bound by the <a
                                                href="#" data-modal-id="#modal-terms" data-toggle="modal">Terms & Conditions </a> of
                                        Consentic. I also agree that I have read and understand the <a
                                                href="#" data-modal-id="#modal-privacy" data-toggle="modal">Privacy Policy</a> and understand
                                        that both these agreements may change at any time without notice.

                                        <div class="modal" id="modal-terms">
                                            <div class="modal-background"></div>
                                            <div class="modal-content">
                                                <div class="box">
                                                    @include('web.partial.terms')
                                                </div>
                                                @include('web.partial.terms')
                                            </div>
                                            <button class="modal-close is-large" aria-label="close" data-dismiss="modal"></button>
                                        </div>

                                        <div class="modal" id="modal-privacy">
                                            <div class="modal-background"></div>
                                            <div class="modal-content">
                                                <div class="box">
                                                @include('web.partial.privacy')
                                                </div>
                                            </div>
                                            <button class="modal-close is-large" aria-label="close" data-dismiss="modal"></button>
                                        </div>

                                    </label>
                                    <div class="invalid-feedback" v-show="registerForm.errors.has('terms')">
                                        <strong>@{{ registerForm.errors.get('terms') }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <div class="col-md-6 offset-md-4">
                                <button class="button is-medium submit is-vcentered is-primary is-outlined" @click.prevent="register"
                                        :disabled="registerForm.busy">
                    <span v-if="registerForm.busy">
                        <i class="fa fa-btn fa-spinner fa-spin"></i> {{__('Registering')}}
                    </span>

                                    <span v-else>
                        <i class="fa fa-btn fa-check-circle"></i> {{__('Register')}}
                    </span>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>

    </div>

</form>
