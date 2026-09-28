@extends('layouts.app')

@section('title', 'المتجر | شارك استور')

@section('content')

<style>
    .shop-page {
        background: #f7f9fc;
        min-height: 100vh;
    }

    /* =========================
       HERO
    ========================= */

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
        width: 350px;
        height: 350px;
        background: rgba(255,255,255,.05);
        border-radius: 50%;
        top: -170px;
        left: -100px;
    }

    .shop-hero::after {
        content: "";
        position: absolute;
        width: 250px;
        height: 250px;
        background: rgba(255,255,255,.04);
        border-radius: 50%;
        bottom: -150px;
        right: -80px;
    }

    .shop-hero-content {
        position: relative;
        z-index: 2;
    }

    .shop-hero h1 {
        font-size: 42px;
        font-weight: 800;
        line-height: 1.45;
        margin-bottom: 15px;
    }

    .shop-hero p {
        color: rgba(255,255,255,.82);
        font-size: 17px;
        line-height: 1.9;
        max-width: 650px;
    }

    .shop-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: linear-gradient(135deg, #ffb300, #ff7a00);
        color: #fff;
        padding: 8px 16px;
        border-radius: 50px;
        font-size: 13px;
        font-weight: 800;
    }

    .shop-search {
        background: #fff;
        padding: 8px;
        border-radius: 16px;
        display: flex;
        margin-top: 28px;
        max-width: 650px;
        box-shadow: 0 15px 40px rgba(0,0,0,.18);
    }

    .shop-search input {
        border: 0;
        box-shadow: none !important;
        padding: 14px;
        font-size: 15px;
    }

    .shop-search button {
        border: 0;
        background: #0b7fab;
        color: #fff;
        border-radius: 12px;
        padding: 0 28px;
        font-weight: 800;
        transition: .3s;
    }

    .shop-search button:hover {
        background: #096c91;
    }

    .shop-hero-icon {
        font-size: 150px;
        position: relative;
        z-index: 2;
        filter: drop-shadow(0 15px 20px rgba(0,0,0,.2));
    }

    /* =========================
       SECTION TITLES
    ========================= */

    .shop-section {
        margin-top: 60px;
    }

    .section-heading {
        margin-bottom: 28px;
    }

    .section-heading h2 {
        font-weight: 800;
        color: #142033;
        margin-bottom: 8px;
    }

    .section-heading p {
        color: #7c8798;
        margin: 0;
    }

    .section-heading-inline {
        display: flex;
        align-items: end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 28px;
    }

    .section-heading-inline h2 {
        font-weight: 800;
        color: #142033;
        margin: 0;
    }

    .section-heading-inline p {
        color: #7c8798;
        margin: 7px 0 0;
    }

    .view-all {
        text-decoration: none;
        color: #0b7fab;
        font-weight: 800;
        white-space: nowrap;
    }

    .view-all:hover {
        color: #061b35;
    }

    /* =========================
       CATEGORIES
    ========================= */

    .category-card {
        background: #fff;
        border-radius: 22px;
        padding: 28px 18px;
        text-align: center;
        height: 100%;
        border: 1px solid #edf0f5;
        transition: .3s ease;
        text-decoration: none;
        color: #142033;
        display: block;
        position: relative;
        overflow: hidden;
    }

    .category-card::after {
        content: "";
        position: absolute;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: #f1f8fb;
        right: -40px;
        bottom: -45px;
        transition: .3s;
    }

    .category-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 18px 45px rgba(0,0,0,.10);
        color: #0b7fab;
        border-color: rgba(11,127,171,.15);
    }

    .category-card:hover::after {
        transform: scale(1.5);
    }

    .category-image {
        width: 100px;
        height: 100px;
        margin: auto;
        border-radius: 50%;
        background: #f1f8fb;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
        z-index: 2;
    }

    .category-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .category-icon {
        font-size: 40px;
        color: #0b7fab;
    }

    .category-card h5 {
        margin-top: 18px;
        font-weight: 800;
        margin-bottom: 6px;
        position: relative;
        z-index: 2;
    }

    .category-card span {
        color: #8993a4;
        font-size: 13px;
        position: relative;
        z-index: 2;
    }

    /* =========================
       PRODUCTS SECTION
    ========================= */

    .products-section {
        background: #fff;
        border-radius: 25px;
        padding: 30px;
        border: 1px solid #edf0f5;
    }

    /* =========================
       EMPTY
    ========================= */

    .empty-shop {
        background: #fff;
        border-radius: 20px;
        padding: 45px 25px;
        text-align: center;
        border: 1px solid #edf0f5;
        color: #7c8798;
    }

    .empty-shop i {
        font-size: 50px;
        color: #0b7fab;
        margin-bottom: 15px;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 991px) {

        .shop-hero {
            padding: 40px 30px;
        }

        .shop-hero h1 {
            font-size: 36px;
        }
    }

    @media (max-width: 768px) {

        .shop-page {
            padding-top: 20px;
        }

        .shop-hero {
            padding: 35px 22px;
            border-radius: 22px;
        }

        .shop-hero h1 {
            font-size: 29px;
        }

        .shop-hero p {
            font-size: 15px;
        }

        .shop-search {
            display: block;
            background: transparent;
            box-shadow: none;
            padding: 0;
        }

        .shop-search input {
            width: 100%;
            margin-bottom: 10px;
            border-radius: 12px;
            padding: 14px;
        }

        .shop-search button {
            width: 100%;
            padding: 14px;
        }

        .shop-section {
            margin-top: 40px;
        }

        .section-heading-inline {
            align-items: start;
            flex-direction: column;
        }

        .products-section {
            padding: 18px;
            border-radius: 20px;
        }
    }
</style>


<div class="shop-page py-5">

    <div class="container">

        {{-- =====================================================
             HERO
        ====================================================== --}}

        <div class="shop-hero mb-5">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <div class="shop-hero-content">

                        <span class="shop-badge">
                      <i class="bi bi-shop"></i>
شارك استور
</span>

<h1 class="mt-3">
    كل ما تحتاجه من
    <br>
    إكسسوارات الموبايلات بجودة عالية
</h1>

                        <p>
                            اكتشف تشكيلة مميزة من الأدوات الصحية،
                            الخلاطات، الدش، مستلزمات السباكة والوصلات
                            بجودة عالية وأسعار تنافسية.
                        </p>

                        <form
                            action="{{ route('shop.index') }}"
                            method="GET"
                            class="shop-search">

                            <input
                                type="search"
                                name="search"
                                class="form-control"
                                placeholder="ابحث عن خلاط، دش، حوض، وصلة..."
                                value="{{ request('search') }}">

                            <button type="submit">
                                <i class="bi bi-search ms-1"></i>
                                بحث
                            </button>

                        </form>

                    </div>

                </div>

                <div class="col-lg-4 d-none d-lg-flex justify-content-center">

                    <div class="shop-hero-icon">
                        🚿
                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             CATEGORIES
        ====================================================== --}}

        <section class="shop-section">

            <div class="section-heading text-center">

                <h2>
                    تصفح أقسام شارك استور
                </h2>

                <p>
                    اختر القسم الذي تبحث عنه للوصول إلى المنتجات بسهولة
                </p>

            </div>


            <div class="row g-4">

                @forelse($categories as $category)

                    <div class="col-6 col-md-4 col-lg-3">

                <a
 href="{{ route('shop.category', ['id' => $category->id]) }}"
    class="category-card">

                            <div class="category-image">

                                @if($category->image)

                                    <img
                                        src="{{ asset('uploads/' . $category->image) }}"
                                        alt="{{ $category->name }}"
                                        loading="lazy">

                                @else

                                    <i class="bi bi-droplet-half category-icon"></i>

                                @endif

                            </div>

                            <h5>
                                {{ $category->name }}
                            </h5>

                            <span>
                                {{ $category->products_count }} منتج
                            </span>

                        </a>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="empty-shop">

                            <i class="bi bi-grid"></i>

                            <h5>
                                لا توجد أقسام متاحة حالياً
                            </h5>

                            <p class="mb-0">
                                سيتم إضافة الأقسام قريباً.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

        </section>


        {{-- =====================================================
             FEATURED PRODUCTS
        ====================================================== --}}

        @if($featuredProducts->count())

            <section class="shop-section">

                <div class="section-heading-inline">

                    <div>

                        <h2>
                            منتجات مميزة
                        </h2>

                        <p>
                            مجموعة مختارة من أفضل منتجات شارك استور
                        </p>

                    </div>

                    <a
                        href="{{ route('shop.index') }}"
                        class="view-all">

                        عرض جميع المنتجات
                        <i class="bi bi-arrow-left"></i>

                    </a>

                </div>


                <div class="products-section">

                    <div class="row g-4">

                        @foreach($featuredProducts as $product)

                            <div class="col-6 col-md-6 col-lg-3">

                                @include('shop.partials.product-card')

                            </div>

                        @endforeach

                    </div>

                </div>

            </section>

        @endif


        {{-- =====================================================
             LATEST PRODUCTS
        ====================================================== --}}

        @if($latestProducts->count())

            <section class="shop-section">

                <div class="section-heading-inline">

                    <div>

                        <h2>
                            أحدث المنتجات
                        </h2>

                        <p>
                            أحدث المنتجات المضافة إلى متجرنا
                        </p>

                    </div>

                    <a
                        href="{{ route('shop.index') }}"
                        class="view-all">

                        اكتشف المنتجات
                        <i class="bi bi-arrow-left"></i>

                    </a>

                </div>


                <div class="products-section">

                    <div class="row g-4">

                        @foreach($latestProducts as $product)

                            <div class="col-6 col-md-6 col-lg-3">

                                @include('shop.partials.product-card')

                            </div>

                        @endforeach

                    </div>

                </div>

            </section>

        @endif

    </div>

</div>

@endsection
   
