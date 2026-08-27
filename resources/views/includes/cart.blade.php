{{-- =========================================================
     FLOATING CART
========================================================= --}}

<div id="floatingCart" class="floating-cart" dir="rtl">

    {{-- =====================================================
         زر السلة
    ====================================================== --}}

    <button
        type="button"
        id="cartToggle"
        class="cart-toggle"
        aria-label="فتح السلة"
    >

        <i class="bi bi-cart3"></i>

        <span
            id="cartCount"
            class="cart-count"
        >0</span>

    </button>


    {{-- =====================================================
         لوحة السلة
    ====================================================== --}}

    <div
        id="cartPanel"
        class="cart-panel"
    >

        {{-- =================================================
             HEADER
        ================================================== --}}

        <div class="cart-header">

            <div class="cart-header-info">

                <div class="cart-header-icon">
                    <i class="bi bi-cart3"></i>
                </div>

                <div>

                    <h5>
                        عربيتي
                    </h5>

                    <small id="cartItemsText">
                        لا توجد منتجات
                    </small>

                </div>

            </div>


            <button
                type="button"
                id="cartClose"
                class="cart-close"
                aria-label="إغلاق السلة"
            >

                <i class="bi bi-x-lg"></i>

            </button>

        </div>


        {{-- =================================================
             CART CONTENT
        ================================================== --}}

        <div
            id="cartItems"
            class="cart-items"
        >

            <div class="cart-empty">

                <div class="cart-empty-icon">

                    <i class="bi bi-cart-x"></i>

                </div>

                <h6>
                    السلة فارغة
                </h6>

                <p>
                    أضف المنتجات التي تريد طلبها
                </p>

            </div>

        </div>


        {{-- =================================================
             FOOTER
        ================================================== --}}

        <div class="cart-footer">

            <div class="cart-total-box">

                <div>

                    <span>
                        إجمالي الطلب
                    </span>

                    <small>
                        شامل المنتجات
                    </small>

                </div>


                <strong>

                    <span id="cartTotal">
                        0
                    </span>

                    <small>
                        ج.م
                    </small>

                </strong>

            </div>


            {{-- =================================================
                 الانتقال إلى صفحة Checkout
            ================================================== --}}

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

    </div>

</div>


{{-- =========================================================
     OVERLAY
========================================================= --}}

<div
    id="cartOverlay"
    class="cart-overlay"
></div>


<style>

/* =========================================================
   FLOATING CART
========================================================= */

.floating-cart {

    position: fixed;

    right: 25px;
    bottom: 25px;

    z-index: 9997;
}


/* =========================================================
   CART BUTTON
========================================================= */

.cart-toggle {

    width: 62px;
    height: 62px;

    border: 0;

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

    box-shadow:
        0 10px 30px rgba(6,27,53,.30);

    transition:
        transform .3s ease,
        box-shadow .3s ease;

    position: relative;
}


.cart-toggle:hover {

    transform: scale(1.08);

    box-shadow:
        0 15px 40px rgba(6,27,53,.38);
}


/* =========================================================
   COUNT
========================================================= */

.cart-count {

    position: absolute;

    top: -4px;
    right: -4px;

    min-width: 24px;
    height: 24px;

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
}


/* =========================================================
   OVERLAY
========================================================= */

.cart-overlay {

    position: fixed;

    inset: 0;

    background: rgba(3,15,28,.42);

    backdrop-filter: blur(3px);
    -webkit-backdrop-filter: blur(3px);

    opacity: 0;

    visibility: hidden;

    transition: .3s;

    z-index: 5;
}


.cart-overlay.active {

    opacity: 1;

    visibility: visible;
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

    background: #fff;

    box-shadow:
        -15px 0 50px rgba(0,0,0,.18);

    transform: translateX(105%);

    transition:
        transform .38s cubic-bezier(.4,0,.2,1);

    display: flex;

    flex-direction: column;

    z-index: 9999;

    overflow: hidden;
}


.cart-panel.active {

    transform: translateX(0);
}


/* =========================================================
   HEADER
========================================================= */

.cart-header {

    background:
        linear-gradient(
            135deg,
            #061b35,
            #0b7fab
        );

    color: #fff;

    padding: 18px 20px;

    display: flex;

    align-items: center;

    justify-content: space-between;

    flex-shrink: 0;
}


.cart-header-info {

    display: flex;

    align-items: center;

    gap: 12px;
}


.cart-header-icon {

    width: 43px;
    height: 43px;

    border-radius: 13px;

    background: rgba(255,255,255,.13);

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 20px;
}


.cart-header h5 {

    margin: 0;

    font-weight: 900;

    font-size: 18px;
}


.cart-header small {

    display: block;

    margin-top: 3px;

    opacity: .75;

    font-size: 11px;
}


/* =========================================================
   CLOSE
========================================================= */

.cart-close {

    width: 38px;
    height: 38px;

    border: 0;

    border-radius: 50%;

    background: rgba(255,255,255,.13);

    color: #fff;

    display: flex;

    align-items: center;
    justify-content: center;

    cursor: pointer;

    transition: .2s;
}


.cart-close:hover {

    background: rgba(255,255,255,.23);

    transform: rotate(90deg);
}


/* =========================================================
   ITEMS
========================================================= */

.cart-items {

    flex: 1;

    overflow-y: auto;

    padding: 15px;

    scrollbar-width: thin;

    scrollbar-color:
        #cdd5df
        transparent;
}


.cart-items::-webkit-scrollbar {

    width: 5px;
}


.cart-items::-webkit-scrollbar-thumb {

    background: #cdd5df;

    border-radius: 10px;
}


/* =========================================================
   EMPTY
========================================================= */

.cart-empty {

    text-align: center;

    color: #8993a4;

    padding: 65px 20px;
}


.cart-empty-icon {

    width: 90px;
    height: 90px;

    border-radius: 50%;

    background:
        linear-gradient(
            135deg,
            #eef7fb,
            #f5f8fa
        );

    display: flex;

    align-items: center;
    justify-content: center;

    margin: 0 auto 18px;

    color: #0b7fab;

    font-size: 42px;
}


.cart-empty h6 {

    font-weight: 900;

    color: #142033;

    margin-bottom: 7px;
}


.cart-empty p {

    font-size: 12px;

    margin: 0;
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

    transition: .2s;
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

    transition: .3s;
}


.cart-item:hover
.cart-item-image img {

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

    color: #142033;

    font-size: 13px;

    font-weight: 900;

    margin-bottom: 5px;

    line-height: 1.5;
}


.cart-item-price {

    color: #0b7fab;

    font-size: 12px;

    font-weight: 800;
}


.cart-item-total {

    color: #142033;

    font-size: 12px;

    font-weight: 900;

    margin-top: 4px;
}


.cart-item-stock {

    color: #8993a4;

    font-size: 10px;

    margin-top: 9px;
}


/* =========================================================
   DELETE
========================================================= */

.cart-delete {

    border: 0;

    background: #fff1f2;

    color: #dc3545;

    width: 29px;
    height: 29px;

    border-radius: 8px;

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 13px;

    cursor: pointer;

    transition: .2s;
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

    border: 1px solid #e2e7ee;

    background: #fff;

    color: #142033;

    border-radius: 8px;

    font-weight: 900;

    cursor: pointer;

    display: flex;

    align-items: center;
    justify-content: center;

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

    font-weight: 900;

    font-size: 13px;
}


/* =========================================================
   FOOTER
========================================================= */

.cart-footer {

    border-top: 1px solid #edf0f5;

    padding: 15px;

    background: #fff;

    flex-shrink: 0;
}


/* =========================================================
   TOTAL
========================================================= */

.cart-total-box {

    display: flex;

    align-items: center;

    justify-content: space-between;

    background:
        linear-gradient(
            135deg,
            #f1f9fc,
            #eef8fb
        );

    border: 1px solid #e2f0f5;

    border-radius: 13px;

    padding: 12px 14px;

    margin-bottom: 11px;
}


.cart-total-box > div > span {

    display: block;

    color: #142033;

    font-size: 12px;

    font-weight: 900;
}


.cart-total-box > div > small {

    display: block;

    color: #8993a4;

    font-size: 9px;

    margin-top: 2px;
}


.cart-total-box strong {

    color: #0b7fab;

    font-size: 20px;

    font-weight: 900;
}


.cart-total-box strong small {

    display: inline;

    color: #0b7fab;

    font-size: 11px;

    font-weight: 800;
}


/* =========================================================
   CHECKOUT BUTTON
========================================================= */

.cart-checkout-btn {

    width: 100%;

    border: 0;

    border-radius: 12px;

    background:
        linear-gradient(
            135deg,
            #061b35,
            #0b7fab
        );

    color: #fff;

    padding: 13px;

    font-size: 13px;

    font-weight: 900;

    cursor: pointer;

    display: flex;

    align-items: center;
    justify-content: center;

    gap: 10px;

    transition: .25s;

    box-shadow:
        0 7px 18px rgba(11,127,171,.17);
}


.cart-checkout-btn:hover {

    transform: translateY(-2px);

    box-shadow:
        0 10px 25px rgba(11,127,171,.25);
}


.cart-checkout-btn:active {

    transform: scale(.98);
}


.cart-checkout-btn i {

    font-size: 16px;
}


/* =========================================================
   MOBILE
========================================================= */

@media(max-width:576px) {

    .floating-cart {

        right: 15px;

        bottom: 15px;
    }


    .cart-toggle {

        width: 57px;

        height: 57px;

        font-size: 24px;
    }


    .cart-panel {

        width: 100%;
    }


    .cart-header {

        padding: 16px;
    }


    .cart-items {

        padding: 12px;
    }

}

</style>