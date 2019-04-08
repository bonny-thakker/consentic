@extends('layouts.public')

@section('title', 'Consent Request')

@section('styles')

    @include('app.partial.styles')

@endsection

@section('scripts')

@endsection

@section('content')

   <section class="section section-public">
       <div class="container">
           <div class="columns">
               <div class="column">
                   <div class="tab-content" style="margin-top: 50px">
                       <h1 class="title">This consent request has been completed previously.</h1>
                   </div>
               </div>
           </div>
       </div>
   </section>

@endsection