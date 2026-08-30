
{{-- =========================================================
     LATEST PRODUCTS
========================================================= --}}

<section id="latest-products" class="latest-products section">

    {{-- العنوان --}}
    <div class="container section-title" data-aos="fade-up">

        <span class="section-subtitle">
            منتجاتنا الجديدة
        </span>

        <h2>
            أحدث المنتجات
        </h2>

        <p>
            تعرف على أحدث المنتجات المضافة إلى متجر أوتاد مصر
        </p>

    </div>


    <div class="container">

        @if($latestProducts->count())

            {{-- Products Swiper --}}
            <div class="swiper latestProductsSwiper">

                <div class="swiper-wrapper">

                    @foreach($latestProducts as $product)

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
                <div class="swiper-button-next latest-products-next"></div>
                <div class="swiper-button-prev latest-products-prev"></div>


                {{-- Pagination --}}
                <div class="swiper-pagination latest-products-pagination"></div>

            </div>

        @else

            <div class="text-center py-5">

                <i class="bi bi-box-seam fs-1 text-muted"></i>

                <p class="mt-3 text-muted">
                    لا توجد منتجات متاحة حاليًا.
                </p>

            </div>

        @endif

    </div>

</section>


<style>

/* =========================================================
   LATEST PRODUCTS
========================================================= */

.latest-products {
    overflow: hidden;
}


/* العنوان */

.latest-products .section-title {
    text-align: center;
}

.latest-products .section-subtitle {
    display: inline-block;

    color: #0875e1;

    font-size: 14px;
    font-weight: 800;

    margin-bottom: 8px;
}

.latest-products .section-title h2 {
    color: #102a43;

    font-size: 32px;
    font-weight: 900;

    margin-bottom: 8px;
}

.latest-products .section-title p {
    color: #718096;

    font-size: 15px;

    margin-bottom: 0;
}


/* =========================================================
   SWIPER
========================================================= */

.latestProductsSwiper {
    position: relative;

    padding: 15px 45px 55px;

    overflow: hidden;
}

.latestProductsSwiper .swiper-wrapper {
    align-items: stretch;
}


/* كل منتج */

.latestProductsSwiper .swiper-slide {
    height: auto;

    display: flex;
}


/*
   مهم:
   نخلي كارت المنتج ياخد عرض السلايد بالكامل
*/

.latestProductsSwiper .swiper-slide > * {
    width: 100%;
}


/* =========================================================
   ARROWS
========================================================= */

.latest-products-next,
.latest-products-prev {
    width: 42px;
    height: 42px;

    border-radius: 50%;

    background: #0875e1;

    box-shadow:
        0 8px 25px rgba(8, 117, 225, .20);

    transition: all .3s ease;
}

.latest-products-next::after,
.latest-products-prev::after {
    font-size: 15px;

    font-weight: 900;

    color: #ffffff;
}

.latest-products-next:hover,
.latest-products-prev:hover {
    background: #005bb5;

    transform: scale(1.08);
}


/* =========================================================
   PAGINATION
========================================================= */

.latest-products-pagination {
    bottom: 8px !important;
}

.latest-products-pagination .swiper-pagination-bullet {
    width: 8px;
    height: 8px;

    opacity: .35;
}

.latest-products-pagination .swiper-pagination-bullet-active {
    width: 24px;

    border-radius: 20px;

    opacity: 1;
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 768px) {

    .latest-products .section-title h2 {
        font-size: 25px;
    }

    .latest-products .section-title p {
        font-size: 13px;
    }

    .latestProductsSwiper {
        padding:
            10px
            10px
            50px;
    }

    .latest-products-next,
    .latest-products-prev {
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
        document.querySelector('.latestProductsSwiper');

    if (!productsSlider) {
        return;
    }


    new Swiper('.latestProductsSwiper', {

        /* عدد المنتجات */

        slidesPerView: 4,

        spaceBetween: 24,


        /* التكرار */

        loop: true,

        loopAdditionalSlides: 4,


        /* الحركة */

        autoplay: {

            delay: 2500,

            disableOnInteraction: false,

            pauseOnMouseEnter: true,

        },


        speed: 700,


        /* الأسهم */

        navigation: {

            nextEl: '.latest-products-next',

            prevEl: '.latest-products-prev',

        },


        /* Pagination */

        pagination: {

            el: '.latest-products-pagination',

            clickable: true,

        },


        /* Responsive */

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
```
