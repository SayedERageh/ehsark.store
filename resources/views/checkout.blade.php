<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        إتمام الطلب - أوتاد مصر
    </title>


    {{-- Bootstrap --}}

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css"
        rel="stylesheet"
    >


    {{-- Bootstrap Icons --}}

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >


    <style>

        * {
            box-sizing: border-box;
        }


        body {

            margin: 0;

            background: #f6f7f9;

            font-family:
                Tahoma,
                Arial,
                sans-serif;

            color: #222;

        }


        /*
        |--------------------------------------------------------------------------
        | الصفحة
        |--------------------------------------------------------------------------
        */

        .checkout-page {

            max-width: 1200px;

            margin: 0 auto;

            padding:
                40px 20px 60px;

        }


        /*
        |--------------------------------------------------------------------------
        | العنوان
        |--------------------------------------------------------------------------
        */

        .checkout-header {

            text-align: center;

            margin-bottom: 35px;

        }


        .checkout-header h1 {

            font-size: 32px;

            font-weight: 800;

            margin-bottom: 10px;

        }


        .checkout-header p {

            color: #777;

            margin: 0;

            font-size: 15px;

        }


        /*
        |--------------------------------------------------------------------------
        | Grid
        |--------------------------------------------------------------------------
        */

        .checkout-grid {

            display: grid;

            grid-template-columns:
                minmax(0, 1fr)
                400px;

            gap: 25px;

            align-items: start;

        }


        /*
        |--------------------------------------------------------------------------
        | Card
        |--------------------------------------------------------------------------
        */

        .checkout-card {

            background: #fff;

            border-radius: 18px;

            padding: 25px;

            box-shadow:
                0 8px 30px
                rgba(0,0,0,.06);

            margin-bottom: 20px;

        }


        .checkout-card-title {

            display: flex;

            align-items: center;

            gap: 10px;

            font-size: 20px;

            font-weight: 800;

            margin-bottom: 25px;

        }


        .checkout-card-title i {

            font-size: 22px;

        }


        /*
        |--------------------------------------------------------------------------
        | Form
        |--------------------------------------------------------------------------
        */

        .form-group {

            margin-bottom: 18px;

        }


        .form-group label {

            display: block;

            font-weight: 700;

            margin-bottom: 8px;

            font-size: 14px;

        }


        .form-control {

            width: 100%;

            min-height: 48px;

            border:
                1px solid #ddd;

            border-radius: 10px;

            padding:
                10px 14px;

            font-size: 15px;

            outline: none;

            transition: .2s;

        }


        .form-control:focus {

            border-color: #198754;

            box-shadow:
                0 0 0 3px
                rgba(25,135,84,.1);

        }


        textarea.form-control {

            min-height: 110px;

            resize: vertical;

        }


        /*
        |--------------------------------------------------------------------------
        | Product
        |--------------------------------------------------------------------------
        */

        .checkout-product {

            display: flex;

            align-items: center;

            gap: 14px;

            padding:
                15px 0;

            border-bottom:
                1px solid #eee;

        }


        .checkout-product:last-child {

            border-bottom: 0;

        }


        .checkout-product-image {

            width: 75px;

            height: 75px;

            flex-shrink: 0;

            border-radius: 12px;

            overflow: hidden;

            background: #f2f2f2;

            display: flex;

            align-items: center;

            justify-content: center;

        }


        .checkout-product-image img {

            width: 100%;

            height: 100%;

            object-fit: cover;

        }


        .checkout-product-no-image {

            color: #aaa;

            font-size: 25px;

        }


        .checkout-product-info {

            flex: 1;

            min-width: 0;

        }


        .checkout-product-name {

            font-weight: 800;

            margin-bottom: 6px;

        }


        .checkout-product-meta {

            color: #777;

            font-size: 13px;

            line-height: 1.8;

        }


        .checkout-product-total {

            font-weight: 800;

            white-space: nowrap;

        }


        /*
        |--------------------------------------------------------------------------
        | Summary
        |--------------------------------------------------------------------------
        */

        .summary-row {

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 10px 0;

            font-size: 15px;

        }


        .summary-row.total {

            border-top:
                1px solid #eee;

            margin-top: 10px;

            padding-top: 18px;

            font-size: 22px;

            font-weight: 900;

        }


        /*
        |--------------------------------------------------------------------------
        | WhatsApp Button
        |--------------------------------------------------------------------------
        */

        .confirm-order-btn {

            width: 100%;

            border: 0;

            background: #198754;

            color: #fff;

            border-radius: 12px;

            padding: 15px;

            font-size: 17px;

            font-weight: 800;

            cursor: pointer;

            transition: .2s;

        }


        .confirm-order-btn:hover {

            background: #157347;

            transform: translateY(-1px);

        }


        .confirm-order-btn:disabled {

            opacity: .6;

            cursor: not-allowed;

            transform: none;

        }


        /*
        |--------------------------------------------------------------------------
        | Back Button
        |--------------------------------------------------------------------------
        */

        .back-cart-btn {

            width: 100%;

            border:
                1px solid #ddd;

            background: #fff;

            color: #444;

            border-radius: 12px;

            padding: 13px;

            font-size: 15px;

            font-weight: 700;

            margin-top: 10px;

            cursor: pointer;

        }


        /*
        |--------------------------------------------------------------------------
        | Empty
        |--------------------------------------------------------------------------
        */

        .empty-checkout {

            text-align: center;

            padding: 50px 20px;

        }


        .empty-checkout i {

            font-size: 60px;

            color: #bbb;

        }


        /*
        |--------------------------------------------------------------------------
        | Mobile
        |--------------------------------------------------------------------------
        */

        @media (max-width: 850px) {

            .checkout-grid {

                grid-template-columns: 1fr;

            }


            .checkout-page {

                padding:
                    25px 12px 40px;

            }


            .checkout-header h1 {

                font-size: 25px;

            }

        }


        @media (max-width: 500px) {

            .checkout-card {

                padding: 18px;

                border-radius: 14px;

            }


            .checkout-product-image {

                width: 60px;

                height: 60px;

            }


            .checkout-product-total {

                font-size: 13px;

            }

        }

    </style>

</head>


<body>


<div class="checkout-page">


    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <div class="checkout-header">

        <h1>
            إتمام الطلب
        </h1>

        <p>
            راجع بياناتك وتفاصيل طلبك قبل الإرسال
        </p>

    </div>


    {{-- =========================================================
         CHECKOUT
    ========================================================== --}}

    <div
        id="checkoutContent"
        class="checkout-grid"
    >


        {{-- =====================================================
             بيانات العميل
        ====================================================== --}}

        <div>


            <div class="checkout-card">

                <div class="checkout-card-title">

                    <i class="bi bi-person-circle"></i>

                    بيانات العميل

                </div>


                <div class="form-group">

                    <label for="checkoutName">

                        الاسم بالكامل

                    </label>

                    <input
                        type="text"
                        id="checkoutName"
                        class="form-control"
                        placeholder="اكتب اسمك بالكامل"
                    >

                </div>


                <div class="form-group">

                    <label for="checkoutPhone">

                        رقم الهاتف

                    </label>

                    <input
                        type="tel"
                        id="checkoutPhone"
                        class="form-control"
                        placeholder="01xxxxxxxxx"
                    >

                </div>


                <div class="form-group">

                    <label for="checkoutAddress">

                        عنوان التوصيل

                    </label>

                    <textarea
                        id="checkoutAddress"
                        class="form-control"
                        placeholder="اكتب عنوان التوصيل بالتفصيل"
                    ></textarea>

                </div>

            </div>


            {{-- =================================================
                 المنتجات
            ================================================== --}}

            <div class="checkout-card">

                <div class="checkout-card-title">

                    <i class="bi bi-bag-check"></i>

                    تفاصيل الطلب

                </div>


                <div id="checkoutProducts"></div>

            </div>


        </div>


        {{-- =====================================================
             ملخص الطلب
        ====================================================== --}}

        <div>


            <div class="checkout-card">

                <div class="checkout-card-title">

                    <i class="bi bi-receipt"></i>

                    ملخص الطلب

                </div>


                <div class="summary-row">

                    <span>
                        عدد المنتجات
                    </span>

                    <strong id="checkoutQuantity">
                        0
                    </strong>

                </div>


                <div class="summary-row">

                    <span>
                        إجمالي المنتجات
                    </span>

                    <strong>

                        <span id="checkoutSubtotal">
                            0.00
                        </span>

                        جنيه

                    </strong>

                </div>


                <div class="summary-row total">

                    <span>
                        الإجمالي
                    </span>

                    <strong>

                        <span id="checkoutTotal">
                            0.00
                        </span>

                        جنيه

                    </strong>

                </div>


                <button
                    type="button"
                    id="confirmOrder"
                    class="confirm-order-btn"
                >

                    <i class="bi bi-whatsapp"></i>

                    تأكيد وإرسال الطلب

                </button>


                <button
                    type="button"
                    id="backToCart"
                    class="back-cart-btn"
                >

                    <i class="bi bi-arrow-right"></i>

                    العودة للسلة

                </button>

            </div>


        </div>


    </div>


</div>


<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {


        /*
        |--------------------------------------------------------------------------
        | الإعدادات
        |--------------------------------------------------------------------------
        */

        const WHATSAPP_NUMBER =
            '201111402160';


        const CART_KEY =
            'otad_misr_cart';


        const CUSTOMER_KEY =
            'otad_checkout_customer';


        /*
        |--------------------------------------------------------------------------
        | قراءة السلة
        |--------------------------------------------------------------------------
        */

        function getCart() {

            try {

                const cart =
                    JSON.parse(
                        localStorage.getItem(
                            CART_KEY
                        ) || '[]'
                    );


                return Array.isArray(cart)
                    ? cart
                    : [];

            } catch (error) {

                console.error(
                    'Cart Error:',
                    error
                );

                return [];

            }

        }


        /*
        |--------------------------------------------------------------------------
        | قراءة بيانات العميل
        |--------------------------------------------------------------------------
        */

        function getCustomer() {

            try {

                const customer =
                    JSON.parse(
                        localStorage.getItem(
                            CUSTOMER_KEY
                        ) || '{}'
                    );


                return customer || {};

            } catch (error) {

                return {};

            }

        }


        /*
        |--------------------------------------------------------------------------
        | تنسيق السعر
        |--------------------------------------------------------------------------
        */

        function formatPrice(price) {

            return Number(
                price || 0
            ).toLocaleString(
                'ar-EG',
                {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }
            );

        }


        /*
        |--------------------------------------------------------------------------
        | HTML Escape
        |--------------------------------------------------------------------------
        */

        function escapeHtml(value) {

            const div =
                document.createElement(
                    'div'
                );


            div.textContent =
                value ?? '';


            return div.innerHTML;

        }


        /*
        |--------------------------------------------------------------------------
        | البيانات
        |--------------------------------------------------------------------------
        */

        const cart =
            getCart();


        const customer =
            getCustomer();


        /*
        |--------------------------------------------------------------------------
        | التأكد من السلة
        |--------------------------------------------------------------------------
        */

        if (!cart.length) {

            document.getElementById(
                'checkoutContent'
            ).innerHTML = `

                <div
                    class="checkout-card empty-checkout"
                    style="grid-column:1/-1;"
                >

                    <i class="bi bi-cart-x"></i>

                    <h3 class="mt-3">
                        السلة فارغة
                    </h3>

                    <p class="text-muted">
                        لا يوجد أي منتج لإتمام الطلب.
                    </p>

                    <button
                        type="button"
                        id="emptyBackHome"
                        class="btn btn-success"
                    >

                        العودة للمتجر

                    </button>

                </div>

            `;


            document.getElementById(
                'emptyBackHome'
            ).addEventListener(
                'click',
                function () {

                    window.location.href =
                        '/';

                }
            );


            return;

        }


        /*
        |--------------------------------------------------------------------------
        | وضع بيانات العميل
        |--------------------------------------------------------------------------
        */

        document.getElementById(
            'checkoutName'
        ).value =
            customer.name || '';


        document.getElementById(
            'checkoutPhone'
        ).value =
            customer.phone || '';


        document.getElementById(
            'checkoutAddress'
        ).value =
            customer.address || '';


        /*
        |--------------------------------------------------------------------------
        | رسم المنتجات
        |--------------------------------------------------------------------------
        */

        const productsContainer =
            document.getElementById(
                'checkoutProducts'
            );


        let total = 0;

        let totalQuantity = 0;


        productsContainer.innerHTML =
            cart.map(
                function (item) {


                    const price =
                        Number(
                            item.price || 0
                        );


                    const quantity =
                        Number(
                            item.quantity || 0
                        );


                    const itemTotal =
                        price * quantity;


                    total +=
                        itemTotal;


                    totalQuantity +=
                        quantity;


                    return `

                        <div
                            class="checkout-product"
                        >


                            <div
                                class="checkout-product-image"
                            >

                                ${
                                    item.image

                                    ? `

                                        <img
                                            src="${escapeHtml(item.image)}"
                                            alt="${escapeHtml(item.name)}"
                                        >

                                    `

                                    : `

                                        <div
                                            class="checkout-product-no-image"
                                        >

                                            <i
                                                class="bi bi-image"
                                            ></i>

                                        </div>

                                    `
                                }

                            </div>


                            <div
                                class="checkout-product-info"
                            >

                                <div
                                    class="checkout-product-name"
                                >

                                    ${escapeHtml(
                                        item.name
                                    )}

                                </div>


                                <div
                                    class="checkout-product-meta"
                                >

                                    السعر:
                                    ${formatPrice(price)}
                                    جنيه

                                    <br>

                                    الكمية:
                                    ${quantity}

                                </div>

                            </div>


                            <div
                                class="checkout-product-total"
                            >

                                ${formatPrice(itemTotal)}

                                جنيه

                            </div>


                        </div>

                    `;

                }
            ).join('');


        /*
        |--------------------------------------------------------------------------
        | الملخص
        |--------------------------------------------------------------------------
        */

        document.getElementById(
            'checkoutQuantity'
        ).textContent =
            totalQuantity;


        document.getElementById(
            'checkoutSubtotal'
        ).textContent =
            formatPrice(total);


        document.getElementById(
            'checkoutTotal'
        ).textContent =
            formatPrice(total);


        /*
        |--------------------------------------------------------------------------
        | العودة للسلة
        |--------------------------------------------------------------------------
        */

        document.getElementById(
            'backToCart'
        ).addEventListener(
            'click',
            function () {

                window.location.href =
                    '/';

            }
        );


        /*
        |--------------------------------------------------------------------------
        | تأكيد الطلب
        |--------------------------------------------------------------------------
        */

        document.getElementById(
            'confirmOrder'
        ).addEventListener(
            'click',
            function () {


                /*
                |--------------------------------------------------------------------------
                | قراءة البيانات الحالية
                |--------------------------------------------------------------------------
                */

                const name =
                    document.getElementById(
                        'checkoutName'
                    ).value.trim();


                const phone =
                    document.getElementById(
                        'checkoutPhone'
                    ).value.trim();


                const address =
                    document.getElementById(
                        'checkoutAddress'
                    ).value.trim();


                /*
                |--------------------------------------------------------------------------
                | التحقق
                |--------------------------------------------------------------------------
                */

                if (!name) {

                    alert(
                        'من فضلك اكتب الاسم.'
                    );

                    document.getElementById(
                        'checkoutName'
                    ).focus();

                    return;

                }


                if (!phone) {

                    alert(
                        'من فضلك اكتب رقم الهاتف.'
                    );

                    document.getElementById(
                        'checkoutPhone'
                    ).focus();

                    return;

                }


                if (!address) {

                    alert(
                        'من فضلك اكتب عنوان التوصيل.'
                    );

                    document.getElementById(
                        'checkoutAddress'
                    ).focus();

                    return;

                }


                /*
                |--------------------------------------------------------------------------
                | حفظ البيانات الأخيرة
                |--------------------------------------------------------------------------
                */

                const finalCustomer = {

                    name: name,

                    phone: phone,

                    address: address

                };


                localStorage.setItem(
                    CUSTOMER_KEY,
                    JSON.stringify(
                        finalCustomer
                    )
                );


                /*
                |--------------------------------------------------------------------------
                | بناء رسالة واتساب
                |--------------------------------------------------------------------------
                */

                let message =
                    '*🛒 طلب جديد من موقع أوتاد مصر*';


                message +=
                    '\n\n';


                message +=
                    '*👤 بيانات العميل*';


                message +=
                    '\nالاسم: ' +
                    name;


                message +=
                    '\nالهاتف: ' +
                    phone;


                message +=
                    '\nالعنوان: ' +
                    address;


                message +=
                    '\n\n';


                message +=
                    '*📦 المنتجات*';


                message +=
                    '\n';


                let quantity =
                    0;


                cart.forEach(
                    function (item, index) {


                        const price =
                            Number(
                                item.price || 0
                            );


                        const itemQuantity =
                            Number(
                                item.quantity || 0
                            );


                        const itemTotal =
                            price *
                            itemQuantity;


                        quantity +=
                            itemQuantity;


                        message +=
                            '\n' +
                            (index + 1) +
                            '. ' +
                            item.name;


                        message +=
                            '\nالسعر: ' +
                            formatPrice(price) +
                            ' جنيه';


                        message +=
                            '\nالكمية: ' +
                            itemQuantity;


                        message +=
                            '\nالإجمالي: ' +
                            formatPrice(itemTotal) +
                            ' جنيه';


                        message +=
                            '\n';

                    }
                );


                message +=
                    '\n--------------------';


                message +=
                    '\n*عدد المنتجات: ' +
                    quantity +
                    '*';


                message +=
                    '\n*الإجمالي الكلي: ' +
                    formatPrice(total) +
                    ' جنيه*';


                message +=
                    '\n\n';


                message +=
                    'تم إرسال الطلب من موقع أوتاد مصر.';


                /*
                |--------------------------------------------------------------------------
                | إنشاء رابط واتساب
                |--------------------------------------------------------------------------
                */

                const whatsappUrl =
                    'https://wa.me/' +
                    WHATSAPP_NUMBER +
                    '?text=' +
                    encodeURIComponent(
                        message
                    );


                /*
                |--------------------------------------------------------------------------
                | فتح واتساب
                |--------------------------------------------------------------------------
                */

                window.open(
                    whatsappUrl,
                    '_blank'
                );


                /*
                |--------------------------------------------------------------------------
                | تفريغ السلة
                |--------------------------------------------------------------------------
                */

                localStorage.removeItem(
                    CART_KEY
                );


                /*
                |--------------------------------------------------------------------------
                | تنظيف بيانات العميل
                |--------------------------------------------------------------------------
                */

                localStorage.removeItem(
                    CUSTOMER_KEY
                );

            }
        );

    }

);

</script>


</body>

</html>