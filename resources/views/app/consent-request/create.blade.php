@extends('layouts.app')

@section('title', 'Consent Request')

@section('styles')

    @include('app.partial.styles')

    <style>

        .consent-file .file-cta .file-label{
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
            <h1 class="title">Create Patient Consent Request</h1>

            <form id="add-consent-request-form" action="/app/consent-requests/store" method="POST"
                  enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="columns is-variable is-8">
                    <div class="column is-4">
                        <h4 class="title is-4">New Consent</h4>
                        @include('app.consent-request.partial.form-fields')
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
                                <input id="consent-files" class="file-input" type="file" name="consent_file[]" multiple>
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
                                    <button id="email-consent" class="button is-medium submit is-primary is-fullwidth">
                                        Email Consent to Patient
                                    </button>
                                </div>
                                <div class="is-divider-vertical" data-content="OR"></div>
                                <div class="column">
                                    <a href="#" id="consent-now"
                                       class="button is-medium submit is-primary is-fullwidth">Consent Patient Now</a>
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