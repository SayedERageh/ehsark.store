
@extends('layouts.app')

@section('title', $category->name . ' | شارك استور')

@section('content')

<style>
    .category-page {
        background: #f7f9fc;
        min-height: 100vh;
    }

    /* =========================
       CATEGORY HERO
    ========================= */

    .category-hero {
        background: linear-gradient(135deg, #061b35, #0b4f71);
        border-radius: 28px;
        padding: 35px;
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .category-hero::before {
        content: "";
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: rgba(255,255,255,.05);
        top: -150px;
        left: -80px;
    }

    .category-hero-content {
        position: relative;
        z-index: 2;
    }

    .breadcrumb-shop {
        margin-bottom: 20px;
    }

    .breadcrumb-shop a {
        color: rgba(255,255,255,.75);
        text-decoration: none;
    }

    .breadcrumb-shop span {
        color: rgba(255,255,255,.45);
        margin: 0 8px;
    }

    .category-hero h1 {
        font-size: 38px;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .category-hero p {
        color: rgba(255,255,255,.8);
        line-height: 1.9;
        margin: 0;
        max-width: 700px;
    }

    .category-hero-image {
        width: 170px;
        height: 170px;
        border-radius: 50%;
        overflow: hidden;
        background: rgba(255,255,255,.12);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        position: relative;
        z-index: 2;
    }

    .category-hero-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .category-hero-icon {
        font-size: 65px;
    }

    /* =========================
       PRODUCTS AREA
    ========================= */

    .category-products {
        background: #fff;
        border-radius: 25px;
        padding: 30px;
        border: 1px solid #edf0f5;
    }

    .products-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 30px;
        gap: 15px;
    }

    .products-header h2 {
        font-size: 25px;
        font-weight: 800;
        color: #142033;
        margin: 0;
    }

    .products-count {
        color: #8993a4;
        font-size: 14px;
    }

    /* =========================
       EMPTY
    ========================= */

    .empty-products {
        text-align: center;
        padding: 60px 20px;
        color: #7c8798;
    }

    .empty-products i {
        font-size: 60px;
        color: #0b7fab;
        display: block;
        margin-bottom: 20px;
    }

    .back-shop {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-top: 15px;
        background: #0b7fab;
        color: #fff;
        text-decoration: none;
        padding: 11px 20px;
        border-radius: 12px;
        font-weight: 700;
    }

    .back-shop:hover {
        background: #061b35;
        color: #fff;
    }

    /* =========================
       PAGINATION
    ========================= */

    .category-pagination {
        margin-top: 35px;
        display: flex;
        justify-content: center;
    }

    @media (max-width: 768px) {

        .category-hero {
            padding: 25px 20px;
            border-radius: 20px;
        }

        .category-hero h1 {
            font-size: 29px;
        }

        .category-hero-image {
            width: 120px;
            height: 120px;
            margin-top: 25px;
        }

        .category-products {
            padding: 18px;
            border-radius: 20px;
        }

        .products-header {
            align-items: start;
            flex-direction: column;
        }
    }
</style>


<div class="category-page py-5">

    <div class="container"  dir="rtl">

        {{-- =====================================================
             CATEGORY HERO
        ====================================================== --}}

        <div class="category-hero mb-5">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <div class="category-hero-content">

                        <div class="breadcrumb-shop">

                            <a href="{{ route('shop.index') }}">
                                المتجر
                            </a>

                            <span>
                                /
                            </span>

                            <span>
                                {{ $category->name }}
                            </span>

                        </div>


                        <h1>
                            {{ $category->name }}
                        </h1>


                        @if($category->description)

                            <p>
                                {{ $category->description }}
                            </p>

                        @else

                            <p>
                                اكتشف جميع المنتجات المتوفرة في قسم
                                {{ $category->name }} من متجر شارك استور.
                            </p>

                        @endif

                    </div>

                </div>


                <div class="col-lg-4">

                    <div class="category-hero-image">

                        @if($category->image)

                            <img
                                src="{{ asset('uploads/' . $category->image) }}"
                                alt="{{ $category->name }}">

                        @else

                            <i class="bi bi-droplet-half category-hero-icon"></i>

                        @endif

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             PRODUCTS
        ====================================================== --}}

        <div class="category-products" dir="rtl">

            <div class="products-header">

                <div>

                    <h2>
                        منتجات {{ $category->name }}
                    </h2>

                </div>

                <div class="products-count">

                    {{ $products->total() }} منتج

                </div>

            </div>


            <div class="row g-4">

                @forelse($products as $product)

                    <div class="col-6 col-md-6 col-lg-3">

                        @include('shop.partials.product-card')

                    </div>

                @empty

                    <div class="col-12">

                        <div class="empty-products">

                            <i class="bi bi-box-seam"></i>

                            <h4>
                                لا توجد منتجات في هذا القسم حالياً
                            </h4>

                            <p>
                                سيتم إضافة منتجات جديدة لهذا القسم قريباً.
                            </p>

                            <a
                                href="{{ route('shop.index') }}"
                                class="back-shop">

                                <i class="bi bi-arrow-right"></i>

                                العودة للمتجر

                            </a>

                        </div>

                    </div>

                @endforelse

            </div>


            @if($products->hasPages())

                <div class="category-pagination">

                    {{ $products->links() }}

                </div>

            @endif

        </div>

    </div>

</div>

@endsection

