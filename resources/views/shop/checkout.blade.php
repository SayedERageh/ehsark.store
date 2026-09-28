@extends('layouts.app')

@section('title', 'إتمام الطلب | شارك استور')

@section('content')

<div class="container py-5" dir="rtl">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4 p-lg-5">

                    <h3 class="fw-bold mb-4">

                        <i class="bi bi-whatsapp ms-2 text-success"></i>

                        بيانات الطلب

                    </h3>


                    <div
                        id="checkout-error"
                        class="alert alert-danger d-none">
                    </div>


                    <form id="checkout-form">

                        <div class="row g-3">

                            <div class="col-md-6">

                                <label class="form-label">
                                    الاسم الأول
                                </label>

                                <input
                                    type="text"
                                    id="first_name"
                                    class="form-control"
                                    required>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    اسم العائلة
                                </label>

                                <input
                                    type="text"
                                    id="last_name"
                                    class="form-control">

                            </div>


                            <div class="col-12">

                                <label class="form-label">
                                    رقم الهاتف
                                </label>

                                <input
                                    type="tel"
                                    id="phone"
                                    class="form-control"
                                    required>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    المحافظة
                                </label>

                                <input
                                    type="text"
                                    id="governorate"
                                    class="form-control"
                                    required>

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    المدينة
                                </label>

                                <input
                                    type="text"
                                    id="city"
                                    class="form-control"
                                    required>

                            </div>


                            <div class="col-12">

                                <label class="form-label">
                                    المنطقة
                                </label>

                                <input
                                    type="text"
                                    id="area"
                                    class="form-control">

                            </div>


                            <div class="col-12">

                                <label class="form-label">
                                    العنوان بالتفصيل
                                </label>

                                <textarea
                                    id="address"
                                    class="form-control"
                                    rows="3"
                                    required></textarea>

                            </div>

                        </div>


                        <div class="border-top mt-4 pt-4">

                            <div
                                class="d-flex justify-content-between mb-3">

                                <span class="fw-bold">
                                    إجمالي الطلب
                                </span>

                                <strong
                                    id="checkout-total"
                                    class="text-primary">

                                    0.00 ج.م

                                </strong>

                            </div>


                            <button
                                type="submit"
                                class="btn btn-success w-100 rounded-pill py-3">

                                <i class="bi bi-whatsapp ms-2"></i>

                                إرسال الطلب عبر واتساب

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


@include('shop.partials.cart-script')


<script>

document.addEventListener(
    'DOMContentLoaded',
    function() {


        const cart = getCart();


        /*
        |--------------------------------------------------------------------------
        | لو العربية فاضية
        |--------------------------------------------------------------------------
        */

        if (!cart.length) {

            window.location.href =
                "{{ route('cart.index') }}";

            return;

        }


        /*
        |--------------------------------------------------------------------------
        | الإجمالي
        |--------------------------------------------------------------------------
        */

        document.getElementById(
            'checkout-total'
        ).textContent =

            getCartTotal().toLocaleString(
                'ar-EG',
                {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }
            ) + ' ج.م';


        /*
        |--------------------------------------------------------------------------
        | إرسال واتساب
        |--------------------------------------------------------------------------
        */

        document
            .getElementById('checkout-form')
            .addEventListener(
                'submit',
                function(event) {

                    event.preventDefault();


                    const firstName =
                        document
                            .getElementById('first_name')
                            .value
                            .trim();


                    const lastName =
                        document
                            .getElementById('last_name')
                            .value
                            .trim();


                    const phone =
                        document
                            .getElementById('phone')
                            .value
                            .trim();


                    const governorate =
                        document
                            .getElementById('governorate')
                            .value
                            .trim();


                    const city =
                        document
                            .getElementById('city')
                            .value
                            .trim();


                    const area =
                        document
                            .getElementById('area')
                            .value
                            .trim();


                    const address =
                        document
                            .getElementById('address')
                            .value
                            .trim();


                    /*
                    |--------------------------------------------------------------------------
                    | التحقق
                    |--------------------------------------------------------------------------
                    */

                    if (
                        !firstName ||
                        !phone ||
                        !governorate ||
                        !city ||
                        !address
                    ) {

                        const error =
                            document.getElementById(
                                'checkout-error'
                            );

                        error.textContent =
                            'من فضلك أكمل جميع البيانات المطلوبة.';

                        error.classList.remove('d-none');

                        return;

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | بناء رسالة واتساب
                    |--------------------------------------------------------------------------
                    */

                    let message =
                        '🛒 *طلب جديد - شارك استور*%0A%0A';


                    message +=
                        '👤 *بيانات العميل*%0A';

                    message +=
                        'الاسم: ' +
                        encodeURIComponent(
                            firstName + ' ' + lastName
                        ) +
                        '%0A';

                    message +=
                        'الهاتف: ' +
                        encodeURIComponent(phone) +
                        '%0A';

                    message +=
                        'المحافظة: ' +
                        encodeURIComponent(governorate) +
                        '%0A';

                    message +=
                        'المدينة: ' +
                        encodeURIComponent(city) +
                        '%0A';


                    if (area) {

                        message +=
                            'المنطقة: ' +
                            encodeURIComponent(area) +
                            '%0A';

                    }


                    message +=
                        'العنوان: ' +
                        encodeURIComponent(address) +
                        '%0A%0A';


                    message +=
                        '📦 *المنتجات*%0A';


                    cart.forEach(
                        function(item, index) {

                            const itemTotal =
                                Number(item.price) *
                                Number(item.quantity);


                            message +=

                                (index + 1) +
                                '. ' +

                                encodeURIComponent(
                                    item.name
                                ) +

                                '%0A';

                            message +=

                                'الكمية: ' +
                                item.quantity +

                                '%0A';

                            message +=

                                'السعر: ' +
                                encodeURIComponent(
                                    Number(item.price)
                                        .toLocaleString(
                                            'ar-EG',
                                            {
                                                minimumFractionDigits: 2,
                                                maximumFractionDigits: 2
                                            }
                                        )
                                ) +

                                ' ج.م%0A';

                            message +=

                                'الإجمالي: ' +
                                encodeURIComponent(
                                    itemTotal.toLocaleString(
                                        'ar-EG',
                                        {
                                            minimumFractionDigits: 2,
                                            maximumFractionDigits: 2
                                        }
                                    )
                                ) +

                                ' ج.م%0A%0A';

                        }
                    );


                    message +=
                        '💰 *الإجمالي النهائي:* ' +

                        encodeURIComponent(
                            getCartTotal().toLocaleString(
                                'ar-EG',
                                {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }
                            )
                        ) +

                        ' ج.م';


                    /*
                    |--------------------------------------------------------------------------
                    | رقم واتساب المتجر
                    |--------------------------------------------------------------------------
                    */

                    const whatsappNumber =
                        '201500035736';


                    const whatsappUrl =
                        'https://wa.me/' +
                        whatsappNumber +
                        '?text=' +
                        message;


                    /*
                    |--------------------------------------------------------------------------
                    | تفريغ العربية
                    |--------------------------------------------------------------------------
                    */

                    clearCart();


                    /*
                    |--------------------------------------------------------------------------
                    | فتح واتساب
                    |--------------------------------------------------------------------------
                    */

                    window.location.href =
                        whatsappUrl;

                }
            );

    }
);

</script>

@endsection