@extends('layouts.web')

@section('title', 'Group Pricing')

@section('styles')

    @include('web.partial.styles')

    <style>
        .section-title {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("/images/4be763cb7a227d4ae1e45ab4f5d933d1_doctor-writing-prescription-at-table-PRZXA65-min.jpg");
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

@endsection

@section('scripts')
    @include('web.partial.scripts')
@endsection

@section('content')

    <main class="app-content">

        <section class="section section-title is-highlight">
            <div class="container">
                <h2 class="title">Group Pricing</h2>
                <h3 class="subtitle">The pricing models for group practices are outlined below.</h3>
            </div>
        </section>
        <section class="section ui-sortable-handle" data-background-image="" data-background-color="">
        <div class="container">
            <div class="columns rows ui-sortable"><div class="column" style="">
                    <div class="column-actions" style="display: none;">
                        <button class="button page-action is-circle is-primary is-outlined tooltip" data-tooltip="Edit Content" data-action="edit" data-toggle="modal" data-modal-id="#edit-content">
                            <span class="icon is-small">
                                <i class="fa fa-edit"></i>
                            </span>
                        </button>
                        <button class="button page-action is-circle is-primary is-outlined tooltip" data-tooltip="Remove Column" data-action="remove">
                            <span class="icon is-small">
                                <i class="fa fa-trash"></i>
                            </span>
                        </button>
                    </div>
                    <div class="column-content"><p class="subtitle" style="text-align: center;">We offer a Starter pack which allows you to trial Consentic with 100 consents, as well as packages of 250 - 500 consents. </p>
                        <br>

                        <div class="pricing-table columns">
                            <div class="pricing-plan column">
                                <div class="plan-header">
                                    Starter
                                </div>
                                <div class="plan-price">
                                    <span class="plan-price-amount"><span class="plan-price-currency">$</span>120</span>.00
                                </div>
                                <div class="plan-items">
                                    <div class="plan-item">
                                        <span style="font-style: normal; font-weight: 400;">Unlimited Account Users</span>
                                    </div>
                                    <div class="plan-item">
                                        <span style="font-style: normal; font-weight: 400;">100 Consents</span>
                                    </div>
                                    <div class="plan-item">
                                        <span style="font-style: normal; font-weight: 400;">24/7 Support</span>
                                    </div>
                                    <div class="plan-item">
                                        <span style="font-style: normal; font-weight: 400;">First Time Users Only</span>
                                    </div>
                                </div>
                                <div class="plan-footer">
                                    <a class="button is-medium is-primary is-fullwidth" href="/register">
                                        @if(env('TRIAL_ENABLED'))
                                            30 Day Free Trial, Join Now!
                                        @else
                                            Sign Up Now
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <div class="pricing-plan column">
                                <div class="plan-header">
                                    Standard
                                </div>
                                <div class="plan-price">
                                    <span class="plan-price-amount"><span class="plan-price-currency">$</span>2</span>.00
                                </div>
                                <div class="plan-items">
                                    <div class="plan-item">
                                        <span style="font-style: normal; font-weight: 400;">Unlimited Account Users</span>
                                    </div>
                                    <div class="plan-item">
                                        <span style="font-style: normal; font-weight: 400;">Per Consent</span>
                                    </div>
                                    <div class="plan-item">
                                        <span style="font-style: normal; font-weight: 400;">24/7 Support</span>
                                    </div>
                                    <div class="plan-item">
                                        <span style="font-style: normal; font-weight: 400;">Pay As You Go</span>
                                    </div>
                                </div>
                                <div class="plan-footer">
                                    <a class="button is-medium is-primary is-fullwidth" href="/register">
                                        @if(env('TRIAL_ENABLED'))
                                            30 Day Free Trial, Join Now!
                                        @else
                                            Sign Up Now
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div></div>
                </div></div>
            <div class="row-actions" style="display: none;">
                <button class="button page-action is-circle is-black is-outlined tooltip" data-tooltip="Settings" data-action="settings" data-toggle="modal" data-modal-id="#edit-property">
                                <span class="icon is-small">
                                    <i class="fa fa-cog"></i>
                                </span>
                </button>
                <button class="button page-action is-circle is-black is-outlined tooltip" data-tooltip="Remove Row" data-action="remove">
                                <span class="icon is-small">
                                    <i class="fa fa-trash"></i>
                                </span>
                </button>
            </div>
        </div>
        </section><section class="section ui-sortable-handle" data-background-image="" data-background-color="#969FAA" style="background-image: url(&quot;&quot;); background-color: rgb(150, 159, 170);" ");="" background-color:="" rgb(150,="" 159,="" 170);"="">
        <div class="container">
            <div class="columns rows ui-sortable"><div class="column">
                    <div class="column-actions" style="display: none;">
                        <button class="button page-action is-circle is-primary is-outlined tooltip" data-tooltip="Edit Content" data-action="edit" data-toggle="modal" data-modal-id="#edit-content">
                            <span class="icon is-small">
                                <i class="fa fa-edit"></i>
                            </span>
                        </button>
                        <button class="button page-action is-circle is-primary is-outlined tooltip" data-tooltip="Remove Column" data-action="remove">
                            <span class="icon is-small">
                                <i class="fa fa-trash"></i>
                            </span>
                        </button>
                    </div>
                    <div class="column-content"><a href="{{ url('contact-cc') }}"><p style="text-align: center; "><b style="color: rgb(255, 255, 255);"><br></b></p><p style="text-align: center; "><b style="color: rgb(255, 255, 255);">STILL HAVE QUESTIONS? GET IN TOUCH WITH US NOW.</b><br></p></a></div>
                </div></div>
            <div class="row-actions" style="display: none;">
                <button class="button page-action is-circle is-black is-outlined tooltip" data-tooltip="Settings" data-action="settings" data-toggle="modal" data-modal-id="#edit-property">
                                <span class="icon is-small">
                                    <i class="fa fa-cog"></i>
                                </span>
                </button>
                <button class="button page-action is-circle is-black is-outlined tooltip" data-tooltip="Remove Row" data-action="remove">
                                <span class="icon is-small">
                                    <i class="fa fa-trash"></i>
                                </span>
                </button>
            </div>
        </div>
        </section>

    </main>

@endsection