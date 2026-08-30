
{{-- =========================================================
     BRANDS SECTION
========================================================= --}}

@if($brands->count())

<section class="brands-section">

    <div class="container">

        {{-- العنوان --}}
        <div class="section-title text-center mb-4">

            <span class="section-subtitle">
                شركاؤنا
            </span>

            <h2>
                أشهر البراندات
            </h2>

            <p>
                نتعامل مع أفضل وأشهر العلامات التجارية
            </p>

        </div>


        {{-- Brands Slider --}}
        <div class="brands-slider-wrapper">

            <div class="swiper brandsSwiper">

                <div class="swiper-wrapper">

                    @foreach($brands as $brand)

                        <div class="swiper-slide">

                            @if($brand->url)
                                <a
                                    href="{{ $brand->url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="brand-item"
                                >
                            @else
                                <div class="brand-item">
                            @endif

                                @if($brand->image)

                                    <img
                                        src="{{ asset('uploads/' . $brand->image) }}"
                                        alt="{{ $brand->name }}"
                                        loading="lazy"
                                    >

                                @else

                                    <div class="brand-placeholder">
                                        <i class="bi bi-image"></i>
                                    </div>

                                @endif

                                <span>
                                    {{ $brand->name }}
                                </span>

                            @if($brand->url)
                                </a>
                            @else
                                </div>
                            @endif

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>

@endif


<style>

/* =========================================================
   BRANDS SECTION
========================================================= */

.brands-section {
    padding: 70px 0;
    background:
        linear-gradient(
            135deg,
            #f4f9ff 0%,
            #ffffff 50%,
            #eef6ff 100%
        );
    overflow: hidden;
}


/* العنوان */

.brands-section .section-subtitle {
    display: inline-block;
    color: #0875e1;
    font-size: 14px;
    font-weight: 800;
    margin-bottom: 8px;
}

.brands-section .section-title h2 {
    color: #102a43;
    font-size: 32px;
    font-weight: 900;
    margin-bottom: 8px;
}

.brands-section .section-title p {
    color: #718096;
    font-size: 15px;
    margin-bottom: 0;
}


/* =========================================================
   SLIDER
========================================================= */

.brands-slider-wrapper {
    position: relative;
    margin-top: 35px;
    overflow: hidden;
}


/* تدرج على الأطراف */

.brands-slider-wrapper::before,
.brands-slider-wrapper::after {
    content: "";
    position: absolute;
    top: 0;
    width: 90px;
    height: 100%;
    z-index: 5;
    pointer-events: none;
}

.brands-slider-wrapper::before {
    right: 0;
    background: linear-gradient(
        to left,
        #f4f9ff,
        transparent
    );
}

.brands-slider-wrapper::after {
    left: 0;
    background: linear-gradient(
        to right,
        #f4f9ff,
        transparent
    );
}


/* =========================================================
   BRAND ITEM
========================================================= */

.brandsSwiper {
    width: 100%;
    overflow: visible;
}

.brandsSwiper .swiper-wrapper {
    align-items: center;
}


/* كل براند صغير جدًا */

.brandsSwiper .swiper-slide {
    width: 125px !important;
    height: 90px;
    display: flex;
    align-items: center;
    justify-content: center;
}


/* الكارت */

.brand-item {
    width: 115px;
    height: 75px;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    padding: 10px;

    background: rgba(255, 255, 255, 0.9);

    border: 1px solid rgba(8, 117, 225, 0.10);

    border-radius: 14px;

    text-decoration: none;

    transition:
        transform .3s ease,
        box-shadow .3s ease,
        border-color .3s ease;

    box-shadow:
        0 5px 18px rgba(15, 76, 129, 0.06);
}


/* الصورة صغيرة */

.brand-item img {
    width: 55px;
    height: 38px;

    object-fit: contain;

    display: block;

    filter: grayscale(15%);

    transition:
        transform .3s ease,
        filter .3s ease;
}


/* اسم البراند */

.brand-item span {
    display: block;

    margin-top: 5px;

    max-width: 95px;

    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;

    color: #486581;

    font-size: 10px;
    font-weight: 700;

    text-align: center;
}


/* Hover */

.brand-item:hover {
    transform: translateY(-4px);

    border-color: rgba(8, 117, 225, 0.25);

    box-shadow:
        0 12px 30px rgba(8, 117, 225, 0.14);
}

.brand-item:hover img {
    transform: scale(1.08);
    filter: grayscale(0);
}


/* بدون صورة */

.brand-placeholder {
    width: 55px;
    height: 38px;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #0875e1;

    font-size: 20px;
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 768px) {

    .brands-section {
        padding: 50px 0;
    }

    .brands-section .section-title h2 {
        font-size: 25px;
    }

    .brands-section .section-title p {
        font-size: 13px;
    }

    .brandsSwiper .swiper-slide {
        width: 105px !important;
        height: 75px;
    }

    .brand-item {
        width: 98px;
        height: 65px;
        padding: 7px;
        border-radius: 11px;
    }

    .brand-item img,
    .brand-placeholder {
        width: 48px;
        height: 32px;
    }

    .brand-item span {
        font-size: 9px;
        margin-top: 3px;
    }

}

</style>


<script>
document.addEventListener('DOMContentLoaded', function () {

    // تأكد أن Swiper محمل
    if (typeof Swiper === 'undefined') {
        console.error('Swiper JS غير محمل');
        return;
    }

    const slider = document.querySelector('.brandsSwiper');

    if (!slider) {
        return;
    }

    const wrapper = slider.querySelector('.swiper-wrapper');

    /*
    |--------------------------------------------------------------------------
    | تكرار البراندات
    |--------------------------------------------------------------------------
    | لو عدد البراندات قليل، نكررها أكثر من مرة
    | عشان الـ loop يشتغل بشكل مستمر
    */

    const originalSlides = Array.from(
        wrapper.querySelectorAll('.swiper-slide')
    );

    if (originalSlides.length > 0 && originalSlides.length < 10) {

        for (let i = 0; i < 3; i++) {

            originalSlides.forEach(slide => {

                const clone = slide.cloneNode(true);

                wrapper.appendChild(clone);

            });

        }

    }


    /*
    |--------------------------------------------------------------------------
    | Swiper
    |--------------------------------------------------------------------------
    */

    const brandsSwiper = new Swiper('.brandsSwiper', {

        direction: 'horizontal',

        slidesPerView: 'auto',

        spaceBetween: 18,

        loop: true,

        loopedSlides: wrapper.querySelectorAll('.swiper-slide').length,

        loopAdditionalSlides: 10,

        centeredSlides: false,

        grabCursor: true,

        allowTouchMove: true,

        freeMode: {
            enabled: true,
            momentum: false,
            sticky: false,
        },

        autoplay: {
            delay: 1,
            disableOnInteraction: false,
            pauseOnMouseEnter: false,
        },

        speed: 4000,

        observer: true,
        observeParents: true,

    });

});
</script>

