{{-- =========================================================
     SHAREK STORE - LATEST PRODUCTS
========================================================= --}}

<section id="latest-products" class="latest-products section" dir="rtl">

    {{-- العنوان --}}
    <div class="container section-title" data-aos="fade-up">

        <span class="section-subtitle">
            جديد    شرق  استور
        </span>

        <h2>
            أحدث المنتجات
        </h2>

        <p>
            اكتشف أحدث إكسسوارات ومستلزمات الموبايلات المضافة إلى متجر    شرق  استور
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

                <div class="sharek-empty-icon">
                    <i class="bi bi-phone"></i>
                </div>

                <p class="mt-3 text-muted">
                    لا توجد منتجات متاحة حاليًا.
                </p>

            </div>

        @endif

    </div>

</section>


<style>

/* =========================================================
   SHAREK STORE - LATEST PRODUCTS
========================================================= */

.latest-products {
    overflow: hidden;

    background:
        linear-gradient(
            180deg,
            #ffffff 0%,
            #f8fbff 100%
        );
}


/* =========================================================
   SECTION TITLE
========================================================= */

.latest-products .section-title {
    text-align: center;
}

.latest-products .section-subtitle {

    display: inline-flex;

    align-items: center;
    justify-content: center;

    color: #2563eb;

    background: #eff6ff;

    border: 1px solid #dbeafe;

    padding: 7px 17px;

    border-radius: 50px;

    font-size: 13px;
    font-weight: 800;

    margin-bottom: 12px;
}

.latest-products .section-title h2 {

    color: #172033;

    font-size: 34px;

    font-weight: 900;

    margin-bottom: 9px;
}

.latest-products .section-title p {

    color: #64748b;

    font-size: 15px;

    margin-bottom: 0;

    line-height: 1.8;
}


/* =========================================================
   SWIPER
========================================================= */

.latestProductsSwiper {

    position: relative;

    padding:
        15px
        45px
        55px;

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


/* الكارت يأخذ عرض السلايد */

.latestProductsSwiper .swiper-slide > * {

    width: 100%;
}


/* =========================================================
   ARROWS
========================================================= */

.latest-products-next,
.latest-products-prev {

    width: 43px;
    height: 43px;

    border-radius: 50%;

    background: #2563eb;

    border: 3px solid #ffffff;

    box-shadow:
        0 8px 25px rgba(37, 99, 235, .20);

    transition:
        background .3s ease,
        transform .3s ease,
        box-shadow .3s ease;
}

.latest-products-next::after,
.latest-products-prev::after {

    font-size: 14px;

    font-weight: 900;

    color: #ffffff;
}

.latest-products-next:hover,
.latest-products-prev:hover {

    background: #1d4ed8;

    transform: scale(1.08);

    box-shadow:
        0 12px 30px rgba(37, 99, 235, .30);
}


/* =========================================================
   PAGINATION
========================================================= */

.latest-products-pagination {

    bottom: 8px !important;
}

.latest-products-pagination
.swiper-pagination-bullet {

    width: 8px;
    height: 8px;

    background: #94a3b8;

    opacity: .35;

    transition: all .3s ease;
}

.latest-products-pagination
.swiper-pagination-bullet-active {

    width: 25px;

    border-radius: 20px;

    background: #2563eb;

    opacity: 1;
}


/* =========================================================
   EMPTY PRODUCTS
========================================================= */

.sharek-empty-icon {

    width: 75px;
    height: 75px;

    margin: 0 auto;

    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #eff6ff;

    color: #2563eb;

    font-size: 34px;

    border: 1px solid #dbeafe;
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 768px) {

    .latest-products .section-title h2 {

        font-size: 27px;
    }

    .latest-products .section-title p {

        font-size: 13px;

        padding: 0 10px;
    }

    .latestProductsSwiper {

        padding:
            10px
            5px
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