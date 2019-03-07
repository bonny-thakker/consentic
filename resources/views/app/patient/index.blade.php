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

<section class="section">
    <div class="container">
        <form role="search" method="post" action="{{ url('app/patients/search') }}">
            {{ csrf_field() }}
        <div class="columns">
            <div class="column">
                <div class="field has-addons">
                    <div class="control">
                        <input id="patient-name-filter" type="text" class="input is-medium" placeholder="Enter Patient Name" name="search" value="{{ old('search') ?? Request::input('search') }}">
                    </div>
                    <div class="control">
                        <button class="button is-medium is-primary is-theme is-search">
                            Search
                        </button>
                    </div>
                </div>
            </div>
            <div class="column">

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
                <a href="{{ url('app/patients/create') }}" id="add-patient-button" class="button is-medium is-primary is-fullwidth is-theme">Add
                    Patient
                </a>
            </div>
        </div>
        </form>
        <div class="dt-bulma no-footer">
            <div class="columns">
                <div class="column is-12">
                    <table id="list-table" class="table is-hoverable is-striped is-fullwidth" style="width: 100%;">
                        <thead>
                        <tr>
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
                                <td>{{ $patient->fullName() }}</td>
                                {{-- <td>Healtd Fund</td> --}}
                                <td>{{ $patient->email->address ?? null }}</td>
                                <td>{{ \Carbon\Carbon::parse($patient->birthday)->format('d/m/Y') }}</td>
                                {{-- <td class="has-text-centered">Follow Up Req.</td> --}}
                                <td class="has-text-right actions">

                                    <div class="field has-addons is-pulled-right action" style="margin-bottom: 0">
                                        <p class="control">
                                            <a href="{{ url('app/patients/'.$patient->id) }}" class="button is-info tooltip" data-tooltip="View Details">
                                        <span class="icon">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                            </a>
                                        </p>
                                        <p class="control">
                                            <a href="{{ url('app/patients/'.$patient->id.'/edit') }}" class="button is-warning has-text-white tooltip action-edit" data-tooltip="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </p>
                                        <p class="control">
                                            <a href="{{ url('app/consent-requests/create/'.$patient->id) }}" class="button is-success has-text-white tooltip add-consent-request-button" data-tooltip="Add Consent">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </p>
                                        <p class="control">
                                            <a class="button is-danger has-text-white tooltip delete-button" data-tooltip="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </p>
                                    </div>

                                    <div class="field has-addons is-pulled-right action delete-buttons is-hidden">
                                        <p class="control">
                                            <a class="button is-default tooltip control delete-button-cancel is-hidden" data-tooltip="Delete Confirm">
                                                Cancel
                                            </a>
                                        </p>
                                        <p class="control">
                                            <a href="{{ url('app/patients/'.$patient->id.'/delete') }}" class="button is-danger has-text-white tooltip delete-button-confirm is-hidden" data-tooltip="Delete Cancel">
                                                Yes, delete?
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

@endsection