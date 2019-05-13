@extends('layouts.web')

@section('title', 'Simplify medical consent with Australia’s only online platform ')
@section('description', 'Streamline the process around consent for medical procedures with our online platform of comprehensive, medicolegally reviewed and patient-tested animations')

@section('styles')
    <style>
        header.app-header,
        nav.navbar {
            /* background-color: #E5E9F2 !important; */
            background-color: transparent !important;
        }

        a.navbar-item.is-active, a.navbar-item:hover, a.navbar-link.is-active, a.navbar-link:hover {
            color: #fff !important;
        }

        .navbar-item, .navbar-link {
            color: #ccc;
        }

        @media screen and (max-width: 1023px) {
            header.app-header, nav.navbar {
                background-color: white !important;
            }

            a.navbar-item.is-active, a.navbar-item:hover, a.navbar-link.is-active, a.navbar-link:hover {
                color: #000 !important;
            }

            .navbar-item, .navbar-link {
                color: #666 !important;
            }
        }

        section.section:first-of-type img {
            max-width: 400px !important;
            margin: auto;
        }

        section.section:first-of-type {
            /* Set a specific height */
            min-height: 500px;

            /* Create the parallax scrolling effect */
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

            margin-top: -104px !important;
            padding-top: 150px !important;
        }

        section.section:first-of-type .title,
        section.section:first-of-type .subtitle {
            color: #fff !important;
            max-width: initial;
            text-align: left;
            line-height: 2.2rem;
            font-size: 1.2rem;
        }

        section.section:first-of-type .title {
            font-size: 2.3rem;
            line-height: 3rem;
        }

        section.section:not(:first-of-type) {
            padding-top: 2rem !important;
            padding-bottom: 2rem !important;
        }

        main.app-content {
            margin-top: 0px;
        }

        header.app-header {
            position: initial;
            top: initial;
            z-index: 1;
            width: 100%;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
        }

        header.app-header.sticky {
            position: fixed;
            top: 0;
            z-index: 1;
            width: 100%;
            background: #fff !important;
            -webkit-box-shadow: 0px 2px 8px 1px rgba(0, 0, 0, 0.25);
            -moz-box-shadow: 0px 2px 8px 1px rgba(0, 0, 0, 0.25);
            box-shadow: 0px 2px 8px 1px rgba(0, 0, 0, 0.25);
            color: #666;
        }

        header.app-header.sticky .navbar-item, .navbar-link {
            color: #666;
        }

        header.app-header.sticky a.navbar-item.is-active, a.navbar-item:hover, a.navbar-link.is-active, a.navbar-link:hover {
            color: #16b1ba !important
        }
    </style>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('section.section').each(function () {
                let section = $(this);
                let styles = $(this).data();

                $.each(styles, function (name, value) {

                    if (value == '' || value == null || value == undefined) {
                        return;
                    }

                    switch (name) {
                        case 'backgroundImage':
                            section.css('background-image', `linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("${value}")`);
                            break;

                        default:
                            section.css(name, value);
                            break;
                    }
                });
            });

            $('#main-signup-button').click(function () {
                let emailAddress = $('#main-email-input').val();

                if (emailAddress) {
                    location.replace(`/registration?email=${emailAddress}`);
                }
            });

            // When the user scrolls the page, execute myFunction
            window.onscroll = function () {
                myFunction()
            };

            // Get the header
            var header = document.getElementById("app-header");

            // Get the offset position of the navbar
            var sticky = header.offsetTop;

            // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
            function myFunction() {
                if (window.pageYOffset > sticky) {
                    header.classList.add("sticky");
                    $('#brand-logo').attr('src', '/images/logo-dark-sm.png');
                } else {
                    header.classList.remove("sticky");
                    $('#brand-logo').attr('src', '/images/logo-light-sm.png');
                }
            }
        });
    </script>
@endsection

@section('content')

    <main class="app-content">

        <section class="section ui-sortable-handle" data-background-image="/images/index.jpg">
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
                        <div class="column-content">
                            <div class="columns">
                                <div class="column is-7">
                                    <header class="section-header">
                                        <h1 class="title">Medical, dental and financial consent made simple and
                                            reassuring for patients, and less risky and faster for doctors</h1>
                                    </header>
                                    <div class="section-body">
                                        <div class="subtitle is-6">Consentic is an online platform of comprehensive,
                                            medicolegally reviewed, and patient-tested video animations that assist
                                            medical, dental and financial consent.
                                        </div>

                                        <div class="field is-horizontal">
                                            <div class="field-body">
                                                {{--<div class="field">
                                                    <div class="control">
                                                        <input id="main-email-input" class="input" type="text" placeholder="Email" name="email">
                                                    </div>
                                                </div>--}}
                                                <div class="field is-expanded">
                                                    <div class="control">
                                                        <a href="/register" id="main-signup-button"
                                                           class="button submit is-secondary is-fullwidth"
                                                           style="width: 300px">
                                                            @if(env('TRIAL_ENABLED'))
                                                                Sign Up for a Free 30 Day Trial
                                                            @else
                                                                Sign Up Now
                                                            @endif
                                                        </a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <header class="section-header">
                                        <h1 class="title has-text-centered">Created by doctors, for doctors.</h1>
                                    </header>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-actions is-hidden">
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
        <section class="section ui-sortable-handle" data-background-image="" data-background-color=""
                 style="background-image: url("
        ");"="">
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
                    <div class="column-content">
                        <h2 class="title is-spaced is-bold has-tint" style="text-align: center; ">Why Consentic?</h2>
                        <div class="subtitle">
                            <p style="text-align: center;">Informed medical consent is time consuming, and a source of
                                medicolegal risk. Medicolegal complaints are increasing in Australia each year, and
                                doctors who perform procedures are at the highest risk. However, evidence shows that
                                video consent for medical procedures increases patient understanding, and improves both
                                patient and clinician satisfaction.</p>
                            <br>
                            <p style="text-align: center;">Consentic optimises and streamlines medical, dental and
                                financial consent, resulting in enhanced patient understanding, improved patient and
                                clinician satisfaction, and increased practice efficiency.</p>
                            <br>
                            <p style="text-align: center;">Our comprehensive consent videos for a wide range of medical
                                and dental procedures saves clinicians time and money, and provide the peace of mind
                                that comes from knowing you have adequately consented your patients. </p>
                            <br>
                            <p style="text-align: center;">We are trialing Consentic in formal randomised controlled
                                trials at a number of institutions. <a href="{{ url('about') }}">Find out more</a></p>
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
        <section class="section ui-sortable-handle" data-background-image="" data-background-color=""
                 style="background-image: url("
        ");"="">
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
                    <div class="column-content">
                        <p class="subtitle">
                            Informed medical consent is time consuming, poorly executed, unstandardised and a source of
                            medicolegal risk. Medicolegal claims are increasing in Australia by 15% per annum, with
                            proceduralists at the highest risk. There is clear evidence from the medical literature that
                            video consent increases patient understanding and improves both patient and physician
                            satisfaction.</p>
                        <p class="subtitle">Consentic provides medical consent videos for a wide range of procedures,
                            and also incorporates financial consent. This saves doctors time and money, and provides the
                            peace of mind that comes from knowing you have adequately collected both medical and
                            financial consent.</p></div>
                </div>
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
                    <div class="column-content">
                        <iframe src="https://www.youtube.com/embed/H7ZUhSB_6Xs" allowfullscreen="" width="100%"
                                height="300px"></iframe>
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
        <section class="section ui-sortable-handle" data-background-image="" data-background-color=""
                 style="background-image: url("
        ");"="">
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
                    <div class="column-content">
                        <header class="section-header">
                            <div class="subtitle">
                                <p style="text-align: center;">We are working with some of the biggest names in the
                                    medical and startup industries. By collaborating with these companies, we are able
                                    to deliver a robust and reliable system for medical professionals and their
                                    patients.</p>
                            </div>
                        </header>
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
        <section class="section ui-sortable-handle" data-background-image="/images/about-bg.jpg">
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
                        <div class="column-content"><a href="/about">
                                <div style="text-align: center; margin-top:25px"><b class="title is-3"
                                                                                    style="color: rgb(255, 255, 255);">We
                                        are trialing Consentic in formal randomised controlled trials at a number of
                                        institutions. <u>Find out more</u> </b></div>
                            </a></div>
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