@extends('layouts.app')

@section('title',  $service->title)

@section('meta')
<meta name="description" content="{{ $service->meta_description }}">
<meta name="keywords" content="{{ is_array($service->meta_keywords) ? implode(', ', $service->meta_keywords) : $service->meta_keywords }}">
@endsection

@section('content')

<main class="main " dir="rtl">

    <!-- Title -->
    <div class="page-title">
        <div class="container">
            <h1>{{ $service->title }}</h1>
        </div>
    </div>

    <!-- Content -->
    <section class="section">
        <div class="container">

            <div class="row">

                <!-- Image -->
                <div class="col-lg-5 mb-4">

                    <img src="{{ asset('uploads/' . $service->image) }}"
                         class="img-fluid rounded"
                         alt="{{ $service->title }}">

                </div>

                <!-- Details -->
                <div class="col-lg-7">

                    <h3>{{ $service->short_description }}</h3>

                    <hr>

                    <div class="content">
                        {!! $service->description !!}
                    </div>

                    <hr>

                    <p><strong>SEO Description:</strong></p>
                    <p>{{ $service->meta_description }}</p>

                </div>

            </div>

        </div>
    </section>

</main>

@endsection