
{{-- =========================================================
     FEATURED PRODUCTS
========================================================= --}}

@if($featuredProducts->count())

<section class="featured-products-section section" dir="rtl">

    {{-- =====================================================
         العنوان
    ====================================================== --}}

    <div class="container section-title" data-aos="fade-up">

        <span class="section-subtitle">
            منتجاتنا المميزة
        </span>

        <h2>
            المنتجات المميزة
        </h2>

        <p>
            مجموعة مختارة من أفضل منتجاتنا
        </p>

    </div>


    {{-- =====================================================
         SWIPER
    ====================================================== --}}

    <div class="container">

        <div class="featuredProductsSwiper swiper">

            <div class="swiper-wrapper">

                @foreach($featuredProducts as $product)

                    <div class="swiper-slide">

                        @include('shop.partials.product-card', [
                            'product' => $product
                        ])

                    </div>

                @endforeach

            </div>


            {{-- الأسهم --}}

            <div class="swiper-button-next featured-next"></div>

            <div class="swiper-button-prev featured-prev"></div>


            {{-- Pagination --}}

            <div class="swiper-pagination featured-pagination"></div>

        </div>

    </div>

</section>

@endif


<style>

/* =========================================================
   FEATURED PRODUCTS
========================================================= */

.featured-products-section {
    padding: 70px 0;

    overflow: hidden;

    background: #ffffff;
}


/* =========================================================
   SECTION TITLE
========================================================= */

.featured-products-section .section-title {
    text-align: center;

    margin-bottom: 35px;
}


.featured-products-section .section-subtitle {

    display: inline-block;

    margin-bottom: 8px;

    color: #0875e1;

    font-size: 14px;

    font-weight: 800;
}


.featured-products-section .section-title h2 {

    margin-bottom: 8px;

    color: #102a43;

    font-size: 32px;

    font-weight: 900;
}


.featured-products-section .section-title p {

    margin: 0;

    color: #718096;

    font-size: 15px;
}


/* =========================================================
   SWIPER
========================================================= */

.featuredProductsSwiper {

    position: relative;

    padding: 10px 45px 55px;

    overflow: hidden;
}


.featuredProductsSwiper .swiper-wrapper {

    align-items: stretch;
}


.featuredProductsSwiper .swiper-slide {

    height: auto;

    display: flex;
}


.featuredProductsSwiper .swiper-slide > * {

    width: 100%;
}


/* =========================================================
   ARROWS
========================================================= */

.featuredProductsSwiper
.swiper-button-next,

.featuredProductsSwiper
.swiper-button-prev {

    width: 42px;

    height: 42px;

    border-radius: 50%;

    background: #0875e1;

    box-shadow:
        0 8px 25px rgba(8, 117, 225, .20);

    transition: all .3s ease;
}


.featuredProductsSwiper
.swiper-button-next::after,

.featuredProductsSwiper
.swiper-button-prev::after {

    color: #ffffff;

    font-size: 15px;

    font-weight: 900;
}


.featuredProductsSwiper
.swiper-button-next:hover,

.featuredProductsSwiper
.swiper-button-prev:hover {

    background: #005bb5;

    transform: scale(1.08);
}


/* =========================================================
   PAGINATION
========================================================= */

.featuredProductsSwiper
.swiper-pagination {

    bottom: 8px !important;
}


.featuredProductsSwiper
.swiper-pagination-bullet {

    width: 8px;

    height: 8px;

    opacity: .35;

    transition: all .3s ease;
}


.featuredProductsSwiper
.swiper-pagination-bullet-active {

    width: 24px;

    border-radius: 20px;

    opacity: 1;
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 768px) {

    .featured-products-section {

        padding: 50px 0;
    }


    .featured-products-section
    .section-title h2 {

        font-size: 25px;
    }


    .featured-products-section
    .section-title p {

        font-size: 13px;
    }


    .featuredProductsSwiper {

        padding:
            10px
            10px
            50px;
    }


    .featuredProductsSwiper
    .swiper-button-next,

    .featuredProductsSwiper
    .swiper-button-prev {

        display: none;
    }

}

</style>


{{-- =========================================================
     SWIPER INITIALIZATION
========================================================= --}}

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | التأكد أن Swiper موجود
    |--------------------------------------------------------------------------
    */

    if (typeof Swiper === 'undefined') {

        console.error('Swiper JS غير محمل');

        return;
    }


    /*
    |--------------------------------------------------------------------------
    | Featured Products
    |--------------------------------------------------------------------------
    */

    const featuredSlider =
        document.querySelector('.featuredProductsSwiper');


    if (!featuredSlider) {
        return;
    }


    new Swiper(featuredSlider, {

        /*
        |--------------------------------------------------------------------------
        | عدد المنتجات
        |--------------------------------------------------------------------------
        */

        slidesPerView: 1,

        spaceBetween: 15,


        /*
        |--------------------------------------------------------------------------
        | Loop
        |--------------------------------------------------------------------------
        */

        loop: true,

        loopAdditionalSlides: 4,


        /*
        |--------------------------------------------------------------------------
        | Autoplay
        |--------------------------------------------------------------------------
        */

        autoplay: {

            delay: 2500,

            disableOnInteraction: false,

            pauseOnMouseEnter: true,

        },


        /*
        |--------------------------------------------------------------------------
        | سرعة الحركة
        |--------------------------------------------------------------------------
        */

        speed: 700,


        /*
        |--------------------------------------------------------------------------
        | الأسهم
        |--------------------------------------------------------------------------
        */

        navigation: {

            nextEl: '.featured-next',

            prevEl: '.featured-prev',

        },


        /*
        |--------------------------------------------------------------------------
        | Pagination
        |--------------------------------------------------------------------------
        */

        pagination: {

            el: '.featured-pagination',

            clickable: true,

        },


        /*
        |--------------------------------------------------------------------------
        | Responsive
        |--------------------------------------------------------------------------
        */

        breakpoints: {

            /* موبايل */

            0: {

                slidesPerView: 1.2,

                spaceBetween: 15,

            },


            /* موبايل كبير */

            576: {

                slidesPerView: 2,

                spaceBetween: 18,

            },


            /* تابلت */

            768: {

                slidesPerView: 3,

                spaceBetween: 20,

            },


            /* كمبيوتر */

            1200: {

                slidesPerView: 4,

                spaceBetween: 24,

            }

        },


        /*
        |--------------------------------------------------------------------------
        | تحديث تلقائي
        |--------------------------------------------------------------------------
        */

        observer: true,

        observeParents: true,

    });

});

</script>

@endpush
```
