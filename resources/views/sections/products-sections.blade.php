{{-- =========================================================
FEATURED PRODUCTS
========================================================= --}}

<section id="featured-products" class="featured-products section">

```
{{-- العنوان --}}
<div class="container section-title" data-aos="fade-up">

    <span class="section-subtitle">
        اختياراتنا المميزة
    </span>

    <h2>
        المنتجات المميزة
    </h2>

    <p>
        اكتشف أفضل المنتجات المختارة بعناية من متجر أوتاد مصر
    </p>

</div>


<div class="container">

    @if($featuredProducts->count())

        {{-- Products Swiper --}}
        <div class="swiper featuredProductsSwiper">

            <div class="swiper-wrapper">

                @foreach($featuredProducts as $product)

                    <div
                        class="swiper-slide"
                        data-aos="fade-up"
                    >

                        @include('shop.partials.product-card', [
                            'product' => $product
                        ])

                    </div>

                @endforeach

            </div>


            {{-- الأسهم --}}
            <div class="swiper-button-next featured-products-next"></div>
            <div class="swiper-button-prev featured-products-prev"></div>


            {{-- Pagination --}}
            <div class="swiper-pagination featured-products-pagination"></div>

        </div>

    @else

        <div class="text-center py-5">

            <i class="bi bi-star fs-1 text-muted"></i>

            <p class="mt-3 text-muted">
                لا توجد منتجات مميزة حاليًا.
            </p>

        </div>

    @endif

</div>
```

</section>

<style>

/* =========================================================
   FEATURED PRODUCTS
========================================================= */

.featured-products {
    overflow: hidden;
}


/* =========================================================
   SECTION TITLE
========================================================= */

.featured-products .section-title {
    text-align: center;
}

.featured-products .section-subtitle {
    display: inline-block;

    color: #0875e1;

    font-size: 14px;
    font-weight: 800;

    margin-bottom: 8px;
}

.featured-products .section-title h2 {
    color: #102a43;

    font-size: 32px;
    font-weight: 900;

    margin-bottom: 8px;
}

.featured-products .section-title p {
    color: #718096;

    font-size: 15px;

    margin-bottom: 0;
}


/* =========================================================
   SWIPER
========================================================= */

.featuredProductsSwiper {
    position: relative;

    padding: 15px 45px 55px;

    overflow: hidden;
}

.featuredProductsSwiper .swiper-wrapper {
    align-items: stretch;
}


/* كل منتج */

.featuredProductsSwiper .swiper-slide {
    height: auto;

    display: flex;
}


/* الكارت ياخد عرض السلايد بالكامل */

.featuredProductsSwiper .swiper-slide > * {
    width: 100%;
}


/* =========================================================
   ARROWS
========================================================= */

.featured-products-next,
.featured-products-prev {
    width: 42px;
    height: 42px;

    border-radius: 50%;

    background: #0875e1;

    box-shadow:
        0 8px 25px rgba(8, 117, 225, .20);

    transition: all .3s ease;
}

.featured-products-next::after,
.featured-products-prev::after {
    font-size: 15px;

    font-weight: 900;

    color: #ffffff;
}

.featured-products-next:hover,
.featured-products-prev:hover {
    background: #005bb5;

    transform: scale(1.08);
}


/* =========================================================
   PAGINATION
========================================================= */

.featured-products-pagination {
    bottom: 8px !important;
}

.featured-products-pagination .swiper-pagination-bullet {
    width: 8px;
    height: 8px;

    opacity: .35;
}

.featured-products-pagination .swiper-pagination-bullet-active {
    width: 24px;

    border-radius: 20px;

    opacity: 1;
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 768px) {

    .featured-products .section-title h2 {
        font-size: 25px;
    }

    .featured-products .section-title p {
        font-size: 13px;
    }

    .featuredProductsSwiper {
        padding:
            10px
            10px
            50px;
    }

    .featured-products-next,
    .featured-products-prev {
        display: none;
    }

}

</style>

<script>

document.addEventListener('DOMContentLoaded', function () {

    if (typeof Swiper === 'undefined') {

        console.error('Swiper JS غير محمل');

        return;
    }


    const productsSlider =
        document.querySelector('.featuredProductsSwiper');


    if (!productsSlider) {
        return;
    }


    new Swiper('.featuredProductsSwiper', {

        /* =====================================================
           عدد المنتجات
        ===================================================== */

        slidesPerView: 4,

        spaceBetween: 24,


        /* =====================================================
           التكرار
        ===================================================== */

        loop: true,

        loopAdditionalSlides: 4,


        /* =====================================================
           الحركة التلقائية
        ===================================================== */

        autoplay: {

            delay: 2500,

            disableOnInteraction: false,

            pauseOnMouseEnter: true,

        },


        speed: 700,


        /* =====================================================
           الأسهم
        ===================================================== */

        navigation: {

            nextEl: '.featured-products-next',

            prevEl: '.featured-products-prev',

        },


        /* =====================================================
           Pagination
        ===================================================== */

        pagination: {

            el: '.featured-products-pagination',

            clickable: true,

        },


        /* =====================================================
           Responsive
        ===================================================== */

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


        observer: true,

        observeParents: true,

    });

});

</script>
