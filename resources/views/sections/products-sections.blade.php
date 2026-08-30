{{-- =========================================================
PRODUCTS SECTIONS
========================================================= --}}

<section class="home-products-sections" dir="rtl">

```
<div class="container">


    {{-- =====================================================
         المنتجات المميزة
    ====================================================== --}}

    @if($featuredProducts->count())

        <section class="product-section featured-products-section">

            <div class="section-heading">

                <div class="section-heading-content">

                    <span class="section-badge">
                        مميز
                    </span>

                    <h2>
                        المنتجات المميزة
                    </h2>

                    <p>
                        مجموعة مختارة من أفضل منتجاتنا
                    </p>

                </div>

                <a
                    href="{{ route('shop.index') }}"
                    class="section-more"
                >
                    عرض الكل
                    <i class="bi bi-arrow-left"></i>
                </a>

            </div>


            {{-- Swiper --}}
            <div class="swiper productsSwiper featuredSwiper">

                <div class="swiper-wrapper">

                    @foreach($featuredProducts as $product)

                        <div class="swiper-slide">

                            @include('shop.partials.product-card', [
                                'product' => $product
                            ])

                        </div>

                    @endforeach

                </div>


                {{-- Navigation --}}
                <div class="swiper-button-next featured-next"></div>

                <div class="swiper-button-prev featured-prev"></div>


                {{-- Pagination --}}
                <div class="swiper-pagination featured-pagination"></div>

            </div>

        </section>

    @endif



    {{-- =====================================================
         الأقسام
    ====================================================== --}}

    @foreach($categories as $category)

        @if($category->products->count())

            <section
                class="product-section category-products-section"
            >

                <div class="section-heading">

                    <div class="section-heading-content">

                        <span class="section-badge">
                            قسم المنتجات
                        </span>

                        <h2>
                            {{ $category->name }}
                        </h2>

                        <p>
                            منتجات {{ $category->name }}
                        </p>

                    </div>


                    <a
                        href="{{ route('shop.category', $category->id) }}"
                        class="section-more"
                    >
                        عرض الكل
                        <i class="bi bi-arrow-left"></i>
                    </a>

                </div>


                {{-- Swiper --}}
                <div
                    class="swiper productsSwiper categorySwiper"
                >

                    <div class="swiper-wrapper">

                        @foreach($category->products as $product)

                            <div class="swiper-slide">

                                @include(
                                    'shop.partials.product-card',
                                    [
                                        'product' => $product
                                    ]
                                )

                            </div>

                        @endforeach

                    </div>


                    {{-- Navigation --}}
                    <div class="swiper-button-next"></div>

                    <div class="swiper-button-prev"></div>


                    {{-- Pagination --}}
                    <div class="swiper-pagination"></div>

                </div>

            </section>

        @endif

    @endforeach

</div>
```

</section>

<style>

/* =========================================================
   PRODUCTS SECTIONS
========================================================= */

.home-products-sections {
    padding: 70px 0;
    background: #fff;
}


/* =========================================================
   SECTION
========================================================= */

.product-section {
    position: relative;

    margin-bottom: 75px;
}


.product-section:last-child {
    margin-bottom: 0;
}


/* =========================================================
   HEADING
========================================================= */

.section-heading {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 20px;

    margin-bottom: 28px;
}


.section-heading-content {
    min-width: 0;
}


.section-badge {

    display: inline-flex;

    align-items: center;

    padding: 5px 12px;

    margin-bottom: 8px;

    border-radius: 50px;

    background: #eef7fb;

    color: #0b7fab;

    font-size: 11px;

    font-weight: 800;
}


.section-heading h2 {

    margin: 0;

    color: #142033;

    font-size: 28px;

    font-weight: 900;
}


.section-heading p {

    margin: 7px 0 0;

    color: #8993a4;

    font-size: 13px;
}


/* =========================================================
   MORE BUTTON
========================================================= */

.section-more {

    flex-shrink: 0;

    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 10px 16px;

    border: 1px solid #e2e8ef;

    border-radius: 10px;

    color: #142033;

    background: #fff;

    text-decoration: none;

    font-size: 12px;

    font-weight: 800;

    transition: .25s;
}


.section-more:hover {

    background: #0b7fab;

    border-color: #0b7fab;

    color: #fff;

    transform: translateX(-3px);
}


/* =========================================================
   SWIPER
========================================================= */

.productsSwiper {

    position: relative;

    padding: 5px 5px 45px;
}


.productsSwiper .swiper-slide {

    height: auto;

    display: flex;
}


/* =========================================================
   NAVIGATION
========================================================= */

.productsSwiper .swiper-button-next,
.productsSwiper .swiper-button-prev {

    width: 40px;
    height: 40px;

    border-radius: 50%;

    background: #fff;

    box-shadow:
        0 5px 20px rgba(15,23,42,.12);

    color: #0b7fab;
}


.productsSwiper .swiper-button-next::after,
.productsSwiper .swiper-button-prev::after {

    font-size: 15px;

    font-weight: 900;
}


/* =========================================================
   PAGINATION
========================================================= */

.productsSwiper .swiper-pagination {

    bottom: 5px;
}


.productsSwiper
.swiper-pagination-bullet {

    width: 7px;
    height: 7px;

    opacity: .35;
}


.productsSwiper
.swiper-pagination-bullet-active {

    width: 20px;

    border-radius: 10px;

    opacity: 1;

    background: #0b7fab;
}


/* =========================================================
   MOBILE
========================================================= */

@media(max-width: 576px) {

    .home-products-sections {

        padding: 45px 0;
    }


    .product-section {

        margin-bottom: 50px;
    }


    .section-heading {

        align-items: flex-start;
    }


    .section-heading h2 {

        font-size: 22px;
    }


    .section-heading p {

        font-size: 11px;
    }


    .section-more {

        padding: 8px 11px;

        font-size: 10px;
    }


    .productsSwiper {

        padding-left: 0;

        padding-right: 0;
    }


    .productsSwiper
    .swiper-button-next,
    .productsSwiper
    .swiper-button-prev {

        width: 34px;
        height: 34px;
    }


    .productsSwiper
    .swiper-button-next::after,
    .productsSwiper
    .swiper-button-prev::after {

        font-size: 12px;
    }

}

</style>

{{-- =========================================================
SWIPER INITIALIZATION
========================================================= --}}

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {


    /* =====================================================
       المنتجات المميزة
    ====================================================== */

    const featuredSwiper = document.querySelector('.featuredSwiper');

    if (featuredSwiper) {

        new Swiper(featuredSwiper, {

            loop: true,

            spaceBetween: 20,

            slidesPerView: 1,

            navigation: {

                nextEl: '.featured-next',

                prevEl: '.featured-prev',

            },

            pagination: {

                el: '.featured-pagination',

                clickable: true,

            },

            breakpoints: {

                576: {
                    slidesPerView: 2,
                },

                768: {
                    slidesPerView: 3,
                },

                1200: {
                    slidesPerView: 4,
                }

            }

        });

    }


    /* =====================================================
       أقسام المنتجات
    ====================================================== */

    document
        .querySelectorAll('.categorySwiper')
        .forEach(function (slider) {

            const nextButton =
                slider.querySelector('.swiper-button-next');

            const prevButton =
                slider.querySelector('.swiper-button-prev');

            const pagination =
                slider.querySelector('.swiper-pagination');


            new Swiper(slider, {

                loop: true,

                spaceBetween: 20,

                slidesPerView: 1,

                navigation: {

                    nextEl: nextButton,

                    prevEl: prevButton,

                },

                pagination: {

                    el: pagination,

                    clickable: true,

                },

                breakpoints: {

                    576: {
                        slidesPerView: 2,
                    },

                    768: {
                        slidesPerView: 3,
                    },

                    1200: {
                        slidesPerView: 4,
                    }

                }

            });

        });

});

</script>

@endpush
