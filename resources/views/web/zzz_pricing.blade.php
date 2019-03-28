@extends('layouts.web')

@section('title', 'Pricing')

@section('styles')

@include('web.partial.styles')

<style>
    .section-title {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("/images/f73bbf05c41b846e6b86da387b37f27c_Pricing.jpeg");
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
                <h2 class="title">Pricing</h2>
                <h3 class="subtitle">Our pricing is simple and affordable.</h3>
            </div>
        </section>
        <section class="section ui-sortable-handle" data-background-image="" data-background-color="" style="background-image: url(&quot;&quot;);" ");"="">
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
                    <div class="column-content"><div style="text-align: center;"><img src="https://image.ibb.co/eWKan9/oldman.png" style="width: 100%;"><span style="color: rgb(54, 54, 54); font-size: 1.5em; font-weight: 400;"><br></span></div><h3 class="title is-size-4 m-lg" style="text-align: center; ">Individual Clinicians</h3>
                        <p class="subtitle is-size-6" style="text-align: center;">If you plan to use Consentic as an individual clinician, this is the plan for you. Consentic caters for doctors seeing any volume of patients. Get started by clicking the button below.</p>
                        <div style="height: 57px;"></div>
                        <p style="text-align: center;"><a class="button is-medium is-primary" href="{{ url('individual-pricing') }}">View Plans</a></p></div>
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
                    <div class="column-content"><img src="https://image.ibb.co/ebkFn9/doctors.png"><br><h3 class="title is-size-4 m-lg" style="text-align: center;"></h3><h3 class="title is-size-4 m-lg" style="text-align: center;">Group Practices </h3>
                        <p class="subtitle is-size-6" style="text-align: center;">Consentic provides tailored packages for Group Practices, with a higher volume of patients and multiple practitioners. If you would like to use Consentic for your Group Practice, please click the button below. </p>
                        <div style="height: 30px;"></div>
                        <p style="text-align: center;"><a class="button is-medium is-primary" href="{{ url('group-pricing') }}">View Plans</a></p>
                        <div class="is-divider is-hidden-desktop"></div>
                    </div>
                </div><div class="column" style="">
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
                    <div class="column-content"><p><img src="https://image.ibb.co/i3QRup/hospital.png"></p>
                        <h3 class="title is-size-4 m-lg" style="text-align: center;">Hospitals &amp; Institutions</h3>
                        <p class="subtitle is-size-6" style="text-align: center;">Consentic offers enterprise level solutions for larger scale medical and dental institutions. We understand the complexities of running hospitals and institutions, and we ask that you get in touch with us to discuss your unique needs.</p>
                        <p style="text-align: center;"><a class="button is-medium is-primary" href="{{ url('contact-cc') }}">View Plans</a></p>
                        <div class="is-divider is-hidden-desktop"></div>
                    </div>
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