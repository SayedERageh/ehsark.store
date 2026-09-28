<!-- Call To Action Section -->
<section id="call-to-action" class="call-to-action section" dir="rtl">

    <div class="container">

        <div class="cta-box" data-aos="zoom-out">

            <div class="row align-items-center g-4">
{{-- المحتوى --}}

<div class="col-lg-8">

```
<div class="cta-content">

    <span class="cta-label">
        {{ $settings->site_name ?? 'شرق استور' }}
    </span>

    <h2>
        كل ما تحتاجه لموبايلك من إكسسوارات ومستلزمات في مكان واحد
    </h2>

    <p>
        {{ $settings->site_description ?? 'نوفر لكم أفضل إكسسوارات ومستلزمات الموبايلات من شواحن وكابلات وسماعات وحافظات وغيرها، بجودة ممتازة وأسعار مناسبة.' }}
    </p>

    {{-- الأزرار --}}
    <div class="cta-buttons">

        {{-- واتساب --}}
        @if(!empty($settings?->whatsapp))

            @php
                $whatsapp = preg_replace(
                    '/[^0-9]/',
                    '',
                    $settings->whatsapp
                );

                if (str_starts_with($whatsapp, '01')) {
                    $whatsapp = '20' . substr($whatsapp, 1);
                }
            @endphp

            <a
                href="https://wa.me/{{ $whatsapp }}"
                target="_blank"
                rel="noopener noreferrer"
                class="cta-whatsapp"
            >
                <i class="bi bi-whatsapp"></i>
                تواصل عبر واتساب
            </a>

        @endif

        {{-- اتصال --}}
        @if(!empty($settings?->phone))

            <a
                href="tel:{{ preg_replace('/[^0-9+]/', '', $settings->phone) }}"
                class="cta-phone"
            >
                <i class="bi bi-telephone-fill"></i>
                اتصل بنا
            </a>

        @endif

    </div>

</div>
```

</div>


                {{-- الصورة --}}
                <div class="col-lg-4">

                    <div class="cta-image">

                        <img
                            src="{{ asset('assets/img/aqar.jpg') }}"
                            alt="{{ $settings->site_name ?? 'أوتاد مصر' }}"
                        >

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<style>

/* =====================================================
   CTA SECTION
===================================================== */

.call-to-action {

    padding: 70px 0;

    background: #f7f9fc;

}


/* الصندوق */

.cta-box {

    position: relative;

    overflow: hidden;

    padding: 45px;

    border-radius: 24px;

    background: linear-gradient(
        135deg,
        #ffffff 0%,
        #f5f8ff 100%
    );

    border: 1px solid rgba(13, 110, 253, .08);

    box-shadow:
        0 15px 50px rgba(0, 0, 0, .08);

}


/* خط ديكوري */

.cta-box::before {

    content: "";

    position: absolute;

    top: 0;

    right: 0;

    width: 7px;

    height: 100%;

    background: #0d6efd;

}


/* =====================================================
   CONTENT
===================================================== */

.cta-content {

    padding-left: 20px;

}


.cta-label {

    display: inline-block;

    margin-bottom: 12px;

    padding: 7px 15px;

    border-radius: 30px;

    background: #eaf2ff;

    color: #0d6efd;

    font-size: 14px;

    font-weight: 700;

}


.cta-content h2 {

    margin: 0 0 18px;

    color: #1d2735;

    font-size: 32px;

    line-height: 1.5;

    font-weight: 800;

}


.cta-content p {

    margin: 0;

    max-width: 750px;

    color: #667085;

    font-size: 16px;

    line-height: 2;

}


/* =====================================================
   BUTTONS
===================================================== */

.cta-buttons {

    display: flex;

    align-items: center;

    gap: 12px;

    margin-top: 28px;

    flex-wrap: wrap;

}


.cta-buttons a {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 9px;

    min-height: 48px;

    padding: 0 22px;

    border-radius: 10px;

    text-decoration: none;

    font-size: 15px;

    font-weight: 700;

    transition: .3s ease;

}


/* واتساب */

.cta-whatsapp {

    background: #25D366;

    color: #fff;

    box-shadow:
        0 7px 20px rgba(37, 211, 102, .20);

}


.cta-whatsapp:hover {

    background: #1ebe5d;

    color: #fff;

    transform: translateY(-3px);

}


/* الاتصال */

.cta-phone {

    background: #0d6efd;

    color: #fff;

    box-shadow:
        0 7px 20px rgba(13, 110, 253, .20);

}


.cta-phone:hover {

    background: #0958c7;

    color: #fff;

    transform: translateY(-3px);

}


/* =====================================================
   IMAGE
===================================================== */

.cta-image {

    position: relative;

    height: 280px;

    overflow: hidden;

    border-radius: 18px;

    box-shadow:
        0 12px 35px rgba(0, 0, 0, .12);

}


.cta-image::after {

    content: "";

    position: absolute;

    inset: 0;

    background: linear-gradient(
        135deg,
        rgba(13, 110, 253, .08),
        transparent
    );

    pointer-events: none;

}


.cta-image img {

    width: 100%;

    height: 100%;

    object-fit: cover;

    display: block;

    transition: .5s ease;

}


.cta-image:hover img {

    transform: scale(1.05);

}


/* =====================================================
   MOBILE
===================================================== */

@media (max-width: 991px) {

    .call-to-action {

        padding: 50px 0;

    }


    .cta-box {

        padding: 30px 25px;

    }


    .cta-content {

        padding-left: 0;

        text-align: center;

    }


    .cta-content h2 {

        font-size: 25px;

    }


    .cta-content p {

        font-size: 15px;

    }


    .cta-buttons {

        justify-content: center;

    }


    .cta-image {

        height: 240px;

    }

}


@media (max-width: 575px) {

    .cta-box {

        padding: 25px 18px;

        border-radius: 18px;

    }


    .cta-content h2 {

        font-size: 22px;

    }


    .cta-buttons a {

        width: 100%;

    }


    .cta-image {

        height: 210px;

    }

}

</style>