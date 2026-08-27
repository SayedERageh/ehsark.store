<nav class="navbar navbar-expand-lg bg-white sticky-top main-navbar" dir="rtl">
    <div class="container">

        {{-- اسم الموقع --}}
        <a class="navbar-brand site-brand"
           href="{{ route('home') }}">

            {{ $settings->site_name ?? 'أوتاد مصر' }}

        </a>


        {{-- Mobile Menu --}}
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="فتح القائمة">

            <span class="navbar-toggler-icon"></span>

        </button>


        {{-- Navbar Content --}}
        <div class="collapse navbar-collapse" id="mainNavbar">


            {{-- Links --}}
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">


                {{-- الرئيسية --}}
                <li class="nav-item">
                    <a href="{{ route('home') }}"
                       class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">

                        الرئيسية

                    </a>
                </li>


                {{-- من نحن --}}
                <li class="nav-item">
                    <a href="{{ route('about') }}"
                       class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">

                        من نحن

                    </a>
                </li>


                {{-- المنتجات --}}
                <li class="nav-item dropdown products-dropdown">

                    <a href="{{ route('shop.index') }}"
                       class="nav-link dropdown-toggle {{ request()->routeIs('shop.*') ? 'active' : '' }}"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">

                        المنتجات

                    </a>


                    {{-- Dropdown --}}
                    <ul class="dropdown-menu products-menu text-end">

                        {{-- كل المنتجات --}}
                        <li>

                            <a class="dropdown-item"
                               href="{{ route('shop.index') }}">

                                <i class="bi bi-grid-3x3-gap ms-2"></i>

                                كل المنتجات

                            </a>

                        </li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        {{-- الأقسام --}}
                        @foreach($productCategories ?? [] as $category)

                            <li>

                                <a class="dropdown-item"
                                   href="{{ route('shop.category', $category->id) }}">

                                    <i class="bi bi-chevron-left ms-2"></i>

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


            {{-- الاتصال والواتساب --}}
            <div class="navbar-contact d-flex align-items-center gap-2">


                {{-- الاتصال --}}
                @if(!empty($settings?->phone))

                    <a
                        href="tel:{{ preg_replace('/[^0-9+]/', '', $settings->phone) }}"
                        class="contact-icon phone-icon"
                        aria-label="اتصل بنا"
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
                        class="contact-icon whatsapp-icon"
                        aria-label="واتساب"
                        title="واتساب">

                        <i class="bi bi-whatsapp"></i>

                    </a>

                @endif

            </div>

        </div>

    </div>
</nav>


<style>

/* =====================================================
   NAVBAR
===================================================== */

.main-navbar {

    min-height: 72px;

    background: rgba(255, 255, 255, 0.97) !important;

    box-shadow:
        0 4px 20px rgba(0, 0, 0, .07);

    border-bottom:
        1px solid rgba(0, 0, 0, .05);

    position: sticky;

    top: 0;

    z-index: 99999;

}


/* =====================================================
   SITE NAME
===================================================== */

.site-brand {

    font-size: 25px;

    font-weight: 800;

    color: #0d6efd !important;

    text-decoration: none;

    letter-spacing: -.5px;

    transition: .3s ease;

}


.site-brand:hover {

    transform: translateY(-1px);

    color: #0958c7 !important;

}


/* =====================================================
   NAV LINKS
===================================================== */

.main-navbar .nav-link {

    position: relative;

    color: #222;

    font-size: 15px;

    font-weight: 600;

    padding:
        24px 15px;

    transition: .25s ease;

}


/* الخط تحت الرابط */

.main-navbar .nav-link::after {

    content: "";

    position: absolute;

    bottom: 12px;

    right: 15px;

    width: 0;

    height: 2px;

    background: #0d6efd;

    border-radius: 10px;

    transition: .3s ease;

}


.main-navbar .nav-link:hover,

.main-navbar .nav-link.active {

    color: #0d6efd;

}


.main-navbar .nav-link:hover::after,

.main-navbar .nav-link.active::after {

    width: calc(100% - 30px);

}


/* =====================================================
   PRODUCTS DROPDOWN
===================================================== */

.products-dropdown {

    position: relative;

    z-index: 100000;
}


/* القائمة */

.products-menu {

    min-width: 240px;

    margin-top: 5px !important;

    padding: 8px;

    background: #fff;

    border: 0;

    border-radius: 14px;

    box-shadow:
        0 15px 45px rgba(0, 0, 0, .15);

    z-index: 999999 !important;

}


/* عناصر القائمة */

.products-menu .dropdown-item {

    display: flex;

    align-items: center;

    padding: 11px 13px;

    margin: 2px 0;

    border-radius: 9px;

    color: #333;

    font-size: 14px;

    font-weight: 600;

    transition: .2s ease;

}


/* الأيقونة */

.products-menu .dropdown-item i {

    color: #0d6efd;

    font-size: 13px;

    transition: .2s ease;

}


/* Hover */

.products-menu .dropdown-item:hover {

    background: #eef5ff;

    color: #0d6efd;

    transform: translateX(-3px);

}


.products-menu .dropdown-item:hover i {

    transform: translateX(-3px);

}


/* Divider */

.products-menu .dropdown-divider {

    margin:
        6px 4px;

    opacity: .08;

}


/* =====================================================
   CONTACT BUTTONS
===================================================== */

.navbar-contact {

    margin-right: 15px;

}


.contact-icon {

    width: 42px;

    height: 42px;

    border-radius: 50%;

    display: flex;

    align-items: center;

    justify-content: center;

    text-decoration: none;

    font-size: 17px;

    transition: .3s ease;

    background: #fff;

}


/* Phone */

.phone-icon {

    color: #0d6efd;

    border:
        1px solid rgba(13, 110, 253, .35);

}


.phone-icon:hover {

    background: #0d6efd;

    color: #fff;

    transform:
        translateY(-3px);

    box-shadow:
        0 7px 18px rgba(13, 110, 253, .25);

}


/* WhatsApp */

.whatsapp-icon {

    color: #25D366;

    border:
        1px solid rgba(37, 211, 102, .35);

}


.whatsapp-icon:hover {

    background: #25D366;

    color: #fff;

    transform:
        translateY(-3px);

    box-shadow:
        0 7px 18px rgba(37, 211, 102, .25);

}


/* =====================================================
   MOBILE
===================================================== */

@media (max-width: 991px) {


    .main-navbar {

        min-height: auto;

    }


    .main-navbar .nav-link {

        padding:
            12px 15px;

    }


    .main-navbar .nav-link::after {

        display: none;

    }


    .navbar-nav {

        padding:
            10px 0;

    }


    .navbar-contact {

        margin-right: 0;

        padding:
            10px 0 15px;

    }


    .products-menu {

        position: static !important;

        width: 100%;

        margin-top: 0 !important;

        box-shadow: none;

        border:
            1px solid #eee;

    }

}

</style>