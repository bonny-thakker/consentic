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

        #list-table_wrapper .columns:first-child {
            display: none;
        }

        .pac-container {
            z-index: 1001;
        }

        .consent-file {
            min-height: 150px;
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

        .consent-file .file-cta .file-label:first-of-type {
            margin-top: 1rem;
        }

        .consent-file .file-cta .file-label {
            z-index: 2;
            text-align: center;
            padding: .5rem;
        }
    </style>

@endsection

@section('scripts')

@endsection

@section('content')

    <main class="app-content">
        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column">
                        <input id="patient-name-filter" type="text" class="input is-medium"
                               placeholder="Search Patient Name">
                    </div>
                    <div class="column">
                        <input id="patient-dob-filter" type="text" class="input is-medium list-filter is-hidden"
                               placeholder="Date of Birth" readonly="">
                    </div>
                    <div class="column is-hidden">
                        <div class="select is-fullwidth">
                            <select id="health-fund-filter" class="list-filter">
                                <option disabled="" selected="">Health Fund</option>
                            </select>
                        </div>
                    </div>
                    <div class="column is-hidden">
                        <div class="select is-fullwidth">
                            <select id="filter-follow-up">
                                <option disabled="" selected="">Follow Up Req.</option>
                                <option>Yes</option>
                                <option>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="column">
                        <button id="add-patient-button" class="button is-medium is-primary is-fullwidth is-theme">Add
                            Patient
                        </button>
                    </div>
                </div>
                <div class="dt-bulma no-footer">
                    <div class="columns">
                        <div class="column is-12">
                            <table id="list-table" class="table is-hoverable is-striped is-fullwidth" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th class="is-hidden">Last Name</th>
                                    <th>Patient Name</th>
                                    {{-- <th>Health Fund</th> --}}
                                    <th>Email</th>
                                    <th>DOB</th>
                                    {{-- <th class="has-text-centered">Follow Up Req.</th> --}}
                                    <th class="has-text-centered">&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($patients as $patient)
                                    <tr>
                                        <th class="is-hidden">{{ $patient->last_name }}</th>
                                        <td>{{ $patient->fullName() }}</td>
                                        {{-- <td>Healtd Fund</td> --}}
                                        <td>{{ $patient->email->address ?? null }}</td>
                                        <td>{{ \Carbon\Carbon::parse($patient->birthday)->format('d/m/Y') }}</td>
                                        {{-- <td class="has-text-centered">Follow Up Req.</td> --}}
                                        <td class="has-text-centered">

                                            <div class="field has-addons is-centered action">
                                                <p class="control">
                                                    <a href="/patients/profile/9bvHsrc0th" class="button is-info tooltip" data-tooltip="View Details">
                                                <span class="icon">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                                    </a>
                                                </p>
                                                <p class="control">
                                                    <a class="button is-warning has-text-white tooltip action-edit" data-tooltip="Edit" data-id="9bvHsrc0th">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </p>
                                                <p class="control">
                                                    <a class="button is-success has-text-white tooltip add-consent-request-button" data-tooltip="Add Consent" data-id="9bvHsrc0th">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                </p>
                                                <p class="control">
                                                    <a class="button is-danger has-text-white tooltip delete-button" data-tooltip="Delete" data-id="9bvHsrc0th" disabled="">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </p>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="columns">
                        <div class="column is-5">
                          {{-- PAGINATION --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection