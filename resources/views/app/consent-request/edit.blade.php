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
            <h1 class="title">Edit Patient Consent Request</h1>

            <form id="add-consent-request-form" action="/app/consent-requests/{{ $consentRequest->id }}/update" method="POST"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="in_office" value="0" />
                <div class="columns is-variable is-8">
                    <div class="column is-6">
                        <h4 class="title is-4">Consent</h4>
                        @include('app.consent-request.partial.form-fields')
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
                                    @if (empty($consentRequest->files))
                                        <span class="file-label">
                                            Drag and drop files or click here to select
                                        </span>
                                    @else
                                        @foreach ($consentRequest->files as $file)
                                            <span class="file-label">
                                                {{ preg_replace('/^[^_]+[_]/', '', $file->name) }} <br>
                                                <a
                                                        class="file-remove"
                                                        href="#"
                                                        data-filename="{{ preg_replace('/^[^_]+[_]/', '', $file->name) }}"
                                                        data-uploaded="true"
                                                        data-file-key="{{ $file->id }}">Remove</a>
                                            </span>
                                        @endforeach
                                    @endif
                                </span>
                            </label>
                        </div>

                        <div class="field m-t-lg">
                            <div class="columns">
                                <div class="column">
                                    <button id="email-consent" class="button is-medium submit is-primary is-fullwidth">Email Updated Consent to Patient</button>
                                </div>
                                <div class="is-divider-vertical" data-content="OR"></div>
                                <div class="column">
                                    {{--<a href="#" id="consent-now"
                                       class="button is-medium submit is-primary is-fullwidth">Consent Patient Now</a>--}}
                                    <button id="office-consent" class="button is-medium submit is-primary is-fullwidth">
                                        Consent Patient Now
                                    </button>
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

            $('#office-consent').click(function(e){

                $('input[name="in_office"]').val(1)
                $(this).closest('form').submit()
                e.preventDefault();

            });

        });
    </script>


@endpush