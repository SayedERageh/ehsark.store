@php

    
$currentPrice = (float) $product->current_price;

$productImage = null;

if (is_array($product->images) && count($product->images)) {

    $firstImage = $product->images[0];

    $productImage = str_starts_with($firstImage, 'http')
        ? $firstImage
        : asset('uploads/' . $firstImage);
}
    

@endphp

<div
    class="product-card whatsapp-product-card product-clickable"
    data-product-url="{{ route('shop.show', $product->id) }}"
    role="link"
    tabindex="0"
    aria-label="عرض تفاصيل {{ $product->name }}"
>

    
{{-- =====================================================
     صورة المنتج
====================================================== --}}

<div class="product-image">

    @if($productImage)

        <img
            src="{{ $productImage }}"
            alt="{{ $product->name }}"
            loading="lazy"
        >

    @else

        <div class="no-product-image">

            <i class="bi bi-image"></i>

        </div>

    @endif


    {{-- =================================================
         زر العين
    ================================================== --}}

    <a
        href="{{ route('shop.show', $product->id) }}"
        class="product-view-btn"
        title="عرض المنتج"
        aria-label="عرض تفاصيل {{ $product->name }}"
    >

        <i class="bi bi-eye"></i>

    </a>

</div>



{{-- =====================================================
     بيانات المنتج
====================================================== --}}

<div class="product-info">

    <h5 class="product-title">

        {{ $product->name }}

    </h5>


    @if($product->description)

        <p class="product-description">

            {{ Str::limit($product->description, 70) }}

        </p>

    @endif



    {{-- =================================================
         السعر
    ================================================== --}}

    <div class="product-price-area">

        @if($product->sale_price)

            <span class="old-price">

                {{ number_format($product->price, 2) }}

                جنيه

            </span>

        @endif


        <span class="current-price">

            {{ number_format($currentPrice, 2) }}

            <small>
                جنيه
            </small>

        </span>

    </div>



    {{-- =================================================
         زر الإضافة للسلة
    ================================================== --}}

    @if($product->is_available)

        <button
            type="button"
            class="btn-add-whatsapp"

            data-product-id="{{ $product->id }}"
            data-product-name="{{ $product->name }}"
            data-product-price="{{ $currentPrice }}"
            data-product-stock="{{ $product->quantity }}"
        >

            <i class="bi bi-cart-plus"></i>

            أضف للطلب

        </button>

    @else

        <button
            type="button"
            class="btn-product-unavailable"
            disabled
        >

            <i class="bi bi-x-circle"></i>

            غير متوفر

        </button>

    @endif

</div>
    

</div>

<style>

/* =========================================================
   PRODUCT CARD
========================================================= */

.product-clickable {

    cursor: pointer;

    user-select: none;

}


.whatsapp-product-card {

    background: #fff;

    border: 1px solid #edf0f5;

    border-radius: 20px;

    overflow: hidden;

    height: 100%;

    transition:
        transform .3s ease,
        box-shadow .3s ease,
        border-color .3s ease;

    display: flex;

    flex-direction: column;

}


.whatsapp-product-card:hover {

    transform: translateY(-5px);

    border-color: #dce5ed;

    box-shadow:
        0 15px 35px rgba(0,0,0,.09);

}


/* =========================================================
   IMAGE
========================================================= */

.whatsapp-product-card .product-image {

    height: 220px;

    background: #f7f9fc;

    display: flex;

    align-items: center;

    justify-content: center;

    overflow: hidden;

    position: relative;

}


.whatsapp-product-card .product-image img {

    width: 100%;

    height: 100%;

    object-fit: contain;

    padding: 15px;

    transition: .3s;

}


.whatsapp-product-card:hover
.product-image img {

    transform: scale(1.05);

}


/* =========================================================
   NO IMAGE
========================================================= */

.no-product-image {

    font-size: 55px;

    color: #cbd2dc;

}


/* =========================================================
   VIEW BUTTON
========================================================= */

.product-view-btn {

    position: absolute;

    top: 12px;

    right: 12px;

    width: 42px;

    height: 42px;

    border-radius: 50%;

    background: rgba(255,255,255,.95);

    color: #0b7fab;

    display: flex;

    align-items: center;

    justify-content: center;

    text-decoration: none;

    font-size: 18px;

    box-shadow:
        0 5px 18px rgba(0,0,0,.13);

    opacity: 0;

    transform: translateY(-8px);

    transition:
        opacity .25s ease,
        transform .25s ease,
        background .25s ease,
        color .25s ease;

    z-index: 10;

}


.whatsapp-product-card:hover
.product-view-btn {

    opacity: 1;

    transform: translateY(0);

}


.product-view-btn:hover {

    background: #0b7fab;

    color: #fff;

    transform: scale(1.08);

}


/* =========================================================
   INFO
========================================================= */

.whatsapp-product-card .product-info {

    padding: 18px;

    display: flex;

    flex-direction: column;

    flex: 1;

}


.product-title {

    color: #142033;

    font-size: 17px;

    font-weight: 800;

    margin-bottom: 8px;

    line-height: 1.5;

}


.product-description {

    color: #7c8798;

    font-size: 13px;

    line-height: 1.7;

    min-height: 42px;

    margin-bottom: 12px;

}


/* =========================================================
   PRICE
========================================================= */

.product-price-area {

    margin-bottom: 14px;

    display: flex;

    align-items: center;

    gap: 8px;

    flex-wrap: wrap;

}


.current-price {

    color: #0b7fab;

    font-size: 20px;

    font-weight: 900;

}


.current-price small {

    font-size: 11px;

    font-weight: 700;

}


.old-price {

    color: #9aa3af;

    font-size: 13px;

    text-decoration: line-through;

}


/* =========================================================
   ADD TO CART
========================================================= */

.btn-add-whatsapp {

    width: 100%;

    border: 0;

    background:
        linear-gradient(
            135deg,
            #128C7E,
            #25D366
        );

    color: #fff;

    border-radius: 11px;

    padding: 11px;

    font-size: 13px;

    font-weight: 900;

    cursor: pointer;

    transition: .3s;

    margin-top: auto;

    position: relative;

    z-index: 20;

}


.btn-add-whatsapp:hover {

    transform: translateY(-2px);

    box-shadow:
        0 8px 20px rgba(37,211,102,.25);

}


/* =========================================================
   UNAVAILABLE
========================================================= */

.btn-product-unavailable {

    width: 100%;

    border: 0;

    background: #e9edf2;

    color: #8993a4;

    border-radius: 11px;

    padding: 11px;

    font-size: 13px;

    font-weight: 800;

    cursor: not-allowed;

    position: relative;

    z-index: 20;

}


/* =========================================================
   MOBILE
========================================================= */

@media(max-width:576px) {

    .whatsapp-product-card .product-image {

        height: 170px;

    }


    .whatsapp-product-card .product-info {

        padding: 13px;

    }


    .product-title {

        font-size: 14px;

    }


    .product-description {

        font-size: 12px;

    }


    .current-price {

        font-size: 17px;

    }


    /* العين تظهر دائمًا */

    .product-view-btn {

        opacity: 1;

        transform: translateY(0);

        width: 38px;

        height: 38px;

        font-size: 16px;

        top: 9px;

        right: 9px;

    }

}

</style>

<script>

/* =========================================================
   فتح تفاصيل المنتج عند الضغط على الكارت
========================================================= */

document.addEventListener('click', function (event) {

    const card = event.target.closest('.product-clickable');

    if (!card) {
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | لو ضغط على زر العين
    |--------------------------------------------------------------------------
    | نخليه يستخدم الرابط الطبيعي بتاعه
    */

    if (event.target.closest('.product-view-btn')) {
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | لو ضغط على زر إضافة للسلة
    |--------------------------------------------------------------------------
    | لا تفتح صفحة المنتج
    */

    if (event.target.closest('.btn-add-whatsapp')) {
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | لو ضغط على زر غير متوفر
    |--------------------------------------------------------------------------
    */

    if (event.target.closest('.btn-product-unavailable')) {
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | فتح صفحة تفاصيل المنتج
    |--------------------------------------------------------------------------
    */

    const url = card.dataset.productUrl;

    if (url) {

        window.location.href = url;

    }

});



/* =========================================================
   دعم الكيبورد
========================================================= */

document.addEventListener('keydown', function (event) {

    if (
        event.key !== 'Enter' &&
        event.key !== ' '
    ) {
        return;
    }


    const card = event.target.closest('.product-clickable');

    if (!card) {
        return;
    }


    /*
    | منع المسافة من عمل Scroll
    */

    event.preventDefault();


    const url = card.dataset.productUrl;

    if (url) {

        window.location.href = url;

    }

});

</script>
