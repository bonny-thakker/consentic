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
            <h1 class="title">Subscription Required</h1>
            <p>Unfortunately your free trial period has come to an end. Please <a href="/settings/practice/{{ auth()->user()->currentTeam->id }}#/subscription">select a membership plan </a> to continue using Consentic.</p>

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