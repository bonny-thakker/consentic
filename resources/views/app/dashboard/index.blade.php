@extends('layouts.app')

@section('title', 'Dashboard')

@section('styles')

    @include('app.partial.styles')

    <style>
        .section-title {
            background: url("/images/c92e2def5d0dfde20a68f06d3db8e239_new-dash.jpeg");
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

@endsection

@section('scripts')

@endsection

@section('content')

    <section class="section section-title is-highlight">
        <div class="container">
            <h2 class="title">Dashboard</h2>
            <h4 class="subtitle is-4 m-b-none">Welcome back {{ auth()->user()->name }}</h4>
            <h4 class="subtitle is-4 m-b-none">Since your last login, you've had
                XXXXXX patients give their consent.
            </h4>
        </div>
    </section>

    <section class="section p-t-lg">
        <div class="container">
           @include('app.dashboard.partial.widgets-user')
            <br>
            <div class="columns">
                <div class="column">
                    <h3 class="title">Latest Requests</h3>
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
                               @include('app.consent-request.partial.actions')
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection