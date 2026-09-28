@extends('layouts.app')

@section('title', 'شارك استور | أفضل مكان لإكسسوارات الموبايلات في منية النصر')

@section('content')

<style>
    /* =========================================
       SHAREK STORE - MODERN ABOUT SECTION
    ========================================= */

    .sharek-about {
        position: relative;
        padding: 80px 0;
        overflow: hidden;
        background:
            radial-gradient(circle at 10% 20%, rgba(13, 110, 253, .08), transparent 30%),
            radial-gradient(circle at 90% 80%, rgba(25, 135, 84, .06), transparent 30%),
            #fff;
    }

    .sharek-about::before {
        content: "";
        position: absolute;
        width: 450px;
        height: 450px;
        border: 1px solid rgba(13, 110, 253, .10);
        border-radius: 50%;
        top: -200px;
        right: -150px;
    }

    .sharek-about::after {
        content: "";
        position: absolute;
        width: 350px;
        height: 350px;
        border: 1px solid rgba(13, 110, 253, .07);
        border-radius: 50%;
        bottom: -180px;
        left: -150px;
    }

    /* =========================================
       IMAGE
    ========================================= */

    .sharek-image-box {
        position: relative;
        padding: 20px;
    }

    .sharek-image-box::before {
        content: "";
        position: absolute;
        width: 85%;
        height: 85%;
        background: #0d6efd;
        border-radius: 30px;
        top: 0;
        right: 0;
        z-index: 0;
        transform: rotate(5deg);
    }

    .sharek-image-box::after {
        content: "";
        position: absolute;
        width: 120px;
        height: 120px;
        border: 12px solid #20c997;
        border-radius: 50%;
        bottom: -25px;
        left: -25px;
        z-index: 0;
    }

    .sharek-image {
        position: relative;
        z-index: 2;
        width: 100%;
        height: 470px;
        object-fit: cover;
        border-radius: 30px;
        box-shadow: 0 25px 60px rgba(13, 110, 253, .20);
    }

    .sharek-badge {
        position: absolute;
        z-index: 5;
        bottom: 45px;
        right: -5px;
        background: #fff;
        padding: 18px 25px;
        border-radius: 18px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, .12);
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .sharek-badge i {
        width: 45px;
        height: 45px;
        background: #0d6efd;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        font-size: 22px;
    }

    .sharek-badge strong {
        display: block;
        color: #142033;
        font-size: 16px;
    }

    .sharek-badge span {
        color: #777;
        font-size: 13px;
    }

    /* =========================================
       CONTENT
    ========================================= */

    .sharek-content {
        padding: 20px 10px;
    }

    .sharek-label {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: #0d6efd;
        font-weight: 700;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .sharek-label span {
        width: 35px;
        height: 2px;
        background: #0d6efd;
        display: inline-block;
    }

    .sharek-title {
        color: #142033;
        font-size: 42px;
        line-height: 1.35;
        font-weight: 800;
        margin-bottom: 20px;
    }

    .sharek-title span {
        color: #0d6efd;
    }

    .sharek-description {
        color: #666;
        line-height: 2;
        font-size: 16px;
        margin-bottom: 25px;
    }

    /* =========================================
       TABS
    ========================================= */

    .sharek-tabs {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 25px;
    }

    .sharek-tabs .nav-link {
        color: #142033;
        background: #f5f7f9;
        border: 1px solid #e9edf1;
        border-radius: 12px;
        padding: 10px 20px;
        font-weight: 700;
        transition: .3s;
    }

    .sharek-tabs .nav-link:hover,
    .sharek-tabs .nav-link.active {
        color: #fff;
        background: #0d6efd;
        border-color: #0d6efd;
        box-shadow: 0 8px 20px rgba(13, 110, 253, .18);
    }

    .sharek-tab-text {
        color: #666;
        line-height: 2;
        margin-bottom: 20px;
    }

    .sharek-feature {
        display: flex;
        align-items: flex-start;
        gap: 13px;
        margin-top: 20px;
    }

    .sharek-feature-icon {
        min-width: 38px;
        height: 38px;
        background: rgba(13, 110, 253, .10);
        color: #0d6efd;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
    }

    .sharek-feature h4 {
        color: #142033;
        font-size: 17px;
        font-weight: 800;
        margin: 0 0 5px;
    }

    .sharek-feature p {
        color: #777;
        font-size: 14px;
        line-height: 1.8;
        margin: 0;
    }

    /* =========================================
       SERVICES
    ========================================= */

    .sharek-services {
        padding-top: 80px;
        position: relative;
        z-index: 3;
    }

    .sharek-section-heading {
        text-align: center;
        margin-bottom: 55px;
    }

    .sharek-section-heading .small-title {
        color: #0d6efd;
        font-weight: 800;
        font-size: 14px;
        letter-spacing: 1px;
        margin-bottom: 10px;
    }

    .sharek-section-heading h2 {
        color: #142033;
        font-size: 38px;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .sharek-section-heading p {
        max-width: 650px;
        margin: auto;
        color: #777;
        line-height: 1.9;
    }

    /* =========================================
       SERVICE CARD
    ========================================= */

    .sharek-card {
        position: relative;
        height: 100%;
        background: #fff;
        border: 1px solid #edf0f2;
        border-radius: 25px;
        padding: 35px 30px;
        overflow: hidden;
        transition: .4s ease;
        box-shadow: 0 10px 35px rgba(13, 110, 253, .06);
    }

    .sharek-card::before {
        content: "";
        position: absolute;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: rgba(13, 110, 253, .06);
        top: -55px;
        left: -45px;
        transition: .4s;
    }

    .sharek-card:hover {
        transform: translateY(-12px);
        border-color: rgba(13, 110, 253, .30);
        box-shadow: 0 25px 55px rgba(13, 110, 253, .12);
    }

    .sharek-card:hover::before {
        transform: scale(2);
    }

    .sharek-card-icon {
        position: relative;
        width: 65px;
        height: 65px;
        background: #0d6efd;
        color: #fff;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        margin-bottom: 25px;
        box-shadow: 0 12px 25px rgba(13, 110, 253, .18);
        transition: .4s;
    }

    .sharek-card:hover .sharek-card-icon {
        background: #20c997;
        transform: rotate(-5deg) scale(1.08);
    }

    .sharek-card h4 {
        position: relative;
        color: #142033;
        font-size: 20px;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .sharek-card p {
        position: relative;
        color: #777;
        line-height: 1.9;
        font-size: 14px;
        margin-bottom: 0;
    }

    .sharek-card-number {
        position: absolute;
        left: 25px;
        bottom: 15px;
        font-size: 55px;
        font-weight: 900;
        color: rgba(13, 110, 253, .035);
    }

    /* =========================================
       CONTACT BUTTON
    ========================================= */

    .sharek-contact-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #0d6efd;
        color: #fff;
        text-decoration: none;
        padding: 12px 22px;
        border-radius: 12px;
        font-weight: 700;
        margin-top: 18px;
        transition: .3s;
    }

    .sharek-contact-btn:hover {
        background: #20c997;
        color: #fff;
        transform: translateY(-3px);
    }

    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 991px) {

        .sharek-title {
            font-size: 34px;
        }

        .sharek-image {
            height: 400px;
        }

        .sharek-content {
            padding-top: 45px;
        }
    }

    @media (max-width: 575px) {

        .sharek-about {
            padding: 50px 0;
        }

        .sharek-title {
            font-size: 29px;
        }

        .sharek-image {
            height: 330px;
        }

        .sharek-badge {
            right: 10px;
            bottom: 25px;
            padding: 12px 15px;
        }

        .sharek-section-heading h2 {
            font-size: 29px;
        }

        .sharek-card {
            padding: 28px 23px;
        }
    }
</style>


<section class="sharek-about">

    <div class="container">

        <div class="row align-items-center g-5">

            {{-- الصورة --}}
            <div class="col-lg-5" data-aos="fade-left">

                <div class="sharek-image-box">

                    <img
                        src="{{ asset('assets/img/aqar.jpg') }}"
                        class="sharek-image"
                        alt="شارك استور - إكسسوارات الموبايلات في منية النصر"
                    >

                    <div class="sharek-badge">

                        <i class="bi bi-phone"></i>

                        <div>
                            <strong>شارك استور</strong>
                            <span>إكسسوارات الموبايلات</span>
                        </div>

                    </div>

                </div>

            </div>


            {{-- المحتوى --}}
            <div class="col-lg-7" data-aos="fade-right">

                <div class="sharek-content">

                    <div class="sharek-label">
                        <span></span>
                        شارك استور - منية النصر
                    </div>


                    <h2 class="sharek-title">

                        أفضل مكان في
                        <span>منية النصر</span>
                        لإكسسوارات الموبايلات

                    </h2>


                    <p class="sharek-description">

                        اكتشف تشكيلة مميزة من إكسسوارات الموبايلات
                        من شواحن وكابلات وسماعات وجرابات وواقيات شاشة
                        بجودة عالية وأسعار مناسبة.

                    </p>


                    {{-- Tabs --}}
                    <ul class="nav sharek-tabs" role="tablist">

                        <li class="nav-item">

                            <a class="nav-link active"
                               data-bs-toggle="pill"
                               href="#sharek-about-tab1">

                                عن شارك استور

                            </a>

                        </li>


                        <li class="nav-item">

                            <a class="nav-link"
                               data-bs-toggle="pill"
                               href="#sharek-about-tab2">

                                رؤيتنا

                            </a>

                        </li>


                        <li class="nav-item">

                            <a class="nav-link"
                               data-bs-toggle="pill"
                               href="#sharek-about-tab3">

                                لماذا نحن؟

                            </a>

                        </li>

                    </ul>


                    <div class="tab-content">


                        {{-- عن المتجر --}}
                        <div class="tab-pane fade show active"
                             id="sharek-about-tab1">

                            <p class="sharek-tab-text">

                                في شارك استور نوفر لك تشكيلة متنوعة من إكسسوارات
                                الموبايلات التي تحتاجها للاستخدام اليومي، مع الاهتمام
                                بالجودة وتقديم منتجات عملية بأسعار مناسبة.

                            </p>


                            <div class="sharek-feature">

                                <div class="sharek-feature-icon">
                                    <i class="bi bi-lightning-charge"></i>
                                </div>

                                <div>

                                    <h4>شواحن وكابلات</h4>

                                    <p>
                                        مجموعة متنوعة من الشواحن والكابلات
                                        المناسبة لمختلف أنواع الهواتف والأجهزة.
                                    </p>

                                </div>

                            </div>


                            <div class="sharek-feature">

                                <div class="sharek-feature-icon">
                                    <i class="bi bi-headphones"></i>
                                </div>

                                <div>

                                    <h4>سماعات وإكسسوارات</h4>

                                    <p>
                                        سماعات وإكسسوارات مميزة للاستخدام اليومي
                                        بجودة مناسبة وأسعار تنافسية.
                                    </p>

                                </div>

                            </div>


                            <div class="sharek-feature">

                                <div class="sharek-feature-icon">
                                    <i class="bi bi-phone"></i>
                                </div>

                                <div>

                                    <h4>جرابات وواقيات شاشة</h4>

                                    <p>
                                        جرابات وواقيات شاشة تساعد على حماية هاتفك
                                        والحفاظ عليه بمظهر أنيق.
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- رؤيتنا --}}
                        <div class="tab-pane fade"
                             id="sharek-about-tab2">

                            <p class="sharek-tab-text">

                                نطمح لأن يكون شارك استور من الأماكن المفضلة
                                لشراء إكسسوارات الموبايلات في منية النصر،
                                من خلال توفير منتجات متنوعة وخدمة شراء سهلة ومريحة.

                            </p>


                            <div class="sharek-feature">

                                <div class="sharek-feature-icon">
                                    <i class="bi bi-gem"></i>
                                </div>

                                <div>

                                    <h4>جودة تستحق الثقة</h4>

                                    <p>
                                        نهتم باختيار منتجات عملية بجودة جيدة
                                        تناسب الاستخدام اليومي.
                                    </p>

                                </div>

                            </div>


                            <div class="sharek-feature">

                                <div class="sharek-feature-icon">
                                    <i class="bi bi-grid"></i>
                                </div>

                                <div>

                                    <h4>تشكيلة متنوعة</h4>

                                    <p>
                                        نوفر مجموعة متنوعة من الإكسسوارات
                                        لتجد ما يناسب هاتفك واحتياجاتك.
                                    </p>

                                </div>

                            </div>


                            <div class="sharek-feature">

                                <div class="sharek-feature-icon">
                                    <i class="bi bi-people"></i>
                                </div>

                                <div>

                                    <h4>العميل أولًا</h4>

                                    <p>
                                        نهتم بتقديم تجربة شراء سهلة ومساعدة
                                        العميل في اختيار المنتج المناسب.
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- لماذا نحن --}}
                        <div class="tab-pane fade"
                             id="sharek-about-tab3">

                            <p class="sharek-tab-text">

                                لأننا نهتم بتوفير إكسسوارات الموبايلات التي
                                تحتاجها في مكان واحد، مع خيارات متنوعة وأسعار مناسبة
                                لسكان منية النصر والمناطق المحيطة.

                            </p>


                            <div class="sharek-feature">

                                <div class="sharek-feature-icon">
                                    <i class="bi bi-shield-check"></i>
                                </div>

                                <div>

                                    <h4>منتجات بجودة عالية</h4>

                                    <p>
                                        نحرص على توفير منتجات عملية ومناسبة
                                        للاستخدام اليومي.
                                    </p>

                                </div>

                            </div>


                            <div class="sharek-feature">

                                <div class="sharek-feature-icon">
                                    <i class="bi bi-tags"></i>
                                </div>

                                <div>

                                    <h4>أسعار مناسبة</h4>

                                    <p>
                                        نوفر اختيارات متعددة بأسعار مناسبة
                                        لمختلف احتياجات العملاء.
                                    </p>

                                </div>

                            </div>


                            <div class="sharek-feature">

                                <div class="sharek-feature-icon">
                                    <i class="bi bi-headset"></i>
                                </div>

                                <div>

                                    <h4>خدمة تساعدك</h4>

                                    <p>
                                        نساعدك في معرفة تفاصيل المنتجات
                                        واختيار الإكسسوار المناسب لهاتفك.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================
             المنتجات
        ========================================== --}}

        <div class="sharek-services">

            <div class="sharek-section-heading"
                 data-aos="fade-up">

                <div class="small-title">
                    ماذا نقدم؟
                </div>

                <h2>
                    كل إكسسوارات الموبايلات في مكان واحد
                </h2>

                <p>
                    اكتشف تشكيلة متنوعة من إكسسوارات الموبايلات في شارك استور
                    من الشواحن والكابلات إلى السماعات والجرابات وواقيات الشاشة.
                </p>

            </div>


            <div class="row g-4">


                {{-- الشواحن --}}
                <div class="col-lg-6 col-md-6"
                     data-aos="fade-up"
                     data-aos-delay="100">

                    <div class="sharek-card">

                        <div class="sharek-card-icon">
                            <i class="bi bi-lightning-charge"></i>
                        </div>

                        <h4>
                            شواحن الموبايلات
                        </h4>

                        <p>
                            تشكيلة من الشواحن المناسبة لمختلف أنواع الهواتف
                            والأجهزة للاستخدام اليومي.
                        </p>

                        <span class="sharek-card-number">
                            01
                        </span>

                    </div>

                </div>


                {{-- الكابلات --}}
                <div class="col-lg-6 col-md-6"
                     data-aos="fade-up"
                     data-aos-delay="200">

                    <div class="sharek-card">

                        <div class="sharek-card-icon">
                            <i class="bi bi-usb-plug"></i>
                        </div>

                        <h4>
                            الكابلات
                        </h4>

                        <p>
                            كابلات متنوعة للشحن ونقل البيانات ومتوافقة
                            مع العديد من الهواتف والأجهزة.
                        </p>

                        <span class="sharek-card-number">
                            02
                        </span>

                    </div>

                </div>


                {{-- السماعات --}}
                <div class="col-lg-6 col-md-6"
                     data-aos="fade-up"
                     data-aos-delay="300">

                    <div class="sharek-card">

                        <div class="sharek-card-icon">
                            <i class="bi bi-headphones"></i>
                        </div>

                        <h4>
                            السماعات
                        </h4>

                        <p>
                            سماعات متنوعة للاستماع إلى الموسيقى والمكالمات
                            والاستخدام اليومي.
                        </p>

                        <span class="sharek-card-number">
                            03
                        </span>

                    </div>

                </div>


                {{-- الجرابات --}}
                <div class="col-lg-6 col-md-6"
                     data-aos="fade-up"
                     data-aos-delay="400">

                    <div class="sharek-card">

                        <div class="sharek-card-icon">
                            <i class="bi bi-phone"></i>
                        </div>

                        <h4>
                            جرابات الموبايلات
                        </h4>

                        <p>
                            جرابات بأشكال وتصميمات متنوعة لحماية هاتفك
                            وإضافة لمسة مميزة لمظهره.
                        </p>

                        <span class="sharek-card-number">
                            04
                        </span>

                    </div>

                </div>


                {{-- واقيات الشاشة --}}
                <div class="col-lg-6 col-md-6"
                     data-aos="fade-up"
                     data-aos-delay="500">

                    <div class="sharek-card">

                        <div class="sharek-card-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>

                        <h4>
                            واقيات الشاشة
                        </h4>

                        <p>
                            واقيات شاشة تساعد على حماية شاشة هاتفك من الخدوش
                            والاستخدام اليومي.
                        </p>

                        <span class="sharek-card-number">
                            05
                        </span>

                    </div>

                </div>


                {{-- خدمة العملاء --}}
                <div class="col-lg-6 col-md-6"
                     data-aos="fade-up"
                     data-aos-delay="600">

                    <div class="sharek-card">

                        <div class="sharek-card-icon">
                            <i class="bi bi-headset"></i>
                        </div>

                        <h4>
                            خدمة العملاء
                        </h4>

                        <p>
                            فريقنا جاهز لمساعدتك في معرفة تفاصيل المنتجات
                            واختيار إكسسوارات الموبايل المناسبة لهاتفك.
                        </p>

                        <a href="tel:+201022558536"
                           class="sharek-contact-btn">

                            <i class="bi bi-telephone-fill"></i>

                            اتصل بنا الآن

                        </a>

                        <span class="sharek-card-number">
                            06
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
 
