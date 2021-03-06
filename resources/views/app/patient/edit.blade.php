@extends('layouts.app')

@section('title', 'Patients')

@section('styles')

    @include('app.partial.styles')

    <style>
        .table {
            border: 1px solid #ccc;
        }

        .table td, .table th {
            padding: 1em .75em;
        }

        .button-follow-up {
            min-width: 100px;
        }

        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:after {
            position: absolute;
            bottom: 16px;
        }

        .table {
            margin-bottom: 0;
        }

        .buttons.has-addons .button {
            flex: 1;
        }

        .tabs.is-fullwidth li {
            flex: 1;
        }

        .tabs.is-toggle li:first-child a {
            border-radius: 6px 0 0 6px;
        }

        .tabs.is-toggle li:last-child a {
            border-radius: 0 6px 6px 0;
        }

        .tabs.is-toggle li.is-active a {
            background-color: #47525E;
            border-color: #47525E;
        }

        .tabs.is-toggle a:hover {
            border-color: initial;
        }

        .tabs.is-toggle a {
            border-color: #47525E;
            border-width: 2px;
        }

        .table {
            border: 1px solid #ccc;
        }

        .table td, .table th {
            padding: 1em .75em;
        }

        .button-follow-up {
            min-width: 100px;
        }

        .pac-container {
            z-index: 1001;
        }

        .consent-file {
            height: 150px;
        }

        .consent-file label {
            width: 100%;
        }

        .consent-file input {
            height: 100%;
            width: 100%;
            z-index: 1;
            opacity: 0;
        }

        .consent-file .file-cta {
            height: 100% !important;
            border: 3px dashed #dbdbdb;
            justify-content: center;
        }

        #list-table_wrapper .columns:first-child {
            display: none;
        }
    </style>
    <style>
        header.app-header {
            border-bottom: 1px solid #ccc;
        }
        /* .title {
            font-size: 2rem !important;
        }
        .subtitle {
            font-size: 1.5em !important;
        }
        .title.is-1 {
            font-size: 2em !important;
        }
        .title.is-2 {
            font-size: 1.75em !important;
        }
        .title.is-3 {
            font-size: 1.5em !important;
        }
        .title.is-4 {
            font-size: 1.5em !important;
        }
        .title.is-5 {
            font-size: 1.5em !important;
        }
        .title.is-6 {
            font-size: 1.5em !important;
        }
        #navbar-menu {
            font-size: 1.2rem !important;
        }
        .form-header-size {
            font-size: 1.3rem !important;
        }
        .site-input-size {
            font-size: 1.2rem !important;
        } */
    </style>

@endsection

@section('scripts')


@endsection

@section('content')

    <section class="section">
        <div class="container">
            <h5 class="title is-5">Patient Profile</h5>
            <div class="columns is-variable is-8">
                <div class="column is-4 patient-profile-card">
                    <div class="p-lg" style="border: 2px solid #47525E; border-radius: 6px; min-height: 400px;">
                        <figure class="m-b-md image is-128x128">
                            <img class="img-circle"
                                 src="https://ssl.gstatic.com/images/branding/product/1x/avatar_circle_blue_512dp.png">
                        </figure>
                        <h5 class="title is-5 m-none">{{ $patient->title }} {{ $patient->fullName() }}</h5>
                        <p>
                            <small>Patient Since {{ $patient->created_at->format('M, Y') }}</small>
                        </p>
                        <hr/>
                        <p>
                            <small><strong>Birthday</strong><br/>
                                {{ \Carbon\Carbon::parse($patient->birthday)->format('d/m/Y')  }}
                            </small>
                        </p>
                        <p>
                            <small><strong>Email</strong><br/>
                                {{ $patient->email->address ?? null }}
                            </small>
                        </p>
                        <p>
                            <small><strong>Mobile</strong><br/>
                                {{ $patient->phoneNumber->number ?? null }}
                            </small>
                        </p>
                        <p>
                            <small><strong>Address</strong><br/>
                                <span class="patient-profile-card-address">
                                        @if($patient->address)
                                        {{ $patient->address->line_1 }}
                                        {{ ($patient->address->line_2) ? '<br />'.$patient->address->line_2 : null }}
                                        {{ ($patient->address->line_3) ? '<br />'.$patient->address->line_3 : null }}
                                        <br/>{{ $patient->address->suburb }}
                                        <br/>{{ $patient->address->state }} {{ $patient->address->postcode }}
                                    @endif
                                    </span>
                            </small>
                        </p>
                    </div>
                </div>
                <div class="column">
                    <h1 class="title">Edit Profile</h1>
                    <form id="edit-patient-form" action="/app/patients/{{ $patient->id }}/update" method="post">
                        @include('app.patient.partial.form-fields')
                        <div class="field m-t-lg">
                            <div class="control content">
                                {{ csrf_field() }}
                                <button class="button is-medium is-primary is-fullwidth submit">Save Changes</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection

@push('jquery')

    <script>
        $(document).ready(function() {

        });
    </script>

@endpush