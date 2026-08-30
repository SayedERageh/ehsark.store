@extends('layouts.app')

@section('content')

<style>
    .product-page {
        background: #f7f9fc;
        min-height: 100vh;
    }

    .product-main {
        background: #fff;
        border-radius: 28px;
        padding: 35px;
        box-shadow: 0 10px 35px rgba(0,0,0,.06);
    }

    .product-image-box {
        background: #f5f8fa;
        border-radius: 22px;
        overflow: hidden;
        position: relative;
    }

    .product-main-image {
        width: 100%;
        height: 500px;
        object-fit: contain;
        padding: 20px;
    }

    .product-info {
        padding: 15px 10px;
    }

    .product-category {
        color: #0b7fab;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
    }

    .product-title {
        font-size: 34px;
        font-weight: 800;
        color: #142033;
        line-height: 1.5;
        margin-top: 12px;
    }

    .product-description {
        color: #687386;
        line-height: 2;
        font-size: 16px;
    }

    .product-price {
        font-size: 32px;
        font-weight: 800;
        color: #142033;
    }

    .sale-price {
        color: #dc3545;
    }

    .old-price {
        color: #9aa3b1;
        font-size: 17px;
    }

    .stock-box {
        background: #f1faf4;
        color: #198754;
        border-radius: 12px;
        padding: 12px 16px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-weight: 700;
    }

    .out-stock {
        background: #fff1f1;
        color: #dc3545;
    }

    .add-cart-btn {
        background: #0b7fab;
        border: 0;
        border-radius: 14px;
        padding: 15px 28px;
        font-size: 17px;
        font-weight: 700;
        color: #fff;
        transition: .3s;
    }

    .add-cart-btn:hover {
        background: #08698d;
        transform: translateY(-2px);
    }

    .back-shop {
        color: #0b7fab;
        text-decoration: none;
        font-weight: 700;
    }

    .related-section {
        margin-top: 40px;
    }

    .related-title {
        font-size: 27px;
        font-weight: 800;
        color: #142033;
        margin-bottom: 25px;
    }

    .quantity-box {
        display: flex;
        align-items: center;
        width: 150px;
        border: 1px solid #dee3e9;
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 15px;
    }

    .quantity-box button {
        width: 45px;
        height: 45px;
        border: 0;
        background: #f5f7f9;
        font-size: 20px;
        font-weight: bold;
    }

    .quantity-box input {
        width: 60px;
        height: 45px;
        border: 0;
        text-align: center;
        font-weight: 700;
        outline: none;
    }

    @media (max-width: 768px) {

        .product-main {
            padding: 18px;
            border-radius: 20px;
        }

        .product-main-image {
            height: 320px;
        }

        .product-title {
            font-size: 26px;
        }

        .product-price {
            font-size: 27px;
        }

        .product-info {
            padding: 20px 0 0;
        }

    }
</style>


<div class="product-page py-5">

    <div class="container">

        {{-- Back --}}

        <div class="mb-4">

            <a
                href="{{ route('shop.index') }}"
                class="back-shop">

                <i class="bi bi-arrow-right"></i>

                العودة إلى المتجر

            </a>

        </div>


        {{-- Product --}}

        <div class="product-main">

            <div class="row align-items-center g-5">

                {{-- Image --}}

                <div class="col-lg-6">

                    <div class="product-image-box">

                        @if($product->images && count($product->images))

                            <img
                                src="{{ asset('uploads/' . $product->images[0]) }}"
                                class="product-main-image"
                                alt="{{ $product->name }}">

                        @else

                            <div
                                class="product-main-image d-flex align-items-center justify-content-center">

                                <i class="bi bi-droplet-half text-primary"
                                   style="font-size:100px;">
                                </i>

                            </div>

                        @endif


                        {{-- New --}}

                        @if($product->is_new)

                            <span
                                class="badge bg-success position-absolute top-0 start-0 m-3 p-2">

                                جديد

                            </span>

                        @endif


                        {{-- Featured --}}

                        @if($product->is_featured)

                            <span
                                class="badge bg-warning text-dark position-absolute top-0 end-0 m-3 p-2">

                                مميز

                            </span>

                        @endif

                    </div>

                </div>


                {{-- Information --}}

                <div class="col-lg-6">

                    <div class="product-info">


                        {{-- Category --}}

                        @if($product->category)

                            <a
                                href="{{ route('shop.category', ['id' => $product->category->id]) }}"
                                class="product-category">

                                {{ $product->category->name }}

                            </a>

                        @endif


                        {{-- Name --}}

                        <h1 class="product-title">

                            {{ $product->name }}

                        </h1>


                        <hr>


                        {{-- Price --}}

                        <div class="mb-4">

                            @if($product->sale_price)

                                <div class="product-price sale-price">

                                    {{ number_format($product->sale_price, 2) }}

                                    ج.م

                                </div>

                                <div class="old-price">

                                    <del>

                                        {{ number_format($product->price, 2) }}

                                        ج.م

                                    </del>

                                </div>

                            @else

                                <div class="product-price">

                                    {{ number_format($product->price, 2) }}

                                    ج.م

                                </div>

                            @endif

                        </div>


                        {{-- Stock --}}

                        @if($product->quantity > 0)

                            <div class="stock-box mb-4">

                                <i class="bi bi-check-circle-fill"></i>

                                متوفر في المخزون

                                @if($product->quantity <= 10)

                                    <span class="text-muted">

                                        (متبقي {{ $product->quantity }} فقط)

                                    </span>

                                @endif

                            </div>

                        @else

                            <div class="stock-box out-stock mb-4">

                                <i class="bi bi-x-circle-fill"></i>

                                غير متوفر حالياً

                            </div>

                        @endif


                        {{-- Description --}}

                        @if($product->description)

                            <div class="product-description mb-4">

                                {{ $product->description }}

                            </div>

                        @endif


                       @if($product->quantity > 0)

   
<button
    type="button"
    class="add-cart-btn btn-add-whatsapp"

    data-product-id="{{ $product->id }}"
    data-product-name="{{ $product->name }}"
    data-product-price="{{ $product->current_price }}"
    data-product-stock="{{ $product->quantity }}"
>

    <i class="bi bi-cart-plus ms-2"></i>

    أضف إلى السلة

</button>
   

@else

   
<button
    type="button"
    class="add-cart-btn"
    disabled
>

    <i class="bi bi-x-circle ms-2"></i>

    غير متوفر

</button>
   

@endif


                    </div>

                </div>

            </div>

        </div>


        {{-- Related Products --}}

        @if($relatedProducts->count())

            <div class="related-section">

                <h2 class="related-title">

                    منتجات قد تعجبك

                </h2>


                <div class="row g-4">

                    @foreach($relatedProducts as $product)

                        <div class="col-6 col-md-4 col-lg-3">

                            @include('shop.partials.product-card')

                        </div>

                    @endforeach

                </div>

            </div>

        @endif

    </div>

</div>

@endsection