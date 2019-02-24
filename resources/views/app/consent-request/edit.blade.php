@extends('layouts.app')

@section('title', 'Consent Request')

@section('styles')

    @include('app.partial.styles')

@endsection

@section('scripts')


@endsection

@section('content')

    <section class="section">
        <div class="container">
            <h1 class="title">Edit Patient Consent Request</h1>

            <form id="add-consent-request-form" action="/app/consent-requests/{{ $consentRequest->id }}/update" method="POST"
                  enctype="multipart/form-data">

                <div class="columns is-variable is-8">
                    <div class="column is-4">
                        <h4 class="title is-4">Consent</h4>
                        <div class="select is-fullwidth">
                            <select name="patient" id="patient-list">
                                <option disabled selected>Select Patient</option>
                                @foreach (\App\Patient::all() as $patient)
                                    <option value="{{ $patient->id }}" {{ ($consentRequest->patient->id == $patient->id) ? 'selected' : null }}>{{ $patient->fullName() }}
                                        - {{ \Carbon\Carbon::parse($patient->birthday)->format('d/m/Y') }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="select is-fullwidth m-t-md">
                            <select name="procedure" id="procedure-list">
                                <option disabled selected>Select Procedure</option>
                                @foreach (\App\Consent::all() as $consent)
                                    <option
                                            value="{{ $consent->id }}"
                                            data-video="{{ $consent->video_url }}" {{ ($consentRequest->consent->id == $consent->id) ? 'selected' : null }}
                                    >{{ $consent->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="select is-fullwidth m-t-md is-hidden">
                            <select name="reminder">
                                <option disabled selected>Set Reminder</option>
                                <option value="0">No Reminder</option>
                                <option value="1">1 Day</option>
                                <option value="7">1 Week</option>
                                <option value="14">2 Weeks</option>
                            </select>
                        </div>
                        <div class="m-t-md is-hidden">
                            <label for="consentInOffice">Consent Patient Now</label>
                            <div class="field m-t-md">
                                <input id="consentInOffice" type="checkbox" name="consentInOffice"
                                       class="switch is-rounded is-outlined is-medium" value="true">
                                <label for="consentInOffice"></label>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <h4 class="title is-4">Preview</h4>
                        <div id="consent-video">
                            <iframe height="350px" width="100%" height="auto"
                                    src="https://www.youtube.com/embed/H7ZUhSB_6Xs" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                <div class="columns">
                    <div class="column is-12">
                        <h4 class="title is-4">Upload Files for Patient Viewing</h4>

                        <div class="file is-boxed consent-file">
                            <label class="file-label">
                                <input id="consent-files" class="file-input" type="file" name="consentFile[]" multiple>
                                <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Drag and drop files or click here to select
                        </span>
                    </span>
                            </label>
                        </div>

                        <div class="field m-t-lg">
                            <div class="columns">
                                <div class="column">
                                    <button id="email-consent" class="button is-medium submit is-primary is-fullwidth" disabled="">Email Consent to Patient</button>
                                </div>
                                <div class="is-divider-vertical" data-content="OR"></div>
                                <div class="column">
                                    <button id="consent-now" class="button is-medium submit is-primary is-fullwidth">Consent Patient Now</button>
                                </div>
                            </div>
                            <a href="{{ url()->previous() }}" class="button is-medium is-fullwidth is-theme m-t-md">Cancel</a>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </section>
@endsection

@push('jquery')

    <script>
        $(document).ready(function () {

        });
    </script>


@endpush