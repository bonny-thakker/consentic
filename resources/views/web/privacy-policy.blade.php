@extends('layouts.web')

@section('title', 'Privacy Policy')

@section('styles')
@include('web.partial.styles')
@endsection

@section('scripts')
    @include('web.partial.scripts')
@endsection

@section('content')

    <main class="app-content">

       @include('web.partial.privacy')

    </main>

@endsection