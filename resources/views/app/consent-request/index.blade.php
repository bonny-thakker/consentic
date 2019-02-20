@extends('layouts.app')

@section('title', 'Consent Requests')

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

        .select2-container .select2-dropdown .select2-results__options .select2-results__option {
            font-size: 1.2rem;
        }

        /* Safari 9 fix */
        @supports (overflow:-webkit-marquee) and (justify-content:inherit)
        {
            .consent-file .file-cta {
                height: 150px !important;
            }
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
                            <input id="patient-name-filter" type="text" class="input is-medium list-filter" placeholder="Search Patient Name" />
                        </div>
                        <div class="column">
                            <input id="patient-dob-filter" type="text" class="input is-medium list-filter" placeholder="Date of Birth" readonly />
                        </div>


                    <div class="column">
                        <div class="select is-fullwidth">
                            <select id="procedure-filter" class="list-filter">
                                <option disabled selected>Procedure</option>
                                @foreach (\App\Consent::all() as $consent)
                                    <option value="{{ $consent->id }}">{{ $consent->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="column">
                        <div class="select is-fullwidth">
                            <select id="type-filter" class="list-filter">
                                <option disabled selected>Type</option>
                                @foreach (\App\ConsentType::all() as $consentType)
                                    <option value="{{ $consentType->id }}">{{ $consentType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                        <div class="column">
                            <button id="add-consent-request-button" class="button is-medium is-primary is-fullwidth is-theme">Add Consent</button>
                        </div>

                </div>
                <div class="dt-bulma no-footer">
                    <div class="columns">
                        <div class="column is-12">
                            <table id="list-table" class="table is-hoverable is-striped is-fullwidth" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>Date Created</th>
                                    <th>Patient Name</th>
                                    <th>Procedure</th>
                                    <th>Type</th>
                                    <th class="has-text-centered">Video Watched</th>
                                    <th class="has-text-centered">Signed</th>
                                    <th class="has-text-centered">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($consentRequests as $consentRequest)
                                <tr>
                                    <td>{{ $consentRequest->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $consentRequest->patient->fullName() }}</td>
                                    <td>{{ $consentRequest->consent->name }}</td>
                                    <td>{{ $consentRequest->consent->consentType->name }}</td>
                                    <td class="has-text-centered">
                                        @if($consentRequest->video_watched)
                                            <span class="icon has-text-success">
                                                <i class="mdi mdi-24px mdi-check-circle"></i>
                                            </span>
                                        @else
                                            <span class="icon has-text-danger">
                                                <i class="mdi mdi-24px mdi-close-circle"></i>
                                            </span>
                                        @endif
                                    </td>
                                    <td class="has-text-centered">
                                        @if($consentRequest->user_signed_ts || $consentRequest->patient_signed_ts)
                                            <span class="icon has-text-success">
                                                <i class="mdi mdi-24px mdi-check-circle"></i>
                                            </span>
                                        @else
                                            <span class="icon has-text-danger">
                                                <i class="mdi mdi-24px mdi-close-circle"></i>
                                            </span>
                                        @endif

                                    </td>
                                    <td class="has-text-centered">
                                        <div class="field has-addons is-centered action">
                                            <p class="control">
                                                <a class="button is-info tooltip" data-tooltip="View Details" href="#">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </p>
                                            <p class="control">
                                                <a class="button is-secondary tooltip " data-tooltip="Download" data-id="" disabled="">
                                                    <i class="fas fa-file-alt"></i>
                                                </a>
                                            </p>
                                            <p class="control">
                                                <a class="button is-warning has-text-white tooltip action-edit" data-tooltip="Edit" data-id="dFWmgr6QqE">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </p>
                                            <p class="control">
                                                <a class="button is-danger tooltip action-delete" data-tooltip="Delete" data-id="dFWmgr6QqE">
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