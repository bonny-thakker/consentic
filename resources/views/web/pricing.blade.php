@extends('layouts.web')

@section('title', 'Informed consent solutions for patients and practitioners')
@section('description', 'Reduce your medicolegal risk and improve your practice with our affordable medical software solutions for informed consent. Packages available. No contracts.')

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
                <h2 class="title">Simple and affordable pricing </h2>
                <h3 class="subtitle">Informed consent solutions for individuals, group practices and institutions</h3>
            </div>
        </section>
        <section class="section ui-sortable-handle bg-grey">
            <div class="container">
                <div class="columns rows ui-sortable">
                    <div class="column">
                        <p class="subtitle">Our pricing is simple and affordable, with no ongoing obligation.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section ui-sortable-handle" data-background-image="" data-background-color="">
        <div class="container">
            <div class="columns rows ui-sortable">
                <div class="column" style="">
                    <div class="column-actions" style="display: none;">
                        <button class="button page-action is-circle is-primary is-outlined tooltip"
                                data-tooltip="Edit Content" data-action="edit" data-toggle="modal"
                                data-modal-id="#edit-content">
                            <span class="icon is-small">
                                <i class="fa fa-edit"></i>
                            </span>
                        </button>
                        <button class="button page-action is-circle is-primary is-outlined tooltip"
                                data-tooltip="Remove Column" data-action="remove">
                            <span class="icon is-small">
                                <i class="fa fa-trash"></i>
                            </span>
                        </button>
                    </div>
                    <div class="column-content"><p class="subtitle is-hidden" style="text-align: center;">We offer a
                            Starter pack which allows you to trial Consentic, as well as packages of 20 - 100
                            consents.</p>
                        <br>

                        <div class="pricing-table columns">
                            <div class="pricing-plan column">
                                <div class="plan-header">
                                    Consent 10
                                </div>
                                <div class="plan-price">
                                    <span class="plan-price-amount"><span class="plan-price-currency">$</span>25</span>/ month
                                </div>
                                <div class="plan-items">
                                    <div class="plan-item">
                                        Unlimited Account Users
                                    </div>
                                    <div class="plan-item">
                                        10 Consent Requests Per Month
                                    </div>
                                    <div class="plan-item">
                                        24/7 Support
                                    </div>
                                    <div class="plan-item">
                                        $2.50 for each additional consent
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
                                    Consent 30
                                </div>
                                <div class="plan-price">
                                    <span class="plan-price-amount"><span class="plan-price-currency">$</span>50</span>/ month
                                </div>
                                <div class="plan-items">
                                    <div class="plan-item">
                                        Unlimited Account Users
                                    </div>
                                    <div class="plan-item">
                                        30 Consent Requests Per Month
                                    </div>
                                    <div class="plan-item">
                                        24/7 Support
                                    </div>
                                    <div class="plan-item">
                                        $2.50 for each additional consent
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
                                    Consent 60
                                </div>
                                <div class="plan-price">
                                    <span class="plan-price-amount"><span class="plan-price-currency">$</span>100</span>/ month
                                </div>
                                <div class="plan-items">
                                    <div class="plan-item">
                                        Unlimited Account Users
                                    </div>
                                    <div class="plan-item">
                                        60 Consent Requests Per Month
                                    </div>
                                    <div class="plan-item">
                                        24/7 Support
                                    </div>
                                    <div class="plan-item">
                                        $2.50 for each additional consent
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-actions" style="display: none;">
                <button class="button page-action is-circle is-black is-outlined tooltip" data-tooltip="Settings"
                        data-action="settings" data-toggle="modal" data-modal-id="#edit-property">
                                <span class="icon is-small">
                                    <i class="fa fa-cog"></i>
                                </span>
                </button>
                <button class="button page-action is-circle is-black is-outlined tooltip" data-tooltip="Remove Row"
                        data-action="remove">
                                <span class="icon is-small">
                                    <i class="fa fa-trash"></i>
                                </span>
                </button>
            </div>
        </div>
        </section>
        <section class="section ui-sortable-handle" data-background-image="" data-background-color="#969FAA"
                 style="background-image: url(&quot;&quot;); background-color: rgb(150, 159, 170);"
        ");="" background-color:="" rgb(150,="" 159,="" 170);"="">
        <div class="container">
            <div class="columns rows ui-sortable">
                <div class="column">
                    <div class="column-actions" style="display: none;">
                        <button class="button page-action is-circle is-primary is-outlined tooltip"
                                data-tooltip="Edit Content" data-action="edit" data-toggle="modal"
                                data-modal-id="#edit-content">
                            <span class="icon is-small">
                                <i class="fa fa-edit"></i>
                            </span>
                        </button>
                        <button class="button page-action is-circle is-primary is-outlined tooltip"
                                data-tooltip="Remove Column" data-action="remove">
                            <span class="icon is-small">
                                <i class="fa fa-trash"></i>
                            </span>
                        </button>
                    </div>
                    <div class="column-content"><a href="{{ url('contact-cc') }}"><p style="text-align: center; "><b
                                        style="color: rgb(255, 255, 255);"><br></b></p>
                            <p style="text-align: center; "><b style="color: rgb(255, 255, 255);">STILL HAVE QUESTIONS?
                                    GET IN TOUCH WITH US NOW.</b><br></p></a></div>
                </div>
            </div>
            <div class="row-actions" style="display: none;">
                <button class="button page-action is-circle is-black is-outlined tooltip" data-tooltip="Settings"
                        data-action="settings" data-toggle="modal" data-modal-id="#edit-property">
                                <span class="icon is-small">
                                    <i class="fa fa-cog"></i>
                                </span>
                </button>
                <button class="button page-action is-circle is-black is-outlined tooltip" data-tooltip="Remove Row"
                        data-action="remove">
                                <span class="icon is-small">
                                    <i class="fa fa-trash"></i>
                                </span>
                </button>
            </div>
        </div>
        </section>

    </main>

@endsection