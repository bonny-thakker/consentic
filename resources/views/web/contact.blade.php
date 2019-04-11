@extends('layouts.web')

@section('title', 'Contact | Discover more about online medical consent')
@section('description', 'Streamlined, standardised consent solutions for practitioners, practices and institutions. Contact us today.')

@section('styles')

    @include('web.partial.styles')

    <style>
        .section-title {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("/images/7f891e36e8cdbe39777d0d4b0144f55a_contact_header.jpeg");
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
                <h2 class="title">We’d love to hear from you</h2>
                <h3 class="subtitle">Please contact us using any of the methods below with your query, and we’ll get back to you as soon as possible</h3>
            </div>
        </section>
        <section class="section ui-sortable-handle" data-background-image="" data-background-color="" style="background-image: url(&quot;&quot;);" ");"="">
        <div class="container">
            <div class="columns rows ui-sortable"><div class="column is-5">
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
                    <div class="column-content">
					<!--<h1 class="title">Get In Touch</h1>-->
                        <br>
                        <div class="columns is-mobile">
                            <div class="column">
                                <span class="icon"><i class="mdi mdi-36px mdi-email-outline"></i></span>
                            </div>
                            <div class="column is-11">
                                <p class="subtitle"><a href="mailto:info@consentic.com" target="_blank">info@consentic.com</a></p>
                            </div>
                        </div>
                        <div class="columns is-mobile">
                            <div class="column">
                                <span class="icon"><i class="mdi mdi-36px mdi-facebook-box"></i></span>
                            </div>
                            <div class="column is-11">
                                <p class="subtitle"><a href="https://www.facebook.com/consentic/" target="_blank">facebook.com/consentic</a></p>
                            </div>
                        </div>
                        <div class="columns is-mobile">
                            <div class="column">
                                <span class="icon"><i class="mdi mdi-36px mdi-instagram"></i></span>
                            </div>
                            <div class="column is-11">
                                <p class="subtitle"><a href="https://www.instagram.com/consentic/" target="_blank">consentic</a></p>
                            </div>
                        </div>
                        <div class="columns is-mobile">
                            <div class="column">
                                <span class="icon"><i class="mdi mdi-36px mdi-twitter"></i></span>
                            </div>
                            <div class="column is-11">
                                <p class="subtitle"><a href="https://twitter.com/consentic" target="_blank">@consentic</a></p>
                            </div>
                        </div></div>
                </div><div class="column">
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
                    <div class="column-content">
                        <h1 class="title">Send Us A Message</h1>
                        <div id="contact-us-form">
                            <div class="field columns">
                                <div class="control column">
                                    <input type="text" class="input is-medium" placeholder="Your Name" name="name">
                                </div>
                            </div>
                            <div class="field columns">
                                <div class="control column">
                                    <input type="text" class="input is-medium" placeholder="Phone Number (Optional)" name="phone">
                                </div>
                                <div class="control column">
                                    <input type="text" class="input is-medium" placeholder="Message Subject" name="subject">
                                </div>
                            </div>
                            <div class="field columns">
                                <div class="control column">
                                    <input type="email" class="input is-medium" placeholder="Email Address" name="email">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <textarea class="textarea is-medium" name="body" id="" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="field">
                                <button id="submit-contact-us-form" type="submit" class="button submit is-primary is-fullwidth is-medium">Send Message</button>
                            </div>
                        </div></div></div></div></div></section>

    </main>

@endsection