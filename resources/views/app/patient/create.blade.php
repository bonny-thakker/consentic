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
            <h1 class="title">Add Patient</h1>
            <form id="add-patient-form" action="/app/patients/store" method="post">
                @include('app.patient.partial.form-fields')
                <div class="field m-t-lg">
                    <div class="control content">
                        {{ csrf_field() }}
                        <button class="button is-medium is-primary is-fullwidth submit">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection

@push('jquery')

    <script>
        $(document).ready(function() {

        });
    </script>


@endpush