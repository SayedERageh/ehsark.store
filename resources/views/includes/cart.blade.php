{{-- =========================================================
FLOATING CART - COMPLETE VERSION
========================================================= --}}

<div id="floatingCart" class="floating-cart" dir="rtl">

```
{{-- زر فتح السلة --}}
<button
    type="button"
    id="cartToggle"
    class="cart-toggle"
    aria-label="فتح السلة"
>
    <i class="bi bi-cart3"></i>
    <span id="cartCount" class="cart-count">0</span>
</button>

{{-- خلفية السلة --}}
<div id="cartOverlay" class="cart-overlay"></div>

{{-- لوحة السلة --}}
<aside
    id="cartPanel"
    class="cart-panel"
    aria-hidden="true"
>

    {{-- ================= HEADER ================= --}}
    <div class="cart-header">

        <div class="cart-header-info">

            <div class="cart-header-icon">
                <i class="bi bi-cart3"></i>
            </div>

            <div class="cart-header-text">
                <h5>عربيتي</h5>

                <small id="cartItemsText">
                    لا توجد منتجات
                </small>
            </div>

        </div>

        {{-- زر الإغلاق --}}
        <button
            type="button"
            id="cartClose"
            class="cart-close"
            aria-label="إغلاق السلة"
        >
            <span>×</span>
        </button>

    </div>


    {{-- ================= CONTENT ================= --}}
    <div
        id="cartItems"
        class="cart-items"
    >

        <div class="cart-empty">

            <div class="cart-empty-icon">
                <i class="bi bi-cart-x"></i>
            </div>

            <h6>السلة فارغة</h6>

            <p>
                أضف المنتجات التي تريد طلبها
            </p>

        </div>

    </div>


    {{-- ================= FOOTER ================= --}}
    <div class="cart-footer">

        <div class="cart-total-box">

            <div class="cart-total-info">

                <span>
                    إجمالي الطلب
                </span>

                <small>
                    شامل المنتجات
                </small>

            </div>

            <strong>
                <span id="cartTotal">0</span>
                <small>ج.م</small>
            </strong>

        </div>


        <button
            type="button"
            id="goToCheckout"
            class="cart-checkout-btn"
        >

            <span>
                متابعة الطلب
            </span>

            <i class="bi bi-arrow-left"></i>

        </button>

    </div>

</aside>
```

</div>

<style>

/* =========================================================
   CART ROOT
========================================================= */

.floating-cart {
    position: fixed;
    right: 25px;
    bottom: 25px;

    width: 62px;
    height: 62px;

    z-index: 2147483000;
}


/* =========================================================
   CART TOGGLE
========================================================= */

.cart-toggle {
    position: fixed;

    right: 25px;
    bottom: 25px;

    width: 62px;
    height: 62px;

    padding: 0;

    border: none;
    border-radius: 50%;

    background:
        linear-gradient(
            135deg,
            #061b35,
            #0b7fab
        );

    color: #fff;

    font-size: 27px;

    display: flex;
    align-items: center;
    justify-content: center;

    cursor: pointer;

    z-index: 2147483001;

    box-shadow:
        0 10px 30px rgba(6,27,53,.30);

    transition:
        transform .25s ease,
        box-shadow .25s ease;
}

.cart-toggle:hover {
    transform: scale(1.08);

    box-shadow:
        0 15px 40px rgba(6,27,53,.38);
}

.cart-toggle:active {
    transform: scale(.95);
}


/* =========================================================
   CART COUNT
========================================================= */

.cart-count {
    position: absolute;

    top: -5px;
    right: -5px;

    min-width: 25px;
    height: 25px;

    padding: 0 6px;

    border-radius: 50px;

    background: #ff3b30;

    color: #fff;

    border: 2px solid #fff;

    font-size: 11px;
    font-weight: 900;

    display: flex;
    align-items: center;
    justify-content: center;

    line-height: 1;

    z-index: 10;
}


/* =========================================================
   OVERLAY
========================================================= */

.cart-overlay {
    position: fixed;

    inset: 0;

    background: rgba(3,15,28,.48);

    backdrop-filter: blur(3px);
    -webkit-backdrop-filter: blur(3px);

    opacity: 0;
    visibility: hidden;

    pointer-events: none;

    transition:
        opacity .3s ease,
        visibility .3s ease;

    z-index: 2147483002;
}

.cart-overlay.active {
    opacity: 1;
    visibility: visible;

    pointer-events: auto;
}


/* =========================================================
   PANEL
========================================================= */

.cart-panel {
    position: fixed;

    top: 0;
    right: 0;

    width: 430px;
    max-width: 100%;

    height: 100vh;
    height: 100dvh;

    margin: 0;
    padding: 0;

    background: #fff;

    display: flex;
    flex-direction: column;

    overflow: hidden;

    transform: translateX(110%);

    transition:
        transform .38s cubic-bezier(.4,0,.2,1);

    box-shadow:
        -15px 0 50px rgba(0,0,0,.20);

    visibility: hidden;

    pointer-events: none;

    z-index: 2147483003;
}

.cart-panel.active {
    transform: translateX(0);

    visibility: visible;

    pointer-events: auto;
}


/* =========================================================
   HEADER
========================================================= */

.cart-header {
    position: relative;

    flex-shrink: 0;

    min-height: 78px;

    padding: 16px 18px;

    background:
        linear-gradient(
            135deg,
            #061b35,
            #0b7fab
        );

    color: #fff;

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 12px;

    z-index: 10;
}


.cart-header-info {
    display: flex;

    align-items: center;

    gap: 12px;

    min-width: 0;
}


.cart-header-icon {
    width: 44px;
    height: 44px;

    min-width: 44px;

    border-radius: 13px;

    background: rgba(255,255,255,.14);

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 20px;
}


.cart-header-text {
    min-width: 0;
}


.cart-header h5 {
    margin: 0;

    color: #fff;

    font-size: 18px;

    font-weight: 900;
}


.cart-header small {
    display: block;

    margin-top: 3px;

    color: rgba(255,255,255,.78);

    font-size: 11px;
}


/* =========================================================
   CLOSE BUTTON
========================================================= */

.cart-close {
    position: relative;

    width: 44px;
    height: 44px;

    min-width: 44px;

    padding: 0;

    margin: 0;

    border: 2px solid rgba(255,255,255,.25);

    border-radius: 50%;

    background: rgba(255,255,255,.14);

    color: #fff;

    display: flex;

    align-items: center;
    justify-content: center;

    cursor: pointer;

    outline: none;

    z-index: 999999;

    opacity: 1;

    visibility: visible;

    pointer-events: auto;

    transition:
        background .2s ease,
        transform .2s ease,
        border-color .2s ease;
}


/* علامة X نفسها */

.cart-close span {
    display: block;

    color: #fff;

    font-family: Arial, sans-serif;

    font-size: 31px;

    font-weight: 300;

    line-height: 36px;

    width: 100%;
    height: 100%;

    text-align: center;

    pointer-events: none;

    transform: translateY(-1px);
}


.cart-close:hover {
    background: #ff3b30;

    border-color: #ff3b30;

    transform: rotate(90deg);
}


.cart-close:active {
    transform: scale(.90);
}


/* =========================================================
   ITEMS
========================================================= */

.cart-items {
    flex: 1;

    min-height: 0;

    overflow-y: auto;

    overflow-x: hidden;

    padding: 15px;

    background: #fff;

    scrollbar-width: thin;

    scrollbar-color:
        #cbd5df
        transparent;
}


.cart-items::-webkit-scrollbar {
    width: 5px;
}


.cart-items::-webkit-scrollbar-track {
    background: transparent;
}


.cart-items::-webkit-scrollbar-thumb {
    background: #cbd5df;

    border-radius: 20px;
}


/* =========================================================
   EMPTY CART
========================================================= */

.cart-empty {
    text-align: center;

    color: #8993a4;

    padding: 65px 20px;
}


.cart-empty-icon {
    width: 90px;
    height: 90px;

    margin: 0 auto 18px;

    border-radius: 50%;

    background:
        linear-gradient(
            135deg,
            #eef7fb,
            #f5f8fa
        );

    color: #0b7fab;

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 42px;
}


.cart-empty h6 {
    margin: 0 0 7px;

    color: #142033;

    font-size: 15px;

    font-weight: 900;
}


.cart-empty p {
    margin: 0;

    color: #8993a4;

    font-size: 12px;
}


/* =========================================================
   CART ITEM
========================================================= */

.cart-item {
    background: #fff;

    border: 1px solid #edf0f5;

    border-radius: 16px;

    padding: 12px;

    margin-bottom: 10px;

    box-shadow:
        0 4px 15px rgba(15,23,42,.035);

    transition:
        border-color .2s ease,
        box-shadow .2s ease;
}


.cart-item:hover {
    border-color: #dce5ed;

    box-shadow:
        0 7px 20px rgba(15,23,42,.06);
}


.cart-item-top {
    display: flex;

    align-items: flex-start;

    gap: 11px;
}


/* =========================================================
   IMAGE
========================================================= */

.cart-item-image {
    width: 72px;
    height: 72px;

    min-width: 72px;

    border-radius: 13px;

    background:
        linear-gradient(
            145deg,
            #f8fafc,
            #eef3f7
        );

    border: 1px solid #e8edf2;

    overflow: hidden;

    display: flex;

    align-items: center;
    justify-content: center;
}


.cart-item-image img {
    width: 100%;
    height: 100%;

    object-fit: contain;

    padding: 6px;

    transition: transform .3s ease;
}


.cart-item:hover .cart-item-image img {
    transform: scale(1.06);
}


.cart-no-image {
    color: #b2bac5;

    font-size: 25px;
}


/* =========================================================
   INFO
========================================================= */

.cart-item-info {
    flex: 1;

    min-width: 0;
}


.cart-item-name {
    margin-bottom: 5px;

    color: #142033;

    font-size: 13px;

    font-weight: 900;

    line-height: 1.5;
}


.cart-item-price {
    color: #0b7fab;

    font-size: 12px;

    font-weight: 800;
}


.cart-item-total {
    margin-top: 4px;

    color: #142033;

    font-size: 12px;

    font-weight: 900;
}


.cart-item-stock {
    margin-top: 9px;

    color: #8993a4;

    font-size: 10px;
}


/* =========================================================
   DELETE
========================================================= */

.cart-delete {
    width: 30px;
    height: 30px;

    min-width: 30px;

    padding: 0;

    border: 0;

    border-radius: 8px;

    background: #fff1f2;

    color: #dc3545;

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 13px;

    cursor: pointer;

    transition:
        background .2s ease,
        color .2s ease;
}


.cart-delete:hover {
    background: #dc3545;

    color: #fff;
}


/* =========================================================
   QUANTITY
========================================================= */

.cart-quantity {
    display: flex;

    align-items: center;

    gap: 7px;

    margin-top: 11px;
}


.cart-quantity button {
    width: 29px;
    height: 29px;

    min-width: 29px;

    padding: 0;

    border: 1px solid #e2e7ee;

    border-radius: 8px;

    background: #fff;

    color: #142033;

    display: flex;

    align-items: center;
    justify-content: center;

    font-weight: 900;

    cursor: pointer;

    transition: .2s;
}


.cart-quantity button:hover {
    background: #0b7fab;

    border-color: #0b7fab;

    color: #fff;
}


.cart-quantity span {
    min-width: 24px;

    text-align: center;

    color: #142033;

    font-size: 13px;

    font-weight: 900;
}


/* =========================================================
   FOOTER
========================================================= */

.cart-footer {
    flex-shrink: 0;

    padding: 15px;

    border-top: 1px solid #edf0f5;

    background: #fff;

    position: relative;

    z-index: 10;
}


/* =========================================================
   TOTAL
========================================================= */

.cart-total-box {
    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 10px;

    padding: 12px 14px;

    margin-bottom: 11px;

    border: 1px solid #e2f0f5;

    border-radius: 13px;

    background:
        linear-gradient(
            135deg,
            #f1f9fc,
            #eef8fb
        );
}


.cart-total-info span {
    display: block;

    color: #142033;

    font-size: 12px;

    font-weight: 900;
}


.cart-total-info small {
    display: block;

    margin-top: 2px;

    color: #8993a4;

    font-size: 9px;
}


.cart-total-box strong {
    color: #0b7fab;

    font-size: 20px;

    font-weight: 900;
}


.cart-total-box strong small {
    color: #0b7fab;

    font-size: 11px;

    font-weight: 800;
}


/* =========================================================
   CHECKOUT
========================================================= */

.cart-checkout-btn {
    width: 100%;

    min-height: 48px;

    padding: 13px;

    border: 0;

    border-radius: 12px;

    background:
        linear-gradient(
            135deg,
            #061b35,
            #0b7fab
        );

    color: #fff;

    display: flex;

    align-items: center;
    justify-content: center;

    gap: 10px;

    font-size: 13px;

    font-weight: 900;

    cursor: pointer;

    box-shadow:
        0 7px 18px rgba(11,127,171,.17);

    transition:
        transform .25s ease,
        box-shadow .25s ease;
}


.cart-checkout-btn:hover {
    transform: translateY(-2px);

    box-shadow:
        0 10px 25px rgba(11,127,171,.25);
}


.cart-checkout-btn:active {
    transform: scale(.98);
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 576px) {

    .floating-cart {
        right: 15px;
        bottom: 15px;
    }

    .cart-toggle {
        right: 15px;
        bottom: 15px;

        width: 57px;
        height: 57px;

        font-size: 24px;
    }

    .cart-panel {
        width: 100%;
    }

    .cart-header {
        min-height: 72px;

        padding: 14px 15px;
    }

    .cart-header-icon {
        width: 40px;
        height: 40px;

        min-width: 40px;
    }

    .cart-close {
        width: 42px;
        height: 42px;

        min-width: 42px;
    }

    .cart-close span {
        font-size: 29px;
    }

    .cart-items {
        padding: 12px;
    }

    .cart-footer {
        padding: 12px;
    }
}


/* =========================================================
   PREVENT PAGE SCROLL WHEN CART OPEN
========================================================= */

body.cart-open {
    overflow: hidden;
}

</style>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const cartToggle = document.getElementById('cartToggle');
    const cartPanel = document.getElementById('cartPanel');
    const cartOverlay = document.getElementById('cartOverlay');
    const cartClose = document.getElementById('cartClose');

    if (!cartToggle || !cartPanel || !cartOverlay || !cartClose) {
        console.error('Cart elements not found.');
        return;
    }


    /* =========================================
       OPEN CART
    ========================================= */

    function openCart() {

        cartPanel.classList.add('active');
        cartOverlay.classList.add('active');

        cartPanel.setAttribute('aria-hidden', 'false');

        document.body.classList.add('cart-open');
    }


    /* =========================================
       CLOSE CART
    ========================================= */

    function closeCart() {

        cartPanel.classList.remove('active');
        cartOverlay.classList.remove('active');

        cartPanel.setAttribute('aria-hidden', 'true');

        document.body.classList.remove('cart-open');
    }


    /* =========================================
       TOGGLE
    ========================================= */

    cartToggle.addEventListener('click', function (event) {

        event.preventDefault();
        event.stopPropagation();

        if (cartPanel.classList.contains('active')) {
            closeCart();
        } else {
            openCart();
        }

    });


    /* =========================================
       CLOSE BUTTON
    ========================================= */

    cartClose.addEventListener('click', function (event) {

        event.preventDefault();
        event.stopPropagation();

        closeCart();

    });


    /* =========================================
       OVERLAY
    ========================================= */

    cartOverlay.addEventListener('click', function () {
        closeCart();
    });


    /* =========================================
       ESC KEY
    ========================================= */

    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {
            closeCart();
        }

    });


    /* =========================================
       CHECKOUT
    ========================================= */

    const checkoutButton =
        document.getElementById('goToCheckout');

    if (checkoutButton) {

        checkoutButton.addEventListener('click', function () {

            /*
             * لو عندك Route للـ Checkout
             * غير السطر التالي حسب الـ Route عندك
             */

            window.location.href = "{{ route('checkout') }}";

        });

    }

});
</script>
