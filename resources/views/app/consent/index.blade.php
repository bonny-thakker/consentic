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

    <section class="section">

        <div class="container">
            <form role="search" method="post" action="{{ url('app/consent-requests/search') }}">
                {{ csrf_field() }}
                <div class="columns">
                    <div class="column">
                       {{-- <div class="field has-addons">
                            <div class="control">
                                <input id="patient-name-filter" type="text" class="input is-medium is-search" placeholder="Enter Patient Name" name="search" value="{{ old('search') ?? Request::input('search') }}">
                            </div>
                            <div class="control">
                                <button class="button is-medium is-primary is-theme is-search">
                                    Search
                                </button>
                            </div>
                        </div>
--}}
                    </div>

                    <div class="column">

                    </div>

                    <div class="column">


                    </div>

                    <div class="column">
                      {{--  <a href="{{ url('app/consent-requests/create') }}" id="add-consent-request-button" class="button is-medium is-primary is-fullwidth is-theme">Add Consent</a>
                    --}}</div>

                </div>
            </form>
            <div class="dt-bulma no-footer">
                <div class="columns">
                    <div class="column is-12">
                        <table id="list-table" class="table is-hoverable is-striped is-fullwidth" style="width: 100%;">
                            <thead>
                            <tr>
                                <th>Animation</th>
                                <th>Name</th>
                                <th>Speciality</th>
                               {{-- <th>Info</th>--}}
                                <th class="has-text-right"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($consents as $consent)
                               <tr>
                                   <td>
                                       <a target="_blank" href="{{ url('app/consents/'.$consent->id) }}" class="consent-video-modal">
                                           <figure class="image is-4by3">
                                           <img width="100%" height="400" src="{{ $consent->videoThumbnail() }}">
                                           </figure>
                                       </a>
                                   </td>
                                   <td>
                                       {{ $consent->name }}
                                   </td>
                                   <td>
                                       {{ $consent->consentSpeciality->name }}
                                   </td>
                                   {{--<td>
                                       {{ $consent->info_link }}
                                   </td>--}}
                                   <td class="has-text-right actions">

                                       <div class="field has-addons is-pulled-right action" style="margin-bottom: 0">
                                       <p class="control">
                                           <a href="{{ url('app/consents/'.$consent->id) }}" class="button is-info tooltip consent-video-modal" data-tooltip="Watch Animation">
                                        <span class="icon">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                           </a>
                                       </p>
                                       <p class="control">
                                           <a href="{{ url('app/consent-requests/create/consent/'.$consent->id) }}" class="button is-success has-text-white tooltip add-consent-request-button" data-tooltip="Add Consent Request">
                                               <i class="fas fa-plus"></i>
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