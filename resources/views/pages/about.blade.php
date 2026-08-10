@extends('layouts.app')

@section('title', 'أوتاد مصر | متجر الأدوات الصحية والسباكة')

@section('content')

<style>
    /* =========================================
       OTAD MASR - MODERN ABOUT SECTION
    ========================================= */

    .otad-about {
        position: relative;
        padding: 80px 0;
        overflow: hidden;
        background:
            radial-gradient(circle at 10% 20%, rgba(184, 134, 65, .10), transparent 30%),
            radial-gradient(circle at 90% 80%, rgba(15, 42, 68, .08), transparent 30%),
            #fff;
    }

    .otad-about::before {
        content: "";
        position: absolute;
        width: 450px;
        height: 450px;
        border: 1px solid rgba(184, 134, 65, .12);
        border-radius: 50%;
        top: -200px;
        right: -150px;
    }

    .otad-about::after {
        content: "";
        position: absolute;
        width: 350px;
        height: 350px;
        border: 1px solid rgba(15, 42, 68, .08);
        border-radius: 50%;
        bottom: -180px;
        left: -150px;
    }

    /* =========================================
       IMAGE
    ========================================= */

    .otad-image-box {
        position: relative;
        padding: 20px;
    }

    .otad-image-box::before {
        content: "";
        position: absolute;
        width: 85%;
        height: 85%;
        background: #0f2a44;
        border-radius: 30px;
        top: 0;
        right: 0;
        z-index: 0;
        transform: rotate(5deg);
    }

    .otad-image-box::after {
        content: "";
        position: absolute;
        width: 120px;
        height: 120px;
        border: 12px solid #b88641;
        border-radius: 50%;
        bottom: -25px;
        left: -25px;
        z-index: 0;
    }

    .otad-image {
        position: relative;
        z-index: 2;
        width: 100%;
        height: 470px;
        object-fit: cover;
        border-radius: 30px;
        box-shadow: 0 25px 60px rgba(15, 42, 68, .20);
    }

    .otad-badge {
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

    .otad-badge i {
        width: 45px;
        height: 45px;
        background: #b88641;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        font-size: 22px;
    }

    .otad-badge strong {
        display: block;
        color: #0f2a44;
        font-size: 16px;
    }

    .otad-badge span {
        color: #777;
        font-size: 13px;
    }

    /* =========================================
       CONTENT
    ========================================= */

    .otad-content {
        padding: 20px 10px;
    }

    .otad-label {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: #b88641;
        font-weight: 700;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .otad-label span {
        width: 35px;
        height: 2px;
        background: #b88641;
        display: inline-block;
    }

    .otad-title {
        color: #0f2a44;
        font-size: 42px;
        line-height: 1.35;
        font-weight: 800;
        margin-bottom: 20px;
    }

    .otad-title span {
        color: #b88641;
    }

    .otad-description {
        color: #666;
        line-height: 2;
        font-size: 16px;
        margin-bottom: 25px;
    }

    /* =========================================
       TABS
    ========================================= */

    .otad-tabs {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 25px;
    }

    .otad-tabs .nav-link {
        color: #0f2a44;
        background: #f5f7f9;
        border: 1px solid #e9edf1;
        border-radius: 12px;
        padding: 10px 20px;
        font-weight: 700;
        transition: .3s;
    }

    .otad-tabs .nav-link:hover,
    .otad-tabs .nav-link.active {
        color: #fff;
        background: #0f2a44;
        border-color: #0f2a44;
        box-shadow: 0 8px 20px rgba(15, 42, 68, .18);
    }

    .otad-tab-text {
        color: #666;
        line-height: 2;
        margin-bottom: 20px;
    }

    .otad-feature {
        display: flex;
        align-items: flex-start;
        gap: 13px;
        margin-top: 20px;
    }

    .otad-feature-icon {
        min-width: 38px;
        height: 38px;
        background: rgba(184, 134, 65, .12);
        color: #b88641;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
    }

    .otad-feature h4 {
        color: #0f2a44;
        font-size: 17px;
        font-weight: 800;
        margin: 0 0 5px;
    }

    .otad-feature p {
        color: #777;
        font-size: 14px;
        line-height: 1.8;
        margin: 0;
    }

    /* =========================================
       SERVICES
    ========================================= */

    .otad-services {
        padding-top: 80px;
        position: relative;
        z-index: 3;
    }

    .otad-section-heading {
        text-align: center;
        margin-bottom: 55px;
    }

    .otad-section-heading .small-title {
        color: #b88641;
        font-weight: 800;
        font-size: 14px;
        letter-spacing: 1px;
        margin-bottom: 10px;
    }

    .otad-section-heading h2 {
        color: #0f2a44;
        font-size: 38px;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .otad-section-heading p {
        max-width: 650px;
        margin: auto;
        color: #777;
        line-height: 1.9;
    }

    /* =========================================
       SERVICE CARD
    ========================================= */

    .otad-card {
        position: relative;
        height: 100%;
        background: #fff;
        border: 1px solid #edf0f2;
        border-radius: 25px;
        padding: 35px 30px;
        overflow: hidden;
        transition: .4s ease;
        box-shadow: 0 10px 35px rgba(15, 42, 68, .06);
    }

    .otad-card::before {
        content: "";
        position: absolute;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: rgba(184, 134, 65, .07);
        top: -55px;
        left: -45px;
        transition: .4s;
    }

    .otad-card:hover {
        transform: translateY(-12px);
        border-color: rgba(184, 134, 65, .35);
        box-shadow: 0 25px 55px rgba(15, 42, 68, .12);
    }

    .otad-card:hover::before {
        transform: scale(2);
    }

    .otad-card-icon {
        position: relative;
        width: 65px;
        height: 65px;
        background: #0f2a44;
        color: #fff;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        margin-bottom: 25px;
        box-shadow: 0 12px 25px rgba(15, 42, 68, .18);
        transition: .4s;
    }

    .otad-card:hover .otad-card-icon {
        background: #b88641;
        transform: rotate(-5deg) scale(1.08);
    }

    .otad-card h4 {
        position: relative;
        color: #0f2a44;
        font-size: 20px;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .otad-card p {
        position: relative;
        color: #777;
        line-height: 1.9;
        font-size: 14px;
        margin-bottom: 0;
    }

    .otad-card-number {
        position: absolute;
        left: 25px;
        bottom: 15px;
        font-size: 55px;
        font-weight: 900;
        color: rgba(15, 42, 68, .035);
    }

    /* =========================================
       CONTACT BUTTON
    ========================================= */

    .otad-contact-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #b88641;
        color: #fff;
        text-decoration: none;
        padding: 12px 22px;
        border-radius: 12px;
        font-weight: 700;
        margin-top: 18px;
        transition: .3s;
    }

    .otad-contact-btn:hover {
        background: #0f2a44;
        color: #fff;
        transform: translateY(-3px);
    }

    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 991px) {
        .otad-title {
            font-size: 34px;
        }

        .otad-image {
            height: 400px;
        }

        .otad-content {
            padding-top: 45px;
        }
    }

    @media (max-width: 575px) {
        .otad-about {
            padding: 50px 0;
        }

        .otad-title {
            font-size: 29px;
        }

        .otad-image {
            height: 330px;
        }

        .otad-badge {
            right: 10px;
            bottom: 25px;
            padding: 12px 15px;
        }

        .otad-section-heading h2 {
            font-size: 29px;
        }

        .otad-card {
            padding: 28px 23px;
        }
    }
</style>


<section class="otad-about">

    <div class="container">

        <div class="row align-items-center g-5">

            {{-- الصورة --}}
            <div class="col-lg-5" data-aos="fade-left">

                <div class="otad-image-box">

                    <img
                        src="{{ asset('assets/img/aqar.jpg') }}"
                        class="otad-image"
                        alt="أوتاد مصر - متجر الأدوات الصحية والسباكة"
                    >

                    <div class="otad-badge">
                        <i class="bi bi-droplet-half"></i>

                        <div>
                            <strong>أوتاد مصر</strong>
                            <span>الأدوات الصحية والسباكة</span>
                        </div>
                    </div>

                </div>

            </div>


            {{-- المحتوى --}}
            <div class="col-lg-7" data-aos="fade-right">

                <div class="otad-content">

                    <div class="otad-label">
                        <span></span>
                        متجر أوتاد مصر
                    </div>

                    <h2 class="otad-title">
                        كل ما تحتاجه من
                        <span>الأدوات الصحية والسباكة</span>
                        في مكان واحد
                    </h2>

                    <p class="otad-description">
                        أوتاد مصر متجر متخصص في توفير الأدوات الصحية ومستلزمات السباكة
                        بجودة عالية وأسعار تنافسية، مع تشكيلة متنوعة تناسب المنازل
                        والمشروعات وأعمال التشطيب والصيانة.
                    </p>


                    {{-- Tabs --}}
                    <ul class="nav otad-tabs" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active"
                               data-bs-toggle="pill"
                               href="#otad-about-tab1">
                                عن أوتاد مصر
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                               data-bs-toggle="pill"
                               href="#otad-about-tab2">
                                رؤيتنا
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"
                               data-bs-toggle="pill"
                               href="#otad-about-tab3">
                                لماذا نحن؟
                            </a>
                        </li>

                    </ul>


                    <div class="tab-content">

                        {{-- عن المتجر --}}
                        <div class="tab-pane fade show active"
                             id="otad-about-tab1">

                            <p class="otad-tab-text">
                                في أوتاد مصر نوفر لك مجموعة متكاملة من الأدوات الصحية
                                ومستلزمات السباكة التي تحتاجها في أعمال التشطيب
                                والتجديد والصيانة، مع الاهتمام بالجودة وتوفير المنتجات
                                العملية التي تدوم لفترة طويلة.
                            </p>

                            <div class="otad-feature">

                                <div class="otad-feature-icon">
                                    <i class="bi bi-check-lg"></i>
                                </div>

                                <div>
                                    <h4>أدوات صحية متنوعة</h4>
                                    <p>
                                        تشكيلة من الأدوات الصحية والتجهيزات المناسبة
                                        للحمامات والمطابخ بمختلف التصميمات.
                                    </p>
                                </div>

                            </div>

                            <div class="otad-feature">

                                <div class="otad-feature-icon">
                                    <i class="bi bi-check-lg"></i>
                                </div>

                                <div>
                                    <h4>مستلزمات سباكة متكاملة</h4>
                                    <p>
                                        نوفر مستلزمات السباكة الأساسية التي تساعدك
                                        على تنفيذ أعمالك بسهولة وكفاءة.
                                    </p>
                                </div>

                            </div>

                            <div class="otad-feature">

                                <div class="otad-feature-icon">
                                    <i class="bi bi-check-lg"></i>
                                </div>

                                <div>
                                    <h4>اختيارات تناسب احتياجاتك</h4>
                                    <p>
                                        منتجات واختيارات متعددة تناسب الاستخدام المنزلي
                                        والمشروعات وأعمال التشطيب.
                                    </p>
                                </div>

                            </div>

                        </div>


                        {{-- رؤيتنا --}}
                        <div class="tab-pane fade"
                             id="otad-about-tab2">

                            <p class="otad-tab-text">
                                نطمح لأن تصبح أوتاد مصر من المتاجر الموثوقة في مجال
                                الأدوات الصحية والسباكة، من خلال توفير منتجات جيدة
                                وخدمة تساعد العميل على الوصول للاختيار المناسب.
                            </p>

                            <div class="otad-feature">

                                <div class="otad-feature-icon">
                                    <i class="bi bi-gem"></i>
                                </div>

                                <div>
                                    <h4>جودة تستحق الثقة</h4>
                                    <p>
                                        نهتم باختيار المنتجات التي تحقق الجودة
                                        والأداء المناسب للاستخدام.
                                    </p>
                                </div>

                            </div>

                            <div class="otad-feature">

                                <div class="otad-feature-icon">
                                    <i class="bi bi-graph-up-arrow"></i>
                                </div>

                                <div>
                                    <h4>تطور مستمر</h4>
                                    <p>
                                        نعمل باستمرار على تطوير المنتجات والخدمات
                                        ومواكبة احتياجات السوق.
                                    </p>
                                </div>

                            </div>

                            <div class="otad-feature">

                                <div class="otad-feature-icon">
                                    <i class="bi bi-people"></i>
                                </div>

                                <div>
                                    <h4>العميل أولًا</h4>
                                    <p>
                                        هدفنا تقديم تجربة شراء سهلة ومريحة
                                        ومساعدة العميل في اختيار ما يناسبه.
                                    </p>
                                </div>

                            </div>

                        </div>


                        {{-- لماذا نحن --}}
                        <div class="tab-pane fade"
                             id="otad-about-tab3">

                            <p class="otad-tab-text">
                                لأننا لا نبيع المنتجات فقط، بل نساعدك في الوصول إلى
                                المستلزمات المناسبة لأعمال السباكة والتشطيب والصيانة.
                            </p>

                            <div class="otad-feature">

                                <div class="otad-feature-icon">
                                    <i class="bi bi-shield-check"></i>
                                </div>

                                <div>
                                    <h4>منتجات بجودة عالية</h4>
                                    <p>
                                        نهتم بتوفير منتجات عملية ومناسبة للاستخدام.
                                    </p>
                                </div>

                            </div>

                            <div class="otad-feature">

                                <div class="otad-feature-icon">
                                    <i class="bi bi-tags"></i>
                                </div>

                                <div>
                                    <h4>أسعار تنافسية</h4>
                                    <p>
                                        نسعى لتوفير أسعار مناسبة لمختلف احتياجات العملاء.
                                    </p>
                                </div>

                            </div>

                            <div class="otad-feature">

                                <div class="otad-feature-icon">
                                    <i class="bi bi-headset"></i>
                                </div>

                                <div>
                                    <h4>خدمة تساعدك</h4>
                                    <p>
                                        نقدم المساعدة والإجابة عن استفساراتك قبل الشراء.
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================
             الخدمات والمنتجات
        ========================================== --}}

        <div class="otad-services">

            <div class="otad-section-heading"
                 data-aos="fade-up">

                <div class="small-title">
                    ماذا نقدم؟
                </div>

                <h2>
                    حلول متكاملة للسباكة والتشطيب
                </h2>

                <p>
                    كل ما تحتاجه لأعمال السباكة والأدوات الصحية في مجموعة
                    متكاملة من المنتجات والاختيارات.
                </p>

            </div>


            <div class="row g-4">


                {{-- الأدوات الصحية --}}
                <div class="col-lg-6 col-md-6"
                     data-aos="fade-up"
                     data-aos-delay="100">

                    <div class="otad-card">

                        <div class="otad-card-icon">
                            <i class="bi bi-droplet-half"></i>
                        </div>

                        <h4>
                            الأدوات الصحية
                        </h4>

                        <p>
                            نوفر مجموعة متنوعة من الأدوات الصحية والتجهيزات
                            للحمامات والمطابخ بتصميمات مختلفة تناسب احتياجاتك.
                        </p>

                        <span class="otad-card-number">
                            01
                        </span>

                    </div>

                </div>


                {{-- مستلزمات السباكة --}}
                <div class="col-lg-6 col-md-6"
                     data-aos="fade-up"
                     data-aos-delay="200">

                    <div class="otad-card">

                        <div class="otad-card-icon">
                            <i class="bi bi-tools"></i>
                        </div>

                        <h4>
                            مستلزمات السباكة
                        </h4>

                        <p>
                            كل ما تحتاجه من مستلزمات السباكة والتركيبات
                            اللازمة لأعمال التشطيب والصيانة والتجديد.
                        </p>

                        <span class="otad-card-number">
                            02
                        </span>

                    </div>

                </div>


                {{-- الخلاطات --}}
                <div class="col-lg-6 col-md-6"
                     data-aos="fade-up"
                     data-aos-delay="300">

                    <div class="otad-card">

                        <div class="otad-card-icon">
                            <i class="bi bi-water"></i>
                        </div>

                        <h4>
                            الخلاطات وتجهيزات المياه
                        </h4>

                        <p>
                            اختيارات متعددة من الخلاطات وتجهيزات المياه
                            التي تجمع بين الشكل العملي والتصميم العصري.
                        </p>

                        <span class="otad-card-number">
                            03
                        </span>

                    </div>

                </div>


                {{-- قطع ومستلزمات --}}
                <div class="col-lg-6 col-md-6"
                     data-aos="fade-up"
                     data-aos-delay="400">

                    <div class="otad-card">

                        <div class="otad-card-icon">
                            <i class="bi bi-gear-wide-connected"></i>
                        </div>

                        <h4>
                            قطع ومستلزمات السباكة
                        </h4>

                        <p>
                            مجموعة من القطع والمستلزمات التي تساعد الفنيين
                            والعملاء على تنفيذ أعمال السباكة بكفاءة.
                        </p>

                        <span class="otad-card-number">
                            04
                        </span>

                    </div>

                </div>


                {{-- التشطيب --}}
                <div class="col-lg-6 col-md-6"
                     data-aos="fade-up"
                     data-aos-delay="500">

                    <div class="otad-card">

                        <div class="otad-card-icon">
                            <i class="bi bi-house-check"></i>
                        </div>

                        <h4>
                            مستلزمات التشطيب
                        </h4>

                        <p>
                            منتجات مناسبة لمراحل التشطيب والتجهيز تساعدك
                            على استكمال مشروعك من مكان واحد.
                        </p>

                        <span class="otad-card-number">
                            05
                        </span>

                    </div>

                </div>


                {{-- خدمة العملاء --}}
                <div class="col-lg-6 col-md-6"
                     data-aos="fade-up"
                     data-aos-delay="600">

                    <div class="otad-card">

                        <div class="otad-card-icon">
                            <i class="bi bi-headset"></i>
                        </div>

                        <h4>
                            خدمة العملاء
                        </h4>

                        <p>
                            فريقنا جاهز لمساعدتك في معرفة تفاصيل المنتجات
                            واختيار المستلزمات المناسبة لاحتياجاتك.
                        </p>

                        <a href="tel:+201022558536"
                           class="otad-contact-btn">

                            <i class="bi bi-telephone-fill"></i>

                            اتصل بنا الآن

                        </a>

                        <span class="otad-card-number">
                            06
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
