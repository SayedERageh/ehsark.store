@extends('layouts.app')

@section('title', 'عربيتي | شارك استور')

@section('content')

<div class="container py-5 cart-container" dir="rtl">

    {{-- =========================
        HEADER
    ========================== --}}
    <div class="cart-header mb-4">

        <div>
            <h2 class="fw-bold mb-2">
                <i class="bi bi-cart3 ms-2"></i>
                عربيتي
            </h2>

            <p class="text-muted mb-0">
                راجع منتجاتك وأكمل بيانات الطلب بسهولة.
            </p>
        </div>

    </div>


    {{-- =========================
        STEPS
    ========================== --}}
    <div class="checkout-steps mb-4">

        <div class="checkout-step active" id="step-indicator-1">

            <div class="step-number">
                1
            </div>

            <div>
                <strong>المنتجات</strong>
                <small>مراجعة الطلب</small>
            </div>

        </div>


        <div class="step-line"></div>


        <div class="checkout-step" id="step-indicator-2">

            <div class="step-number">
                2
            </div>

            <div>
                <strong>بياناتك</strong>
                <small>إتمام الطلب</small>
            </div>

        </div>

    </div>


    {{-- =========================
        STEP 1
    ========================== --}}
    <div id="cart-step-1">

        <div id="cart-content"></div>

    </div>


    {{-- =========================
        STEP 2
    ========================== --}}
    <div id="cart-step-2" style="display:none;">

        <div class="row g-4">

            {{-- DATA FORM --}}
            <div class="col-lg-8">

                <div class="checkout-card">

                    <div class="checkout-card-header">

                        <div class="checkout-icon">
                            <i class="bi bi-person-vcard"></i>
                        </div>

                        <div>
                            <h4>بيانات العميل</h4>

                            <p>
                                أدخل بياناتك لإتمام الطلب
                            </p>
                        </div>

                    </div>


                    <form id="checkout-form">

                        <div class="row g-3">

                            <div class="col-md-6">

                                <label class="form-label">
                                    الاسم بالكامل
                                </label>

                                <div class="input-wrapper">

                                    <i class="bi bi-person"></i>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="customer_name"
                                        placeholder="اكتب اسمك بالكامل"
                                        required>

                                </div>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    رقم الهاتف
                                </label>

                                <div class="input-wrapper">

                                    <i class="bi bi-telephone"></i>

                                    <input
                                        type="tel"
                                        class="form-control"
                                        id="customer_phone"
                                        placeholder="01xxxxxxxxx"
                                        required>

                                </div>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    المحافظة
                                </label>

                                <div class="input-wrapper">

                                    <i class="bi bi-geo-alt"></i>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="customer_governorate"
                                        placeholder="مثال: القاهرة">

                                </div>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    المدينة / المنطقة
                                </label>

                                <div class="input-wrapper">

                                    <i class="bi bi-pin-map"></i>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="customer_city"
                                        placeholder="اكتب المنطقة">

                                </div>

                            </div>


                            <div class="col-12">

                                <label class="form-label">
                                    العنوان بالتفصيل
                                </label>

                                <div class="input-wrapper textarea-wrapper">

                                    <i class="bi bi-house"></i>

                                    <textarea
                                        class="form-control"
                                        id="customer_address"
                                        rows="4"
                                        placeholder="اكتب العنوان بالتفصيل"></textarea>

                                </div>

                            </div>


                            <div class="col-12">

                                <label class="form-label">
                                    ملاحظات الطلب
                                    <span class="text-muted">
                                        (اختياري)
                                    </span>
                                </label>

                                <textarea
                                    class="form-control custom-textarea"
                                    id="customer_notes"
                                    rows="3"
                                    placeholder="أي ملاحظات تريد إضافتها للطلب..."></textarea>

                            </div>

                        </div>


                        <div class="checkout-actions mt-4">

                            <button
                                type="button"
                                class="back-btn"
                                onclick="showCartStep(1)">

                                <i class="bi bi-arrow-right"></i>

                                العودة للمنتجات

                            </button>


                            <button
                                type="submit"
                                class="whatsapp-submit-btn">

                                <i class="bi bi-whatsapp"></i>

                                إتمام الطلب عبر واتساب

                            </button>

                        </div>

                    </form>

                </div>

            </div>


            {{-- SUMMARY --}}
            <div class="col-lg-4">

                <div class="checkout-summary">

                    <div class="summary-header">

                        <div class="summary-icon">

                            <i class="bi bi-receipt"></i>

                        </div>

                        <div>

                            <h5>
                                ملخص الطلب
                            </h5>

                            <span>
                                مراجعة نهائية
                            </span>

                        </div>

                    </div>


                    <div id="checkout-summary-content"></div>


                    <div class="secure-note">

                        <i class="bi bi-shield-check"></i>

                        <span>
                            بياناتك تستخدم فقط لتجهيز وإرسال طلبك.
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<style>

/* =========================================
   GENERAL
========================================= */

.cart-container{
    max-width:1200px;
}

.cart-header{
    display:flex;
    align-items:center;
    justify-content:space-between;
}


/* =========================================
   STEPS
========================================= */

.checkout-steps{
    background:#fff;
    border:1px solid #edf0f5;
    border-radius:20px;
    padding:18px 25px;

    display:flex;
    align-items:center;
    justify-content:center;

    box-shadow:0 8px 30px rgba(15,23,42,.05);
}

.checkout-step{
    display:flex;
    align-items:center;
    gap:12px;

    color:#9aa3af;
    transition:.3s;
}

.checkout-step.active{
    color:#0d6efd;
}

.step-number{
    width:45px;
    height:45px;

    border-radius:50%;

    background:#f1f5f9;

    display:flex;
    align-items:center;
    justify-content:center;

    font-weight:800;
    font-size:16px;

    transition:.3s;
}

.checkout-step.active .step-number{
    background:#0d6efd;
    color:#fff;

    box-shadow:0 8px 20px rgba(13,110,253,.25);
}

.checkout-step strong{
    display:block;
    font-size:14px;
}

.checkout-step small{
    display:block;
    font-size:11px;
    margin-top:2px;
    color:#9aa3af;
}

.step-line{
    width:120px;
    height:2px;
    background:#e8edf3;
    margin:0 20px;
}


/* =========================================
   CART ITEMS
========================================= */

.cart-page-item{
    display:flex;
    align-items:center;
    gap:20px;

    padding:20px;

    border-bottom:1px solid #edf0f5;

    transition:.25s;
}

.cart-page-item:hover{
    background:#fafcff;
}

.cart-page-item:last-child{
    border-bottom:0;
}


.cart-page-image{
    width:115px;
    height:115px;
    min-width:115px;

    background:#fff;

    border:1px solid #edf0f5;

    border-radius:18px;

    overflow:hidden;

    display:flex;
    align-items:center;
    justify-content:center;
}

.cart-page-image img{
    width:100%;
    height:100%;

    object-fit:contain;

    padding:8px;

    transition:.3s;
}

.cart-page-item:hover .cart-page-image img{
    transform:scale(1.05);
}

.no-cart-image{
    width:100%;
    height:100%;

    border-radius:18px;

    background:#f5f7fa;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:35px;

    color:#b7c0cc;
}


.cart-page-info{
    flex:1;
}

.cart-page-info h5{
    font-size:16px;
}

.cart-page-total{
    text-align:left;
    min-width:130px;
}

.cart-page-total strong{
    color:#0d6efd;
    font-size:18px;
}


/* =========================================
   QUANTITY
========================================= */

.quantity-btn{
    width:38px;
    height:38px;

    border:1px solid #e0e5eb;

    background:#fff;

    border-radius:10px;

    display:flex;
    align-items:center;
    justify-content:center;

    transition:.2s;
}

.quantity-btn:hover{
    background:#0d6efd;
    color:#fff;
    border-color:#0d6efd;

    transform:translateY(-2px);
}

.quantity-number{
    min-width:35px;

    text-align:center;

    font-weight:800;

    font-size:17px;
}


/* =========================================
   SUMMARY
========================================= */

.sticky-summary{
    position:sticky;
    top:100px;
}

.summary-row{
    display:flex;
    align-items:center;
    justify-content:space-between;
}

.total-row{
    font-size:20px;
}

.total-row strong{
    color:#0d6efd;
}


/* =========================================
   CHECKOUT CARD
========================================= */

.checkout-card,
.checkout-summary{

    background:#fff;

    border:1px solid #edf0f5;

    border-radius:22px;

    box-shadow:0 10px 35px rgba(15,23,42,.06);
}


.checkout-card{
    padding:30px;
}

.checkout-card-header{

    display:flex;
    align-items:center;

    gap:15px;

    margin-bottom:30px;

    padding-bottom:20px;

    border-bottom:1px solid #edf0f5;
}

.checkout-icon,
.summary-icon{

    width:52px;
    height:52px;

    border-radius:15px;

    background:#eff6ff;

    color:#0d6efd;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:23px;
}

.checkout-card-header h4{
    margin:0;

    font-weight:800;
}

.checkout-card-header p{
    margin:5px 0 0;

    color:#8b95a5;

    font-size:13px;
}


/* =========================================
   FORM
========================================= */

.form-label{
    font-weight:700;

    font-size:14px;

    margin-bottom:8px;
}

.input-wrapper{
    position:relative;
}

.input-wrapper > i{
    position:absolute;

    right:15px;
    top:50%;

    transform:translateY(-50%);

    color:#8b95a5;

    z-index:2;
}

.input-wrapper .form-control{
    padding-right:45px;
}

.form-control{

    min-height:48px;

    border:1px solid #e2e7ee;

    border-radius:12px;

    box-shadow:none;

    transition:.2s;
}

.form-control:focus{

    border-color:#0d6efd;

    box-shadow:0 0 0 4px rgba(13,110,253,.08);
}

textarea.form-control{
    resize:none;
}

.textarea-wrapper > i{
    top:22px;
    transform:none;
}

.custom-textarea{
    padding:13px 15px;
}


/* =========================================
   ACTIONS
========================================= */

.checkout-actions{

    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:15px;
}

.back-btn{

    border:1px solid #e0e5eb;

    background:#fff;

    color:#555;

    border-radius:12px;

    padding:13px 20px;

    font-weight:700;

    transition:.2s;
}

.back-btn:hover{

    background:#f5f7fa;

    color:#222;
}

.whatsapp-submit-btn{

    flex:1;

    max-width:330px;

    border:0;

    background:#25D366;

    color:#fff;

    border-radius:12px;

    padding:14px 20px;

    font-weight:800;

    font-size:15px;

    transition:.25s;

    box-shadow:0 8px 20px rgba(37,211,102,.18);
}

.whatsapp-submit-btn:hover{

    background:#1ebe5d;

    transform:translateY(-2px);

    box-shadow:0 12px 25px rgba(37,211,102,.25);
}


/* =========================================
   SUMMARY CHECKOUT
========================================= */

.checkout-summary{

    padding:25px;

    position:sticky;

    top:100px;
}

.summary-header{

    display:flex;

    align-items:center;

    gap:13px;

    padding-bottom:20px;

    border-bottom:1px solid #edf0f5;

    margin-bottom:20px;
}

.summary-header h5{

    margin:0;

    font-weight:800;
}

.summary-header span{

    color:#9aa3af;

    font-size:12px;

    display:block;

    margin-top:3px;
}


.checkout-summary-product{

    display:flex;

    align-items:center;

    gap:12px;

    padding:12px 0;

    border-bottom:1px solid #f0f2f5;
}

.checkout-summary-product:last-of-type{
    border-bottom:0;
}

.checkout-summary-product-image{

    width:58px;
    height:58px;

    min-width:58px;

    border-radius:12px;

    overflow:hidden;

    background:#f6f8fa;

    border:1px solid #edf0f5;
}

.checkout-summary-product-image img{

    width:100%;
    height:100%;

    object-fit:contain;

    padding:4px;
}

.checkout-summary-product-info{

    flex:1;
}

.checkout-summary-product-info strong{

    display:block;

    font-size:13px;
}

.checkout-summary-product-info span{

    color:#8993a2;

    font-size:12px;
}

.checkout-summary-product-price{

    font-weight:800;

    color:#0d6efd;

    font-size:13px;
}

.checkout-total{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-top:18px;

    padding-top:18px;

    border-top:2px dashed #e8edf3;
}

.checkout-total span{

    font-weight:700;

    color:#555;
}

.checkout-total strong{

    color:#0d6efd;

    font-size:20px;
}


.secure-note{

    display:flex;

    gap:10px;

    align-items:flex-start;

    background:#f4f8ff;

    padding:14px;

    border-radius:12px;

    margin-top:20px;

    font-size:12px;

    color:#687386;
}

.secure-note i{

    color:#0d6efd;

    font-size:18px;
}


/* =========================================
   WHATSAPP OLD BUTTON
========================================= */

.whatsapp-btn{

    background:#25D366;

    color:#fff;

    border:none;

    font-weight:700;

    border-radius:12px;

    padding:13px;
}

.whatsapp-btn:hover{

    background:#1ebe5d;

    color:#fff;
}


/* =========================================
   EMPTY CART
========================================= */

.empty-cart{

    padding:70px 20px;

    background:#fff;

    border-radius:22px;

    border:1px solid #edf0f5;
}

.empty-cart-icon{

    width:110px;
    height:110px;

    margin:auto;

    border-radius:50%;

    background:#f1f5f9;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:50px;

    color:#0d6efd;
}


/* =========================================
   MOBILE
========================================= */

@media(max-width:767px){

    .cart-container{
        padding-left:12px;
        padding-right:12px;
    }

    .checkout-steps{
        padding:15px 10px;
    }

    .checkout-step{
        gap:8px;
    }

    .step-number{
        width:38px;
        height:38px;
    }

    .checkout-step strong{
        font-size:12px;
    }

    .checkout-step small{
        font-size:9px;
    }

    .step-line{
        width:45px;
        margin:0 8px;
    }


    .cart-page-item{

        flex-wrap:wrap;

        gap:14px;

        padding:16px;
    }

    .cart-page-image{

        width:85px;
        height:85px;

        min-width:85px;
    }

    .cart-page-info{

        min-width:calc(100% - 105px);
    }

    .cart-page-total{

        width:100%;

        text-align:right;

        padding-right:100px;

        min-width:auto;
    }

    .checkout-card{

        padding:20px;
    }

    .checkout-summary{

        position:static;
    }

    .checkout-actions{

        flex-direction:column-reverse;

        align-items:stretch;
    }

    .whatsapp-submit-btn{

        max-width:none;

        width:100%;
    }

    .back-btn{

        width:100%;
    }

}

</style>


@include('shop.partials.cart-script')


<script>

/*
|--------------------------------------------------------------------------
| عرض السلة
|--------------------------------------------------------------------------
*/

function renderCart() {

    const container =
        document.getElementById('cart-content');

    if (!container) return;

    const cart = getCart();


    /*
    |--------------------------------------------------------------------------
    | السلة فارغة
    |--------------------------------------------------------------------------
    */

    if (!cart.length) {

        container.innerHTML = `

            <div class="empty-cart text-center">

                <div class="empty-cart-icon">

                    <i class="bi bi-cart-x"></i>

                </div>

                <h3 class="fw-bold mt-4">
                    عربيتك فارغة
                </h3>

                <p class="text-muted">
                    لم تقم بإضافة أي منتجات إلى عربيتك بعد.
                </p>

                <a
                    href="{{ route('shop.index') }}"
                    class="btn btn-primary rounded-pill px-5">

                    تصفح المنتجات

                </a>

            </div>

        `;

        return;

    }


    /*
    |--------------------------------------------------------------------------
    | المنتجات
    |--------------------------------------------------------------------------
    */

    let productsHTML = '';


    cart.forEach(function(item) {

        const itemTotal =
            Number(item.price) *
            Number(item.quantity);


        const image = item.image

            ? `
                <img
                    src="/uploads/${item.image}"
       <script>

/* =========================================================
   CART PAGE
   متوافق مع Floating Cart
========================================================= */


/*
|--------------------------------------------------------------------------
| عرض السلة
|--------------------------------------------------------------------------
*/

function renderCart() {

    const container =
        document.getElementById('cart-content');

    if (!container) return;


    const cart =
        typeof getCart === 'function'
            ? getCart()
            : [];


    /*
    |--------------------------------------------------------------------------
    | السلة فارغة
    |--------------------------------------------------------------------------
    */

    if (!cart || !cart.length) {

        container.innerHTML = `

            <div class="empty-cart text-center">

                <div class="empty-cart-icon">

                    <i class="bi bi-cart-x"></i>

                </div>

                <h3 class="fw-bold mt-4">
                    عربيتك فارغة
                </h3>

                <p class="text-muted">
                    لم تقم بإضافة أي منتجات إلى عربيتك بعد.
                </p>

                <a
                    href="{{ route('shop.index') }}"
                    class="btn btn-primary rounded-pill px-5">

                    <i class="bi bi-shop ms-2"></i>

                    تصفح المنتجات

                </a>

            </div>

        `;

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | المنتجات
    |--------------------------------------------------------------------------
    */

    let productsHTML = '';


    cart.forEach(function(item) {

        const price =
            Number(item.price) || 0;

        const quantity =
            Number(item.quantity) || 1;

        const itemTotal =
            price * quantity;


        const image =
            item.image

                ? `
                    <img
                        src="/uploads/${item.image}"
                        alt="${escapeHtml(item.name || '')}"
                        loading="lazy"
                    >
                  `

                : `
                    <div class="no-cart-image">

                        <i class="bi bi-image"></i>

                    </div>
                  `;


        productsHTML += `

            <div
                class="cart-page-item"
                id="cart-item-${item.id}"
            >

                <div class="cart-page-image">

                    ${image}

                </div>


                <div class="cart-page-info">

                    <h5 class="fw-bold mb-2">

                        ${escapeHtml(item.name || 'منتج')}

                    </h5>


                    <div class="text-primary fw-bold mb-3">

                        ${formatPrice(price)}

                        ج.م

                    </div>


                    <div class="d-flex align-items-center gap-2">

                        <button
                            type="button"
                            class="quantity-btn"
                            onclick="decreaseCart(${item.id})"
                            aria-label="تقليل الكمية"
                        >

                            <i class="bi bi-dash"></i>

                        </button>


                        <span class="quantity-number">

                            ${quantity}

                        </span>


                        <button
                            type="button"
                            class="quantity-btn"
                            onclick="increaseCart(${item.id})"
                            aria-label="زيادة الكمية"
                        >

                            <i class="bi bi-plus"></i>

                        </button>


                        <button
                            type="button"
                            class="btn btn-outline-danger rounded-circle me-3"
                            onclick="removeFromCart(${item.id})"
                            aria-label="حذف المنتج"
                        >

                            <i class="bi bi-trash"></i>

                        </button>

                    </div>

                </div>


                <div class="cart-page-total">

                    <small class="text-muted d-block">
                        الإجمالي
                    </small>

                    <strong>

                        ${formatPrice(itemTotal)}

                        ج.م

                    </strong>

                </div>

            </div>

        `;

    });


    /*
    |--------------------------------------------------------------------------
    | الصفحة
    |--------------------------------------------------------------------------
    */

    const cartCount =
        typeof getCartCount === 'function'
            ? getCartCount()
            : cart.reduce(function(total, item) {
                return total + Number(item.quantity || 0);
            }, 0);


    const cartTotal =
        typeof getCartTotal === 'function'
            ? getCartTotal()
            : cart.reduce(function(total, item) {
                return total +
                    (
                        Number(item.price || 0) *
                        Number(item.quantity || 0)
                    );
            }, 0);


    container.innerHTML = `

        <div class="row g-4">


            {{-- =====================================================
                 المنتجات
            ====================================================== --}}

            <div class="col-lg-8">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                    <div class="p-4 border-bottom">

                        <div class="d-flex align-items-center justify-content-between">

                            <div>

                                <h5 class="fw-bold mb-1">

                                    <i class="bi bi-bag-check ms-2 text-primary"></i>

                                    المنتجات

                                </h5>

                                <small class="text-muted">

                                    راجع المنتجات والكميات قبل المتابعة

                                </small>

                            </div>


                            <span class="badge bg-primary rounded-pill px-3 py-2">

                                ${cartCount} منتج

                            </span>

                        </div>

                    </div>


                    ${productsHTML}

                </div>

            </div>


            {{-- =====================================================
                 ملخص الطلب
            ====================================================== --}}

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm rounded-4 sticky-summary">

                    <div class="card-body p-4">


                        <div class="d-flex align-items-center gap-2 mb-4">

                            <div
                                style="
                                    width:42px;
                                    height:42px;
                                    border-radius:12px;
                                    background:#eef8fc;
                                    color:#0b7fab;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    font-size:19px;
                                "
                            >

                                <i class="bi bi-receipt"></i>

                            </div>


                            <div>

                                <h5 class="fw-bold mb-1">
                                    ملخص الطلب
                                </h5>

                                <small class="text-muted">
                                    راجع طلبك قبل إكمال البيانات
                                </small>

                            </div>

                        </div>


                        <div class="summary-row">

                            <span>
                                عدد المنتجات
                            </span>

                            <strong>
                                ${cartCount}
                            </strong>

                        </div>


                        <hr>


                        <div class="summary-row total-row">

                            <span>
                                الإجمالي
                            </span>

                            <strong>

                                ${formatPrice(cartTotal)}

                                ج.م

                            </strong>

                        </div>


                        {{-- =================================================
                             زر الخطوة الثانية
                        ================================================== --}}

                        <button
                            type="button"
                            onclick="showCartStep(2)"
                            class="btn whatsapp-btn w-100 mt-4"
                        >

                            <span>
                                متابعة إلى البيانات
                            </span>

                            <i class="bi bi-arrow-left ms-2"></i>

                        </button>


                        <a
                            href="{{ route('shop.index') }}"
                            class="btn btn-outline-primary w-100 mt-3"
                        >

                            <i class="bi bi-arrow-right ms-2"></i>

                            متابعة التسوق

                        </a>


                        <div class="order-note mt-4">

                            <i class="bi bi-shield-check"></i>

                            <span>

                                بياناتك تستخدم فقط لتجهيز طلبك
                                وإرساله عبر واتساب.

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    `;

}


/* =========================================================
   الانتقال بين الخطوتين
========================================================= */

function showCartStep(step) {

    /*
    |--------------------------------------------------------------------------
    | نفس IDs الموجودة في Floating Cart
    |--------------------------------------------------------------------------
    */

    const step1 =
        document.getElementById('cartStep1');

    const step2 =
        document.getElementById('cartStep2');

    const indicator1 =
        document.getElementById('cartStepIndicator1');

    const indicator2 =
        document.getElementById('cartStepIndicator2');

    const panel =
        document.getElementById('cartPanel');


    /*
    |--------------------------------------------------------------------------
    | التأكد أن عناصر الخطوات موجودة
    |--------------------------------------------------------------------------
    */

    if (!step1 || !step2) {

        console.error(
            'Cart steps elements not found.'
        );

        return;

    }


    /*
    |--------------------------------------------------------------------------
    | الخطوة الأولى
    |--------------------------------------------------------------------------
    */

    if (Number(step) === 1) {

        step1.classList.add('active');

        step2.classList.remove('active');


        if (indicator1) {

            indicator1.classList.add('active');

        }


        if (indicator2) {

            indicator2.classList.remove('active');

        }


        if (panel) {

            panel.classList.remove('step-two');

        }


        return;

    }


    /*
    |--------------------------------------------------------------------------
    | الخطوة الثانية
    |--------------------------------------------------------------------------
    */

    if (Number(step) === 2) {

        const cart =
            typeof getCart === 'function'
                ? getCart()
                : [];


        /*
        |--------------------------------------------------------------------------
        | مهم:
        | لا نقول السلة فارغة إلا إذا كانت فعلاً فارغة
        |--------------------------------------------------------------------------
        */

        if (!Array.isArray(cart) || cart.length === 0) {

            if (
                typeof showCartMessage === 'function'
            ) {

                showCartMessage(
                    'السلة فارغة، أضف منتجًا أولًا.',
                    'danger'
                );

            } else {

                alert(
                    'السلة فارغة، أضف منتجًا أولًا.'
                );

            }


            return;

        }


        step1.classList.remove('active');

        step2.classList.add('active');


        if (indicator1) {

            indicator1.classList.remove('active');

        }


        if (indicator2) {

            indicator2.classList.add('active');

        }


        if (panel) {

            panel.classList.add('step-two');

        }


        updateCheckoutTotals();


        /*
        |--------------------------------------------------------------------------
        | لو الصفحة نفسها تحتوي على ملخص Checkout
        |--------------------------------------------------------------------------
        */

        if (
            typeof renderCheckoutSummary === 'function'
        ) {

            renderCheckoutSummary();

        }

    }

}


/*
|--------------------------------------------------------------------------
| تحديث إجمالي الخطوة الثانية
|--------------------------------------------------------------------------
*/

function updateCheckoutTotals() {

    const total =
        typeof getCartTotal === 'function'
            ? getCartTotal()
            : 0;


    const formatted =
        formatPrice(total);


    const total1 =
        document.getElementById('cartTotal');


    const total2 =
        document.getElementById('cartTotalStep2');


    if (total1) {

        total1.textContent =
            formatted;

    }


    if (total2) {

        total2.textContent =
            formatted;

    }

}


/*
|--------------------------------------------------------------------------
| ملخص المنتجات في الخطوة الثانية
|--------------------------------------------------------------------------
*/

function renderCheckoutSummary() {

    const container =
        document.getElementById(
            'checkout-summary-content'
        );


    /*
    |--------------------------------------------------------------------------
    | العنصر غير موجود في Floating Cart
    | لذلك لا نعتبره خطأ
    |--------------------------------------------------------------------------
    */

    if (!container) {

        return;

    }


    const cart =
        typeof getCart === 'function'
            ? getCart()
            : [];


    if (!cart.length) {

        container.innerHTML = `

            <div class="text-center text-muted p-4">

                السلة فارغة

            </div>

        `;

        return;

    }


    let html = '';


    cart.forEach(function(item) {

        const itemTotal =
            Number(item.price || 0) *
            Number(item.quantity || 0);


        const image =
            item.image

                ? `
                    <img
                        src="/uploads/${item.image}"
                        alt="${escapeHtml(item.name || '')}"
                        loading="lazy"
                    >
                  `

                : `
                    <div class="no-cart-image">

                        <i class="bi bi-image"></i>

                    </div>
                  `;


        html += `

            <div class="checkout-summary-product">


                <div class="checkout-summary-product-image">

                    ${image}

                </div>


                <div class="checkout-summary-product-info">

                    <strong>

                        ${escapeHtml(item.name || 'منتج')}

                    </strong>

                    <span>

                        الكمية:
                        ${Number(item.quantity || 0)}

                    </span>

                </div>


                <div class="checkout-summary-product-price">

                    ${formatPrice(itemTotal)}

                    ج.م

                </div>

            </div>

        `;

    });


    html += `

        <div class="checkout-total">

            <span>
                الإجمالي
            </span>

            <strong>

                ${formatPrice(getCartTotal())}

                ج.م

            </strong>

        </div>

    `;


    container.innerHTML =
        html;

}


/* =========================================================
   تنسيق السعر
========================================================= */

function formatPrice(number) {

    return Number(number || 0).toLocaleString(
        'ar-EG',
        {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }
    );

}


/* =========================================================
   حماية النص
========================================================= */

function escapeHtml(text) {

    const div =
        document.createElement('div');


    div.textContent =
        text ?? '';


    return div.innerHTML;

}


/* =========================================================
   إرسال الطلب من صفحة Checkout
========================================================= */

document.addEventListener(
    'DOMContentLoaded',
    function() {


        /*
        |--------------------------------------------------------------------------
        | عرض السلة
        |--------------------------------------------------------------------------
        */

        renderCart();


        /*
        |--------------------------------------------------------------------------
        | تحديث الإجماليات
        |--------------------------------------------------------------------------
        */

        updateCheckoutTotals();


        /*
        |--------------------------------------------------------------------------
        | زر الانتقال من Floating Cart
        |--------------------------------------------------------------------------
        */

        const floatingNextButton =
            document.getElementById(
                'cartNextStep'
            );


        if (floatingNextButton) {

            /*
            | مهم:
            | لو الـ Floating Cart عنده listener بالفعل
            | لن نضيف listener آخر هنا.
            */

        }


        /*
        |--------------------------------------------------------------------------
        | زر الرجوع
        |--------------------------------------------------------------------------
        */

        const floatingBackButton =
            document.getElementById(
                'cartBackStep'
            );


        if (
            floatingBackButton &&
            !floatingBackButton.dataset.stepHandler
        ) {

            floatingBackButton.dataset.stepHandler =
                'true';


            floatingBackButton.addEventListener(
                'click',
                function() {

                    showCartStep(1);

                }
            );

        }


        /*
        |--------------------------------------------------------------------------
        | فورم Checkout القديم إن كان موجودًا
        |--------------------------------------------------------------------------
        */

        const form =
            document.getElementById(
                'checkout-form'
            );


        if (!form) {

            return;

        }


        form.addEventListener(
            'submit',
            function(e) {

                e.preventDefault();


                const name =
                    document
                        .getElementById(
                            'customer_name'
                        )
                        ?.value
                        .trim() || '';


                const phone =
                    document
                        .getElementById(
                            'customer_phone'
                        )
                        ?.value
                        .trim() || '';


                const governorate =
                    document
                        .getElementById(
                            'customer_governorate'
                        )
                        ?.value
                        .trim() || '';


                const city =
                    document
                        .getElementById(
                            'customer_city'
                        )
                        ?.value
                        .trim() || '';


                const address =
                    document
                        .getElementById(
                            'customer_address'
                        )
                        ?.value
                        .trim() || '';


                const notes =
                    document
                        .getElementById(
                            'customer_notes'
                        )
                        ?.value
                        .trim() || '';


                /*
                |--------------------------------------------------------------------------
                | التحقق
                |--------------------------------------------------------------------------
                */

                if (!name) {

                    alert(
                        'من فضلك أدخل الاسم بالكامل.'
                    );

                    return;

                }


                if (!phone) {

                    alert(
                        'من فضلك أدخل رقم الهاتف.'
                    );

                    return;

                }


                const cart =
                    typeof getCart === 'function'
                        ? getCart()
                        : [];


                if (!Array.isArray(cart) || !cart.length) {

                    alert(
                        'السلة فارغة.'
                    );

                    return;

                }


                /*
                |--------------------------------------------------------------------------
                | الرسالة
                |--------------------------------------------------------------------------
                */

                let message =
                    '*طلب جديد من موقع شارك استور*%0A%0A';


                message +=
                    '*بيانات العميل:*%0A';


                message +=
                    `الاسم: ${encodeURIComponent(name)}%0A`;


                message +=
                    `الهاتف: ${encodeURIComponent(phone)}%0A`;


                if (governorate) {

                    message +=
                        `المحافظة: ${encodeURIComponent(governorate)}%0A`;

                }


                if (city) {

                    message +=
                        `المنطقة: ${encodeURIComponent(city)}%0A`;

                }


                if (address) {

                    message +=
                        `العنوان: ${encodeURIComponent(address)}%0A`;

                }


                message +=
                    '%0A*المنتجات:*%0A';


                cart.forEach(function(item) {

                    const itemTotal =
                        Number(item.price || 0) *
                        Number(item.quantity || 0);


                    message +=
                        `- ${encodeURIComponent(item.name || 'منتج')} × ${Number(item.quantity || 0)} = ${encodeURIComponent(formatPrice(itemTotal))} ج.م%0A`;

                });


                message +=
                    `%0A*الإجمالي: ${encodeURIComponent(formatPrice(getCartTotal()))} ج.م*%0A`;


                if (notes) {

                    message +=
                        `%0A*ملاحظات:*%0A${encodeURIComponent(notes)}`;

                }


                /*
                |--------------------------------------------------------------------------
                | رقم واتساب
                |--------------------------------------------------------------------------
                */

                const whatsappNumber =
                    '201000000000';


                const whatsappUrl =
                    `https://wa.me/${whatsappNumber}?text=${message}`;


                window.open(
                    whatsappUrl,
                    '_blank'
                );

            }
        );

    }
);


/* =========================================================
   تحديث الصفحة عند تغير السلة
========================================================= */

window.addEventListener(
    'storage',
    function(event) {

        if (
            event.key === CART_KEY
        ) {

            renderCart();

            updateCheckoutTotals();

        }

    }
);

</script>

@endsection