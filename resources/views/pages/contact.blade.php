@extends('layouts.app')

@section('title', 'اتصل بنا:Sharq Store')

@section('content')

<section class="contact-section" dir="rtl">

    <div class="container">

        {{-- =========================
             عنوان الصفحة
        ========================== --}}
        <div class="section-heading text-center">

            <span>تواصل معنا</span>

            <h2>نحن هنا لخدمتك</h2>

            <p>
                {{ $settings->site_description ?? 'لو عندك استفسار عن منتج أو محتاج مساعدة، تواصل معنا.' }}
            </p>

        </div>


        <div class="row gy-4 align-items-stretch">

            {{-- =========================
                 معلومات المتجر
            ========================== --}}
            <div class="col-lg-5">

                <div class="contact-info">

                    <div class="contact-brand">

                        <div class="brand-icon">
                            <i class="bi bi-droplet-fill"></i>
                        </div>

                        <div>
                            <h3>
                                {{ $settings->site_name ?? 'أوتاد مصر' }}
                            </h3>

                            <span>
                                متجر الأدوات الصحية والسباكة
                            </span>
                        </div>

                    </div>


                    <p class="contact-description">

                        {{ $settings->site_description ?? 'نوفر لك مجموعة متنوعة من الأدوات الصحية ومستلزمات السباكة والمنتجات التي تحتاجها لمنزلك أو مشروعك، مع الحرص على الجودة والأسعار المناسبة.' }}

                    </p>


                    {{-- واتساب --}}
                    @if(!empty($settings?->whatsapp))

                        @php
                            $whatsapp = preg_replace('/[^0-9]/', '', $settings->whatsapp);

                            if (str_starts_with($whatsapp, '01')) {
                                $whatsapp = '20' . substr($whatsapp, 1);
                            }
                        @endphp

                        <div class="contact-item">

                            <div class="contact-icon whatsapp">
                                <i class="bi bi-whatsapp"></i>
                            </div>

                            <div>
                                <small>واتساب</small>

                                <a
                                    href="https://wa.me/{{ $whatsapp }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    {{ $settings->whatsapp }}
                                </a>
                            </div>

                        </div>

                    @endif


                    {{-- الهاتف --}}
                    @if(!empty($settings?->phone))

                        @php
                            $phone = preg_replace('/[^0-9+]/', '', $settings->phone);
                        @endphp

                        <div class="contact-item">

                            <div class="contact-icon phone">
                                <i class="bi bi-telephone-fill"></i>
                            </div>

                            <div>
                                <small>اتصل بنا</small>

                                <a href="tel:{{ $phone }}">
                                    {{ $settings->phone }}
                                </a>
                            </div>

                        </div>

                    @endif


                    {{-- البريد --}}
                    @if(!empty($settings?->email))

                        <div class="contact-item">

                            <div class="contact-icon email">
                                <i class="bi bi-envelope-fill"></i>
                            </div>

                            <div>
                                <small>البريد الإلكتروني</small>

                                <a href="mailto:{{ $settings->email }}">
                                    {{ $settings->email }}
                                </a>
                            </div>

                        </div>

                    @endif


                    {{-- العنوان --}}
                    @if(!empty($settings?->address))

                        <div class="contact-item">

                            <div class="contact-icon address">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>

                            <div>
                                <small>العنوان</small>

                                <span>
                                    {{ $settings->address }}
                                </span>
                            </div>

                        </div>

                    @endif


                    {{-- السوشيال --}}
                    <div class="social-title">
                        تابعنا على منصات التواصل
                    </div>

                    <div class="contact-social">

                        @if(!empty($settings?->facebook))
                            <a
                                href="{{ $settings->facebook }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="facebook"
                                aria-label="Facebook"
                            >
                                <i class="bi bi-facebook"></i>
                            </a>
                        @endif

                        @if(!empty($settings?->instagram))
                            <a
                                href="{{ $settings->instagram }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="instagram"
                                aria-label="Instagram"
                            >
                                <i class="bi bi-instagram"></i>
                            </a>
                        @endif

                        @if(!empty($settings?->tiktok))
                            <a
                                href="{{ $settings->tiktok }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="tiktok"
                                aria-label="TikTok"
                            >
                                <i class="bi bi-tiktok"></i>
                            </a>
                        @endif

                        @if(!empty($settings?->youtube))
                            <a
                                href="{{ $settings->youtube }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="youtube"
                                aria-label="YouTube"
                            >
                                <i class="bi bi-youtube"></i>
                            </a>
                        @endif

                    </div>

                </div>

            </div>


            {{-- =========================
                 نموذج التواصل
            ========================== --}}
            <div class="col-lg-7">

                <div class="contact-form">

                    <div class="form-header">

                        <span class="form-badge">
                            <i class="bi bi-chat-dots-fill"></i>
                            اترك رسالتك
                        </span>

                        <h3>
                            أرسل لنا استفسارك
                        </h3>

                        <p>
                            اكتب بياناتك واستفسارك وسيتواصل معك فريق أوتاد مصر في أقرب وقت.
                        </p>

                    </div>


                    <form
                        action="{{ route('contact.store') }}"
                        method="POST"
                    >

                        @csrf

                        <div class="row g-4">

                            {{-- الاسم --}}
                            <div class="col-md-6">

                                <label>
                                    الاسم بالكامل
                                </label>

                                <div class="input-box">

                                    <i class="bi bi-person-fill"></i>

                                    <input
                                        type="text"
                                        name="name"
                                        placeholder="اكتب اسمك بالكامل"
                                        value="{{ old('name') }}"
                                        required
                                    >

                                </div>

                            </div>


                            {{-- الهاتف --}}
                            <div class="col-md-6">

                                <label>
                                    رقم الهاتف
                                </label>

                                <div class="input-box">

                                    <i class="bi bi-telephone-fill"></i>

                                    <input
                                        type="text"
                                        name="phone"
                                        placeholder="01xxxxxxxxx"
                                        value="{{ old('phone') }}"
                                        required
                                    >

                                </div>

                            </div>


                            {{-- الرسالة --}}
                            <div class="col-12">

                                <label>
                                    رسالتك
                                </label>

                                <div class="input-box textarea-box">

                                    <i class="bi bi-chat-left-text-fill"></i>

                                    <textarea
                                        name="message"
                                        placeholder="اكتب استفسارك أو طلبك هنا..."
                                        required
                                    >{{ old('message') }}</textarea>

                                </div>

                            </div>


                            {{-- زر الإرسال --}}
                            <div class="col-12">

                                <button
                                    type="submit"
                                    class="contact-submit"
                                >

                                    <span>
                                        إرسال الاستفسار
                                    </span>

                                    <i class="bi bi-arrow-left"></i>

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>


<style>

/* =====================================================
   CONTACT SECTION
===================================================== */

.contact-section {
    position: relative;
    padding: 90px 0;
    overflow: hidden;

    background:
        radial-gradient(
            circle at 10% 10%,
            rgba(13, 110, 253, .08),
            transparent 30%
        ),
        radial-gradient(
            circle at 90% 90%,
            rgba(37, 211, 102, .06),
            transparent 30%
        ),
        #f8fafc;
}


/* =====================================================
   SECTION HEADING
===================================================== */

.contact-section .section-heading {
    max-width: 800px;
    margin: 0 auto 55px;
}

.contact-section .section-heading span {
    display: inline-block;
    margin-bottom: 10px;

    color: #0d6efd;
    font-size: 14px;
    font-weight: 800;
}

.contact-section .section-heading h2 {
    margin: 0 0 15px;

    color: #111827;
    font-size: 42px;
    font-weight: 900;
}

.contact-section .section-heading p {
    margin: 0;

    color: #667085;
    font-size: 16px;
    line-height: 2;
}


/* =====================================================
   CONTACT INFO
===================================================== */

.contact-section .contact-info {

    height: 100%;
    padding: 35px;

    position: relative;
    overflow: hidden;

    background: rgba(255,255,255,.95);

    border: 1px solid #e7ebf0;
    border-radius: 25px;

    box-shadow:
        0 20px 60px rgba(15,23,42,.08);

    transition: .35s ease;
}

.contact-section .contact-info:hover {
    transform: translateY(-5px);

    box-shadow:
        0 25px 70px rgba(15,23,42,.12);
}


/* =====================================================
   BRAND
===================================================== */

.contact-section .contact-brand {

    display: flex;
    align-items: center;

    gap: 15px;

    padding-bottom: 25px;
    margin-bottom: 25px;

    border-bottom: 1px solid #edf0f4;
}

.contact-section .brand-icon {

    width: 60px;
    height: 60px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    color: #fff;
    font-size: 25px;

    border-radius: 18px;

    background:
        linear-gradient(
            135deg,
            #0d6efd,
            #084298
        );

    box-shadow:
        0 12px 30px rgba(13,110,253,.25);
}

.contact-section .contact-brand h3 {

    margin: 0 0 5px;

    color: #111827;
    font-size: 24px;
    font-weight: 900;
}

.contact-section .contact-brand span {

    color: #8b95a5;
    font-size: 13px;
}


/* =====================================================
   DESCRIPTION
===================================================== */

.contact-section .contact-description {

    margin-bottom: 25px;

    color: #667085;

    font-size: 14px;
    line-height: 2;
}


/* =====================================================
   CONTACT ITEMS
===================================================== */

.contact-section .contact-item {

    display: flex;
    align-items: center;

    gap: 14px;

    padding: 13px;

    margin-top: 12px;

    background: #f8fafc;

    border: 1px solid #edf0f4;

    border-radius: 15px;

    transition: .3s ease;
}

.contact-section .contact-item:hover {

    transform: translateX(-5px);

    background: #fff;

    border-color: rgba(13,110,253,.2);

    box-shadow:
        0 10px 25px rgba(15,23,42,.07);
}


/* =====================================================
   ICON
===================================================== */

.contact-section .contact-icon {

    width: 46px;
    height: 46px;

    flex: 0 0 46px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 13px;

    background: #fff;

    font-size: 18px;

    box-shadow:
        0 5px 15px rgba(15,23,42,.07);
}

.contact-section .contact-icon.whatsapp {
    color: #25D366;
}

.contact-section .contact-icon.phone {
    color: #0d6efd;
}

.contact-section .contact-icon.email {
    color: #7c3aed;
}

.contact-section .contact-icon.address {
    color: #ef4444;
}


/* =====================================================
   CONTACT TEXT
===================================================== */

.contact-section .contact-item small {

    display: block;

    margin-bottom: 3px;

    color: #98a2b3;

    font-size: 11px;
    font-weight: 700;
}

.contact-section .contact-item a,
.contact-section .contact-item span {

    display: block;

    color: #1d2939;

    font-size: 14px;
    font-weight: 700;

    text-decoration: none;

    word-break: break-word;
}

.contact-section .contact-item a:hover {
    color: #0d6efd;
}


/* =====================================================
   SOCIAL
===================================================== */

.contact-section .social-title {

    margin-top: 28px;
    margin-bottom: 12px;

    color: #344054;

    font-size: 13px;
    font-weight: 800;
}

.contact-section .contact-social {

    display: flex;
    gap: 10px;
}

.contact-section .contact-social a {

    width: 42px;
    height: 42px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 12px;

    background: #f8fafc;

    border: 1px solid #e7ebf0;

    font-size: 18px;

    text-decoration: none;

    transition: .3s ease;
}

.contact-section .contact-social a:hover {

    transform: translateY(-4px);

    color: #fff;
}

.contact-section .contact-social .facebook {
    color: #1877f2;
}

.contact-section .contact-social .facebook:hover {
    background: #1877f2;
}

.contact-section .contact-social .instagram {
    color: #e1306c;
}

.contact-section .contact-social .instagram:hover {
    background: #e1306c;
}

.contact-section .contact-social .tiktok {
    color: #111;
}

.contact-section .contact-social .tiktok:hover {
    background: #111;
}

.contact-section .contact-social .youtube {
    color: #ff0000;
}

.contact-section .contact-social .youtube:hover {
    background: #ff0000;
}


/* =====================================================
   FORM
===================================================== */

.contact-section .contact-form {

    height: 100%;
    padding: 40px;

    background: #fff;

    border: 1px solid #e7ebf0;

    border-radius: 25px;

    box-shadow:
        0 20px 60px rgba(15,23,42,.08);
}


/* =====================================================
   FORM HEADER
===================================================== */

.contact-section .form-header {
    margin-bottom: 30px;
}

.contact-section .form-badge {

    display: inline-flex;
    align-items: center;

    gap: 7px;

    margin-bottom: 12px;

    padding: 7px 12px;

    color: #0d6efd;

    background: #eef5ff;

    border-radius: 30px;

    font-size: 12px;
    font-weight: 800;
}

.contact-section .form-header h3 {

    margin: 0 0 8px;

    color: #111827;

    font-size: 27px;
    font-weight: 900;
}

.contact-section .form-header p {

    margin: 0;

    color: #8a94a6;

    font-size: 14px;
    line-height: 1.9;
}


/* =====================================================
   LABEL
===================================================== */

.contact-section label {

    display: block;

    margin-bottom: 8px;

    color: #344054;

    font-size: 13px;
    font-weight: 800;
}


/* =====================================================
   INPUT BOX
===================================================== */

.contact-section .input-box {

    position: relative;
}

.contact-section .input-box > i {

    position: absolute;

    top: 50%;
    right: 17px;

    transform: translateY(-50%);

    color: #98a2b3;

    font-size: 17px;

    z-index: 2;
}

.contact-section .input-box input,
.contact-section .input-box textarea {

    width: 100%;

    padding: 15px 48px 15px 15px;

    color: #1d2939;

    background: #f8fafc;

    border: 1px solid #e5e7eb;

    border-radius: 14px;

    font-family: inherit;

    font-size: 14px;

    outline: none;

    transition: .3s ease;
}

.contact-section .input-box input {

    height: 55px;
}

.contact-section .input-box textarea {

    min-height: 170px;

    resize: vertical;

    line-height: 1.9;
}

.contact-section .input-box input:focus,
.contact-section .input-box textarea:focus {

    background: #fff;

    border-color: #0d6efd;

    box-shadow:
        0 0 0 4px rgba(13,110,253,.08);
}

.contact-section .input-box:focus-within > i {
    color: #0d6efd;
}


/* =====================================================
   SUBMIT
===================================================== */

.contact-section .contact-submit {

    width: 100%;
    min-height: 58px;

    display: flex;
    align-items: center;
    justify-content: center;

    gap: 12px;

    border: 0;

    border-radius: 15px;

    color: #fff;

    background:
        linear-gradient(
            135deg,
            #0d6efd,
            #084298
        );

    font-family: inherit;

    font-size: 15px;
    font-weight: 800;

    cursor: pointer;

    box-shadow:
        0 12px 30px rgba(13,110,253,.22);

    transition: .3s ease;
}

.contact-section .contact-submit:hover {

    transform: translateY(-3px);

    box-shadow:
        0 18px 40px rgba(13,110,253,.3);
}

.contact-section .contact-submit i {

    font-size: 18px;

    transition: .3s ease;
}

.contact-section .contact-submit:hover i {
    transform: translateX(-5px);
}


/* =====================================================
   RESPONSIVE
===================================================== */

@media (max-width: 991px) {

    .contact-section {
        padding: 70px 0;
    }

    .contact-section .section-heading h2 {
        font-size: 34px;
    }

    .contact-section .contact-form,
    .contact-section .contact-info {
        padding: 30px;
    }

}


@media (max-width: 575px) {

    .contact-section {
        padding: 55px 0;
    }

    .contact-section .section-heading h2 {
        font-size: 28px;
    }

    .contact-section .section-heading p {
        font-size: 14px;
    }

    .contact-section .contact-form,
    .contact-section .contact-info {
        padding: 22px;
        border-radius: 20px;
    }

    .contact-section .form-header h3 {
        font-size: 23px;
    }

}

</style>

@endsection