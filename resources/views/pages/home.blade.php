@extends('layouts.app')

@section('title', ' شرق استور')

@section('content')

  <main class="main">
@include('components.carouselHero')
@include('components.features')
   @include('sections.products-sections')
@include('components.latest-products')

@include('components.call')
@include('components.onfocus')
   @include('components.Featured')

@include('components.services')

<!-- Testimonials Section -->
@include('components.testimonials')
<!-- /Testimonials Section -->
@include('sections.brands')
<!-- FAQ Section -->
@include('components.faq')

        <!-- Clients Section -->
@include('components.clients')
    


  </main>

@endsection