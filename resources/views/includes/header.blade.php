<nav class="navbar navbar-expand-lg bg-white sticky-top ecommerce-navbar" dir="rtl">

    <div class="container">

        {{-- =========================
             BRAND
        ========================== --}}
        <a class="navbar-brand ecommerce-brand"
           href="{{ route('home') }}">

            <span class="brand-icon">
                <i class="bi bi-bag-heart-fill"></i>
            </span>

            <span>
                {{ $settings->site_name ?? 'شارك استور ' }}
            </span>

        </a>


        {{-- =========================
             MOBILE BUTTON
        ========================== --}}
        <button class="navbar-toggler ecommerce-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="فتح القائمة">

            <span></span>
            <span></span>
            <span></span>

        </button>


        {{-- =========================
             NAVBAR CONTENT
        ========================== --}}
        <div class="collapse navbar-collapse"
             id="mainNavbar">


            {{-- =========================
                 LINKS
            ========================== --}}
            <ul class="navbar-nav ecommerce-nav mx-lg-3">


                {{-- الرئيسية --}}
                <li class="nav-item">

                    <a href="{{ route('home') }}"
                       class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">

                        الرئيسية

                    </a>

                </li>


                {{-- المنتجات --}}
                <li class="nav-item dropdown">

                    <a href="{{ route('shop.index') }}"
                       class="nav-link dropdown-toggle {{ request()->routeIs('shop.*') ? 'active' : '' }}"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">

                        المنتجات

                    </a>


                    <ul class="dropdown-menu ecommerce-dropdown">

                        <li>

                            <a class="dropdown-item"
                               href="{{ route('shop.index') }}">

                                <i class="bi bi-grid-3x3-gap-fill"></i>

                                جميع المنتجات

                            </a>

                        </li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        @foreach($productCategories ?? [] as $category)

                            <li>

                                <a class="dropdown-item"
                                   href="{{ route('shop.category', $category->id) }}">

                                    <i class="bi bi-chevron-left"></i>

                                    {{ $category->name }}

                                </a>

                            </li>

                        @endforeach

                    </ul>

                </li>


                {{-- المقالات --}}
                <li class="nav-item">

                    <a href="{{ route('posts.index') }}"
                       class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}">

                        المقالات

                    </a>

                </li>


                {{-- تواصل معنا --}}
                <li class="nav-item">

                    <a href="{{ route('contact') }}"
                       class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">

                        تواصل معنا

                    </a>

                </li>

            </ul>


            {{-- =========================
                 SEARCH
            ========================== --}}
            <div class="navbar-search-wrapper">

                <form class="navbar-search"
                      id="productSearchForm"
                      action="{{ route('shop.index') }}"
                      method="GET">

                    <i class="bi bi-search search-icon"></i>

                    <input
                        type="search"
                        name="q"
                        id="productSearchInput"
                        class="search-input"
                        placeholder="ابحث عن منتج..."
                        autocomplete="off">

                    <button type="submit"
                            class="search-button"
                            aria-label="بحث">

                        <i class="bi bi-arrow-left"></i>

                    </button>

                </form>


                {{-- نتائج البحث --}}
                <div id="searchResults"
                     class="search-results">

                    <div class="search-loading d-none">
                        <i class="bi bi-arrow-repeat"></i>
                        جاري البحث...
                    </div>

                    <div class="search-empty d-none">
                        لم يتم العثور على منتجات
                    </div>

                    <div id="searchResultsList"></div>

                    <a href="{{ route('shop.index') }}"
                       id="showAllProducts"
                       class="show-all-products d-none">

                        عرض جميع المنتجات

                        <i class="bi bi-arrow-left"></i>

                    </a>

                </div>

            </div>


            {{-- =========================
                 CONTACT
            ========================== --}}
            <div class="navbar-actions">


                {{-- الهاتف --}}
                @if(!empty($settings?->phone))

                    <a
                        href="tel:{{ preg_replace('/[^0-9+]/', '', $settings->phone) }}"
                        class="navbar-action phone-action"
                        title="اتصل بنا">

                        <i class="bi bi-telephone-fill"></i>

                    </a>

                @endif


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
                        class="navbar-action whatsapp-action"
                        title="واتساب">

                        <i class="bi bi-whatsapp"></i>

                    </a>

                @endif


                {{-- =========================
                     CART
                ========================== --}}

<button
    type="button"
  id="cartToggle"
      class="cart-button"
    title="عربة التسوق">

    <i class="bi bi-cart3"></i>

    <span class="cart-text">
        العربة
    </span>

    <span id="navbarCartCount"
          class="cart-count">
        0
    </span>

</button>

            </div>

        </div>

    </div>

</nav>


<style>

/* =====================================================
   NAVBAR
===================================================== */

.ecommerce-navbar {

    min-height: 76px;

    background: rgba(255,255,255,.97) !important;

    border-bottom: 1px solid #eeeeee;

    box-shadow: 0 5px 25px rgba(0,0,0,.06);

    z-index: 99999;

}


/* =====================================================
   BRAND
===================================================== */

.ecommerce-brand {

    display: flex;

    align-items: center;

    gap: 9px;

    font-size: 23px;

    font-weight: 800;

    color: #0d6efd !important;

    text-decoration: none;

    white-space: nowrap;

}


.brand-icon {

    width: 39px;

    height: 39px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #0d6efd;

    color: white;

    border-radius: 11px;

    font-size: 18px;

}


/* =====================================================
   NAV LINKS
===================================================== */

.ecommerce-nav .nav-link {

    color: #252525;

    font-size: 14px;

    font-weight: 700;

    padding: 27px 11px;

    transition: .25s ease;

}


.ecommerce-nav .nav-link:hover,

.ecommerce-nav .nav-link.active {

    color: #0d6efd;

}


/* =====================================================
   DROPDOWN
===================================================== */

.ecommerce-dropdown {

    min-width: 235px;

    padding: 8px;

    margin-top: 2px !important;

    border: 0;

    border-radius: 14px;

    box-shadow: 0 15px 40px rgba(0,0,0,.13);

}


.ecommerce-dropdown .dropdown-item {

    display: flex;

    align-items: center;

    gap: 9px;

    padding: 11px 13px;

    border-radius: 9px;

    font-size: 14px;

    font-weight: 600;

    transition: .2s ease;

}


.ecommerce-dropdown .dropdown-item i {

    color: #0d6efd;

}


.ecommerce-dropdown .dropdown-item:hover {

    background: #eef5ff;

    color: #0d6efd;

    transform: translateX(-3px);

}


/* =====================================================
   SEARCH
===================================================== */

.navbar-search-wrapper {

    position: relative;

    flex: 1;

    max-width: 310px;

    margin-right: 10px;

}


.navbar-search {

    height: 44px;

    display: flex;

    align-items: center;

    background: #f6f8fb;

    border: 1px solid #e7eaf0;

    border-radius: 13px;

    padding: 0 12px;

    transition: .25s ease;

}


.navbar-search:focus-within {

    background: #fff;

    border-color: #0d6efd;

    box-shadow:
        0 0 0 3px rgba(13,110,253,.08);

}


.search-icon {

    color: #777;

    font-size: 15px;

}


.search-input {

    width: 100%;

    height: 100%;

    border: 0;

    outline: 0;

    background: transparent;

    padding: 0 10px;

    font-size: 13px;

    font-weight: 600;

    color: #222;

}


.search-input::placeholder {

    color: #999;

}


.search-button {

    width: 32px;

    height: 32px;

    border: 0;

    border-radius: 9px;

    background: #0d6efd;

    color: #fff;

    display: flex;

    align-items: center;

    justify-content: center;

    cursor: pointer;

}


.search-button:hover {

    background: #0958c7;

}


/* =====================================================
   SEARCH RESULTS
===================================================== */

.search-results {

    position: absolute;

    top: calc(100% + 8px);

    right: 0;

    width: 100%;

    min-width: 310px;

    background: #fff;

    border-radius: 15px;

    box-shadow: 0 18px 45px rgba(0,0,0,.15);

    border: 1px solid #eeeeee;

    overflow: hidden;

    display: none;

    z-index: 999999;

}


.search-results.show {

    display: block;

}


.search-result-item {

    display: flex;

    align-items: center;

    gap: 11px;

    padding: 10px 12px;

    color: #222;

    text-decoration: none;

    border-bottom: 1px solid #f1f1f1;

    transition: .2s ease;

}


.search-result-item:hover {

    background: #f7faff;

}


.search-result-image {

    width: 48px;

    height: 48px;

    border-radius: 9px;

    object-fit: cover;

    background: #f3f3f3;

}


.search-result-info {

    flex: 1;

    min-width: 0;

}


.search-result-name {

    font-size: 13px;

    font-weight: 700;

    color: #222;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;

}


.search-result-price {

    margin-top: 4px;

    font-size: 12px;

    font-weight: 700;

    color: #0d6efd;

}


.search-result-old-price {

    margin-right: 5px;

    color: #999;

    text-decoration: line-through;

    font-weight: 500;

}


.show-all-products {

    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 12px 14px;

    color: #0d6efd;

    font-size: 13px;

    font-weight: 700;

    text-decoration: none;

    background: #fafcff;

}


.show-all-products:hover {

    background: #f0f6ff;

}


.search-empty,

.search-loading {

    padding: 20px;

    text-align: center;

    color: #777;

    font-size: 13px;

}


.search-loading i {

    margin-left: 5px;

    animation: searchSpin 1s linear infinite;

}


@keyframes searchSpin {

    to {

        transform: rotate(360deg);

    }

}


/* =====================================================
   ACTIONS
===================================================== */

.navbar-actions {

    display: flex;

    align-items: center;

    gap: 7px;

    margin-right: 10px;

}


.navbar-action {

    width: 39px;

    height: 39px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 10px;

    text-decoration: none;

    transition: .25s ease;

}


.phone-action {

    color: #0d6efd;

    background: #eef5ff;

}


.phone-action:hover {

    background: #0d6efd;

    color: #fff;

}


.whatsapp-action {

    color: #25D366;

    background: #edfff4;

}


.whatsapp-action:hover {

    background: #25D366;

    color: #fff;

}


/* =====================================================
   CART
===================================================== */

.cart-button {

    position: relative;

    min-height: 42px;

    display: flex;

    align-items: center;

    gap: 7px;

    padding: 0 11px;

    border-radius: 11px;

    background: #0d6efd;

    color: #fff;

    text-decoration: none;

    font-size: 13px;

    font-weight: 700;

    transition: .25s ease;

}


.cart-button:hover {

    background: #0958c7;

    color: #fff;

    transform: translateY(-1px);

}


.cart-button > i {

    font-size: 18px;

}


.cart-count {

    min-width: 20px;

    height: 20px;

    padding: 0 5px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #fff;

    color: #0d6efd;

    border-radius: 50px;

    font-size: 11px;

    font-weight: 800;

}


/* =====================================================
   MOBILE TOGGLER
===================================================== */

.ecommerce-toggler {

    border: 0;

    padding: 7px;

}


.ecommerce-toggler:focus {

    box-shadow: none;

}


.ecommerce-toggler span {

    display: block;

    width: 25px;

    height: 2px;

    background: #222;

    margin: 5px 0;

    border-radius: 10px;

}


/* =====================================================
   MOBILE
===================================================== */

@media (max-width: 1199px) {

    .ecommerce-nav .nav-link {

        padding-left: 8px;

        padding-right: 8px;

    }

    .navbar-search-wrapper {

        max-width: 240px;

    }

}


@media (max-width: 991px) {

    .ecommerce-navbar {

        min-height: 68px;

    }


    .ecommerce-brand {

        font-size: 20px;

    }


    .brand-icon {

        width: 35px;

        height: 35px;

    }


    .ecommerce-nav {

        padding: 10px 0;

    }


    .ecommerce-nav .nav-link {

        padding: 11px 8px;

        border-radius: 8px;

    }


    .ecommerce-nav .nav-link:hover,

    .ecommerce-nav .nav-link.active {

        background: #f0f6ff;

    }


    .navbar-search-wrapper {

        width: 100%;

        max-width: none;

        margin: 5px 0 12px;

    }


    .search-results {

        min-width: 0;

        width: 100%;

    }


    .navbar-actions {

        margin: 0;

        padding-bottom: 15px;

        justify-content: flex-start;

    }


    .cart-button {

        flex: 1;

        justify-content: center;

        max-width: 150px;

    }


    .products-dropdown .dropdown-menu {

        position: static !important;

        width: 100%;

        box-shadow: none;

        border: 1px solid #eee;

        margin-top: 5px !important;

    }

}


@media (max-width: 450px) {

    .cart-text {

        display: none;

    }


    .cart-button {

        width: 45px;

        flex: 0 0 45px;

        padding: 0;

    }

}

</style>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const input = document.getElementById('productSearchInput');

    const results = document.getElementById('searchResults');

    const resultsList = document.getElementById('searchResultsList');

    const loading = document.querySelector('.search-loading');

    const empty = document.querySelector('.search-empty');

    const showAll = document.getElementById('showAllProducts');

    const form = document.getElementById('productSearchForm');

    let searchTimer;


    if (!input) return;


    input.addEventListener('input', function () {

        const query = this.value.trim();


        clearTimeout(searchTimer);


        if (query.length < 2) {

            results.classList.remove('show');

            resultsList.innerHTML = '';

            loading.classList.add('d-none');

            empty.classList.add('d-none');

            showAll.classList.add('d-none');

            return;

        }


        results.classList.add('show');

        loading.classList.remove('d-none');

        empty.classList.add('d-none');

        showAll.classList.add('d-none');

        resultsList.innerHTML = '';


        searchTimer = setTimeout(function () {

            fetch(
                `{{ route('products.search') }}?q=${encodeURIComponent(query)}`,
                {
                    headers: {
                        'Accept': 'application/json'
                    }
                }
            )
            .then(response => response.json())
            .then(products => {

                loading.classList.add('d-none');

                resultsList.innerHTML = '';


                if (!products.length) {

                    empty.classList.remove('d-none');

                    return;

                }


                showAll.classList.remove('d-none');


                products.forEach(product => {

                    let image = product.image
                        ? `/storage/${product.image}`
                        : '/images/default-product.png';


                    let price = '';

                    if (product.sale_price) {

                        price = `
                            ${Number(product.sale_price).toLocaleString('ar-EG')}
                            ج.م

                            <span class="search-result-old-price">
                                ${Number(product.price).toLocaleString('ar-EG')}
                                ج.م
                            </span>
                        `;

                    } else {

                        price = `
                            ${Number(product.price).toLocaleString('ar-EG')}
                            ج.م
                        `;

                    }


                    resultsList.insertAdjacentHTML(
                        'beforeend',
                        `
                        <a href="${product.url}"
                           class="search-result-item">

                            <img
                                src="${image}"
                                class="search-result-image"
                                alt="${product.name}">

                            <div class="search-result-info">

                                <div class="search-result-name">
                                    ${product.name}
                                </div>

                                <div class="search-result-price">
                                    ${price}
                                </div>

                            </div>

                            <i class="bi bi-chevron-left"></i>

                        </a>
                        `
                    );

                });

            })
            .catch(error => {

                console.error(error);

                loading.classList.add('d-none');

                empty.textContent =
                    'حدث خطأ أثناء البحث';

                empty.classList.remove('d-none');

            });

        }, 300);

    });


    /*
     * Submit
     */
    form.addEventListener('submit', function (event) {

        const query = input.value.trim();

        if (!query) {

            event.preventDefault();

            input.focus();

        }

    });


    /*
     * Close when clicking outside
     */
    document.addEventListener('click', function (event) {

        if (!event.target.closest('.navbar-search-wrapper')) {

            results.classList.remove('show');

        }

    });


    /*
     * Open again when focusing
     */
    input.addEventListener('focus', function () {

        if (this.value.trim().length >= 2) {

            results.classList.add('show');

        }

    });

});

</script>