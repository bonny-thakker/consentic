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
            <h4 class="subtitle is-4 m-b-none">Welcome back Andrew Drake</h4>
            <h4 class="subtitle is-4 m-b-none">Since your last login, you've had
                0 patients give their consent.
            </h4>
        </div>
    </section>

@endsection