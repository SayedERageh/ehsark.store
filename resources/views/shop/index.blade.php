@extends('layouts.app')

@section('content')

<style>
    .shop-page {
        background: #f7f9fc;
        min-height: 100vh;
    }

    .shop-hero {
        background: linear-gradient(135deg, #061b35, #0b4f71);
        border-radius: 30px;
        padding: 55px 45px;
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .shop-hero::before {
        content: "";
        position: absolute;
        width: 300px;
        height: 300px;
        background: rgba(255,255,255,.06);
        border-radius: 50%;
        top: -120px;
        left: -80px;
    }

    .shop-hero h1 {
        font-size: 42px;
        font-weight: 800;
        line-height: 1.4;
    }

    .shop-hero p {
        color: rgba(255,255,255,.8);
        font-size: 17px;
        line-height: 1.9;
    }

    .shop-search {
        background: #fff;
        padding: 8px;
        border-radius: 16px;
        display: flex;
        margin-top: 25px;
        box-shadow: 0 15px 40px rgba(0,0,0,.15);
    }

    .shop-search input {
        border: 0;
        box-shadow: none !important;
        padding: 14px;
    }

    .shop-search button {
        border: 0;
        background: #0b7fab;
        color: #fff;
        border-radius: 12px;
        padding: 0 25px;
        font-weight: 700;
    }

    .category-card {
        background: #fff;
        border-radius: 20px;
        padding: 25px 18px;
        text-align: center;
        height: 100%;
        border: 1px solid #edf0f5;
        transition: .3s;
        text-decoration: none;
        color: #142033;
        display: block;
    }

    .category-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 18px 45px rgba(0,0,0,.10);
        color: #0b7fab;
    }

    .category-image {
        width: 95px;
        height: 95px;
        margin: auto;
        border-radius: 50%;
        background: #f1f8fb;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .category-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .category-icon {
        font-size: 38px;
        color: #0b7fab;
    }

    .category-card h5 {
        margin-top: 18px;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .category-card span {
        color: #8993a4;
        font-size: 13px;
    }

    .shop-section-title h2 {
        font-weight: 800;
        color: #142033;
    }

    .shop-section-title p {
        color: #7c8798;
    }

    .product-section {
        background: #fff;
        border-radius: 25px;
        padding: 30px;
    }

    .featured-badge {
        background: linear-gradient(135deg, #ffb300, #ff7a00);
        color: #fff;
        padding: 7px 14px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
    }

    .category-title {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 25px;
    }

    .category-title h3 {
        font-weight: 800;
        margin: 0;
    }

    .category-title a {
        text-decoration: none;
        color: #0b7fab;
        font-weight: 700;
    }

    @media (max-width: 768px) {

        .shop-hero {
            padding: 35px 22px;
            border-radius: 20px;
        }

        .shop-hero h1 {
            font-size: 30px;
        }

        .shop-search {
            display: block;
            background: transparent;
            box-shadow: none;
        }

        .shop-search input {
            width: 100%;
            margin-bottom: 10px;
            border-radius: 12px;
        }

        .shop-search button {
            width: 100%;
            padding: 13px;
        }

        .product-section {
            padding: 18px;
        }
    }
</style>

<div class="shop-page py-5">

    <div class="container">

        <!-- Hero -->
        <div class="shop-hero mb-5">

            <div class="row align-items-center">

                <div class="col-lg-7">

                    <span class="featured-badge">
                        أوتاد مصر
                    </span>

                    <h1 class="mt-3">
                        كل ما تحتاجه من
                        <br>
                        الأدوات الصحية والسباكة
                    </h1>

                    <p>
                        اكتشف تشكيلة مميزة من الأدوات الصحية،
                        الخلاطات، الدش، مستلزمات السباكة والوصلات
                        بجودة عالية وأسعار تنافسية.
                    </p>

                    <form action="{{ route('shop.index') }}" method="GET" class="shop-search">

                        <input
                            type="search"
                            name="search"
                            class="form-control"
                            value="{{ request('search') }}"
                            placeholder="ابحث عن خلاط، دش، حوض، وصلة...">

                        <button type="submit">
                            <i class="bi bi-search ms-1"></i>
                            بحث
                        </button>

                    </form>

                </div>

                <div class="col-lg-5 d-none d-lg-flex justify-content-center">

                    <div style="font-size:150px;">
                        🚿
                    </div>

                </div>

            </div>

        </div>


        <!-- Categories -->
        <div class="shop-section-title text-center mb-4">

            <h2>
                تصفح أقسام أوتاد مصر
            </h2>

            <p>
                اختر القسم الذي تبحث عنه للوصول إلى المنتجات بسهولة
            </p>

        </div>


        <div class="row g-4 mb-5">

            @forelse($categories as $category)

                <div class="col-6 col-md-4 col-lg-3">

                    <a href="#category-{{ $category->id }}" class="category-card">

                        <div class="category-image">

                            @if($category->image)

                                <img
                                    src="{{ asset('uploads/'.$category->image) }}"
                                    alt="{{ $category->name }}">

                            @else

                                <i class="bi bi-droplet-half category-icon"></i>

                            @endif

                        </div>

                        <h5>
                            {{ $category->name }}
                        </h5>

                        <span>
                            {{ $category->products->count() }} منتج
                        </span>

                    </a>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-info text-center">
                        لا توجد أقسام متاحة حالياً
                    </div>

                </div>

            @endforelse

        </div>


        <!-- Featured Products -->

        @if($featuredProducts->count())

            <div class="product-section mb-5">

                <div class="category-title">

                    <div>

                        <span class="featured-badge">
                            مختاراتنا
                        </span>

                        <h3 class="mt-2">
                            منتجات مميزة
                        </h3>

                    </div>

                    <a href="#all-products">
                        جميع المنتجات
                    </a>

                </div>

                <div class="row g-4">

                    @foreach($featuredProducts as $product)

                        <div class="col-md-6 col-lg-3">

                            @include('shop.partials.product-card')

                        </div>

                    @endforeach

                </div>

            </div>

        @endif


        <!-- Products By Categories -->

        @foreach($categories as $category)

            @if($category->products->count())

                <div class="product-section mb-5" id="category-{{ $category->id }}">

                    <div class="category-title">

                        <div>

                            <span class="text-muted small">
                                قسم المنتجات
                            </span>

                            <h3 class="mt-1">
                                {{ $category->name }}
                            </h3>

                        </div>

                    </div>

                    <div class="row g-4">

                        @foreach($category->products->take(4) as $product)

                            <div class="col-md-6 col-lg-3">

                                @include('shop.partials.product-card')

                            </div>

                        @endforeach

                    </div>

                </div>

            @endif

        @endforeach


        <!-- All Products -->

        <div class="product-section" id="all-products">

            <div class="category-title">

                <div>

                    <span class="text-muted small">
                        متجر أوتاد مصر
                    </span>

                    <h3 class="mt-1">
                        جميع المنتجات
                    </h3>

                </div>

                <span class="text-muted">
                    {{ $products->total() }} منتج
                </span>

            </div>


            <div class="row g-4">

                @forelse($products as $product)

                    <div class="col-md-6 col-lg-3">

                        @include('shop.partials.product-card')

                    </div>

                @empty

                    <div class="col-12">

                        <div class="alert alert-warning text-center">

                            لا توجد منتجات متاحة حالياً

                        </div>

                    </div>

                @endforelse

            </div>


            <div class="mt-5 d-flex justify-content-center">

                {{ $products->links() }}

            </div>

        </div>

    </div>

</div>

@endsection