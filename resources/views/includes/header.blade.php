
<nav class="navbar navbar-expand-lg bg-white sticky-top ecommerce-navbar" dir="rtl">

    <div class="container-fluid navbar-container">

        {{-- =========================
             BRAND
        ========================== --}}
        <a class="navbar-brand ecommerce-brand"
           href="{{ route('home') }}">

            <span class="brand-icon">
                <i class="bi bi-bag-heart-fill"></i>
            </span>

            <span class="brand-name">
                {{ $settings->site_name ?? 'شــارك استور ' }}
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
            <ul class="navbar-nav ecommerce-nav">

                {{-- الرئيسية --}}
                <li class="nav-item">

                    <a href="{{ route('home') }}"
                       class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">

                        <i class="bi bi-house-door"></i>

                        الرئيسية

                    </a>

                </li>


                {{-- من نحن --}}
                <li class="nav-item">

                    <a href="{{ route('about') }}"
                       class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">

                        <i class="bi bi-info-circle"></i>

                        من نحن

                    </a>

                </li>


                {{-- الخدمات --}}
                <li class="nav-item">

                    <a href="{{ route('services.index') }}"
                       class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">

                        <i class="bi bi-tools"></i>

                        الخدمات

                    </a>

                </li>


                {{-- =========================
                     المنتجات
                ========================== --}}
                <li class="nav-item dropdown products-dropdown">

                    <a href="{{ route('shop.index') }}"
                       class="nav-link dropdown-toggle {{ request()->routeIs('shop.*') ? 'active' : '' }}"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">

                        <i class="bi bi-grid-3x3-gap"></i>

                        المنتجات

                    </a>


                    <ul class="dropdown-menu ecommerce-dropdown">

                        {{-- جميع المنتجات --}}
                        <li>

                            <a class="dropdown-item"
                               href="{{ route('shop.index') }}">

                                <span class="dropdown-icon">
                                    <i class="bi bi-grid-3x3-gap-fill"></i>
                                </span>

                                <span>
                                    جميع المنتجات
                                </span>

                            </a>

                        </li>


                        @if(!empty($productCategories) && $productCategories->count())

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            @foreach($productCategories as $category)

                                <li>

                                    <a class="dropdown-item"
                                       href="{{ route('shop.category', $category->id) }}">

                                        <span class="dropdown-icon">
                                            <i class="bi bi-chevron-left"></i>
                                        </span>

                                        <span>
                                            {{ $category->name }}
                                        </span>

                                    </a>

                                </li>

                            @endforeach

                        @endif

                    </ul>

                </li>


                {{-- المقالات --}}
                <li class="nav-item">

                    <a href="{{ route('posts.index') }}"
                       class="nav-link {{ request()->routeIs('posts.*') ? 'active' : '' }}">

                        <i class="bi bi-journal-text"></i>

                        المقالات

                    </a>

                </li>


                {{-- تواصل معنا --}}
                <li class="nav-item">

                    <a href="{{ route('contact') }}"
                       class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">

                        <i class="bi bi-envelope"></i>

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

                        <span>
                            عرض جميع المنتجات
                        </span>

                        <i class="bi bi-arrow-left"></i>

                    </a>

                </div>

            </div>


            {{-- =========================
                 ACTIONS
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

    background: rgba(255,255,255,.98) !important;

    border-bottom: 1px solid #eeeeee;

    box-shadow: 0 5px 25px rgba(0,0,0,.06);

    z-index: 99999;

}


.navbar-container {

    width: 100%;

    max-width: 1500px;

    margin: auto;

    padding-left: 25px;

    padding-right: 25px;

}


/* =====================================================
   BRAND
===================================================== */

.ecommerce-brand {

    display: flex;

    align-items: center;

    gap: 9px;

    font-size: 21px;

    font-weight: 800;

    color: #0d6efd !important;

    text-decoration: none;

    white-space: nowrap;

    flex-shrink: 0;

}


.brand-icon {

    width: 40px;

    height: 40px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #0d6efd;

    color: #fff;

    border-radius: 11px;

    font-size: 18px;

    box-shadow: 0 5px 15px rgba(13,110,253,.20);

}


.brand-name {

    line-height: 1;

}


/* =====================================================
   NAVIGATION
===================================================== */

.ecommerce-nav {

    display: flex;

    align-items: center;

    gap: 1px;

    margin-right: 15px;

    flex-shrink: 0;

}


.ecommerce-nav .nav-item {

    white-space: nowrap;

}


.ecommerce-nav .nav-link {

    display: flex;

    align-items: center;

    gap: 6px;

    color: #252525;

    font-size: 13px;

    font-weight: 700;

    padding: 27px 9px;

    transition: .25s ease;

    border-radius: 8px;

}


.ecommerce-nav .nav-link i {

    font-size: 14px;

    opacity: .85;

}


.ecommerce-nav .nav-link:hover,

.ecommerce-nav .nav-link.active {

    color: #0d6efd;

}


.ecommerce-nav .nav-link.active i {

    color: #0d6efd;

}


/* =====================================================
   DROPDOWN
===================================================== */

.products-dropdown {

    position: relative;

}


.ecommerce-dropdown {

    min-width: 245px;

    padding: 8px;

    margin-top: 3px !important;

    border: 0;

    border-radius: 14px;

    box-shadow: 0 15px 40px rgba(0,0,0,.13);

}


.ecommerce-dropdown .dropdown-item {

    display: flex;

    align-items: center;

    gap: 10px;

    padding: 11px 13px;

    border-radius: 9px;

    font-size: 13px;

    font-weight: 600;

    color: #333;

    transition: .2s ease;

}


.dropdown-icon {

    width: 25px;

    height: 25px;

    display: flex;

    align-items: center;

    justify-content: center;

    color: #0d6efd;

    background: #eef5ff;

    border-radius: 7px;

    font-size: 11px;

}


.ecommerce-dropdown .dropdown-item:hover {

    background: #eef5ff;

    color: #0d6efd;

    transform: translateX(-3px);

}


.ecommerce-dropdown .dropdown-divider {

    margin: 7px 3px;

    border-color: #eeeeee;

}


/* =====================================================
   SEARCH
===================================================== */

.navbar-search-wrapper {

    position: relative;

    flex: 1;

    max-width: 300px;

    min-width: 180px;

    margin-right: 15px;

}


.navbar-search {

    height: 44px;

    display: flex;

    align-items: center;

    background: #f6f8fb;

    border: 1px solid #e7eaf0;

    border-radius: 13px;

    padding: 0 11px;

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

    font-size: 14px;

    flex-shrink: 0;

}


.search-input {

    width: 100%;

    height: 100%;

    border: 0;

    outline: 0;

    background: transparent;

    padding: 0 9px;

    font-size: 12px;

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

    flex-shrink: 0;

    transition: .2s ease;

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

    min-width: 300px;

    max-height: 430px;

    overflow-y: auto;

    background: #fff;

    border-radius: 15px;

    box-shadow: 0 18px 45px rgba(0,0,0,.15);

    border: 1px solid #eeeeee;

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

    flex-shrink: 0;

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

    flex-shrink: 0;

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

    justify-content: center;

    gap: 7px;

    padding: 0 11px;

    border: 0;

    border-radius: 11px;

    background: #0d6efd;

    color: #fff;

    font-size: 12px;

    font-weight: 700;

    cursor: pointer;

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

    font-size: 10px;

    font-weight: 800;

}


/* =====================================================
   MOBILE TOGGLER
===================================================== */

.ecommerce-toggler {

    border: 0;

    padding: 7px;

    outline: none !important;

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
   LARGE TABLET
===================================================== */

@media (max-width: 1300px) {

    .navbar-container {

        padding-left: 18px;

        padding-right: 18px;

    }


    .ecommerce-brand {

        font-size: 19px;

    }


    .ecommerce-nav {

        margin-right: 8px;

    }


    .ecommerce-nav .nav-link {

        padding-left: 6px;

        padding-right: 6px;

        font-size: 12px;

    }


    .navbar-search-wrapper {

        max-width: 230px;

        margin-right: 8px;

    }

}


/* =====================================================
   TABLET / MOBILE
===================================================== */

@media (max-width: 991px) {

    .ecommerce-navbar {

        min-height: 68px;

    }


    .navbar-container {

        padding: 10px 15px;

    }


    .ecommerce-brand {

        font-size: 19px;

    }


    .brand-icon {

        width: 36px;

        height: 36px;

        font-size: 16px;

    }


    .ecommerce-toggler {

        margin-right: auto;

    }


    #mainNavbar {

        width: 100%;

        padding-top: 10px;

    }


    .ecommerce-nav {

        display: block;

        width: 100%;

        margin: 0;

        padding: 5px 0;

    }


    .ecommerce-nav .nav-item {

        width: 100%;

    }


    .ecommerce-nav .nav-link {

        width: 100%;

        padding: 12px 13px;

        border-radius: 9px;

        justify-content: flex-start;

    }


    .ecommerce-nav .nav-link:hover,

    .ecommerce-nav .nav-link.active {

        background: #f0f6ff;

    }


    /* Dropdown */

    .products-dropdown .dropdown-menu {

        position: static !important;

        width: 100%;

        min-width: 0;

        margin: 5px 0 8px !important;

        box-shadow: none;

        border: 1px solid #eeeeee;

        border-radius: 12px;

    }


    .ecommerce-dropdown .dropdown-item {

        padding: 10px 13px;

    }


    /* Search */

    .navbar-search-wrapper {

        width: 100%;

        max-width: none;

        min-width: 0;

        margin: 8px 0 12px;

    }


    .navbar-search {

        width: 100%;

    }


    .search-results {

        min-width: 0;

        width: 100%;

    }


    /* Actions */

    .navbar-actions {

        width: 100%;

        margin: 0;

        padding: 5px 0 15px;

        justify-content: flex-start;

    }


    .cart-button {

        flex: 1;

        max-width: 160px;

    }

}


/* =====================================================
   SMALL MOBILE
===================================================== */

@media (max-width: 575px) {

    .navbar-container {

        padding-left: 12px;

        padding-right: 12px;

    }


    .ecommerce-brand {

        font-size: 17px;

    }


    .brand-icon {

        width: 34px;

        height: 34px;

        border-radius: 9px;

    }


    .navbar-action {

        width: 40px;

        height: 40px;

    }


    .cart-button {

        max-width: 140px;

    }

}


/* =====================================================
   VERY SMALL MOBILE
===================================================== */

@media (max-width: 400px) {

    .brand-name {

        max-width: 150px;

        overflow: hidden;

        text-overflow: ellipsis;

    }


    .cart-text {

        display: none;

    }


    .cart-button {

        width: 44px;

        min-width: 44px;

        max-width: 44px;

        flex: 0 0 44px;

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

    let searchTimer = null;


    if (!input || !results || !form) {
        return;
    }


    /* =====================================================
       SEARCH
    ===================================================== */

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

            .then(response => {

                if (!response.ok) {
                    throw new Error('Search request failed');
                }

                return response.json();

            })

            .then(products => {

                loading.classList.add('d-none');

                resultsList.innerHTML = '';


                if (!Array.isArray(products) || !products.length) {

                    empty.textContent =
                        'لم يتم العثور على منتجات';

                    empty.classList.remove('d-none');

                    return;

                }


                showAll.classList.remove('d-none');


                products.forEach(product => {

                    const image = product.image
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


    /* =====================================================
       FORM SUBMIT
    ===================================================== */

    form.addEventListener('submit', function (event) {

        const query = input.value.trim();


        if (!query) {

            event.preventDefault();

            input.focus();

        }

    });


    /* =====================================================
       CLOSE SEARCH
    ===================================================== */

    document.addEventListener('click', function (event) {

        if (!event.target.closest('.navbar-search-wrapper')) {

            results.classList.remove('show');

        }

    });


    /* =====================================================
       FOCUS
    ===================================================== */

    input.addEventListener('focus', function () {

        if (this.value.trim().length >= 2) {

            results.classList.add('show');

        }

    });

});

</script>
