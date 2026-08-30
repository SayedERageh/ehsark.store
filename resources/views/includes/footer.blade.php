<footer id="footer" class="footer dark-background" dir="rtl">

    <div class="footer-top">

        <div class="container">

            <div class="row gy-4">

                {{-- About --}}
                <div class="col-lg-4 col-md-6 footer-about">

                    <a href="{{ route('home') }}"
                       class="logo d-flex align-items-center">

                        <span class="sitename">
                            {{ $settings->site_name ?? 'أوتاد مصر' }}
                        </span>

                    </a>

                    <div class="footer-contact pt-3">

                        {{-- وصف الموقع --}}
                        @if(!empty($settings?->site_description))
                            <p>
                                {{ $settings->site_description }}
                            </p>
                        @endif

                        {{-- العنوان --}}
                        @if(!empty($settings?->address))
                            <p>
                                {{ $settings->address }}
                            </p>
                        @endif

                        {{-- رقم التواصل --}}
                        @if(!empty($settings?->phone))
                            <p class="mt-3">

                                <strong>رقم التواصل:</strong>

                                <span>
                                    {{ $settings->phone }}
                                </span>

                            </p>
                        @endif

                        <p>
                            <strong>
                                متاحون لخدمتكم طوال أيام الأسبوع
                            </strong>
                        </p>

                    </div>

                </div>


                {{-- Quick Links --}}
                <div class="col-lg-2 col-md-3 footer-links">

                    <h4>روابط سريعة</h4>

                    <ul>

                        <li>
                            <a href="{{ route('home') }}">
                                الرئيسية
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('about') }}">
                                من نحن
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('shop.index') }}">
                                المنتجات
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('posts.index') }}">
                                المقالات
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('contact') }}">
                                تواصل معنا
                            </a>
                        </li>

                    </ul>

                </div>


             {{-- Categories --}}

<div class="col-lg-2 col-md-3 footer-links">

      
<h4>أقسام المتجر</h4>

<ul>

    @foreach($productCategories ?? [] as $category)

        <li>

            <a href="{{ route('shop.category', $category->id) }}">

                <i class="bi bi-chevron-left ms-1"></i>

                {{ $category->name }}

            </a>

        </li>

    @endforeach

</ul>
      

</div>



                {{-- CTA --}}
                <div class="col-lg-4 col-md-12 footer-links">

                    <h4>اطلب الآن</h4>

                    <p>
                        {{ $settings->site_description ?? '' }}
                    </p>


                    {{-- اتصال --}}
                    @if(!empty($settings?->phone))

                        <a
                            href="tel:{{ preg_replace('/[^0-9+]/', '', $settings->phone) }}"
                            class="btn btn-primary mt-2"
                        >
                            <i class="bi bi-telephone-fill ms-1"></i>
                            اتصل الآن
                        </a>

                    @endif


                    {{-- واتساب --}}
                    @if(!empty($settings?->whatsapp))

                        <a
                            href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings->whatsapp) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="btn btn-success mt-2"
                        >
                            <i class="bi bi-whatsapp ms-1"></i>
                            واتساب
                        </a>

                    @endif


                    {{-- Footer Text --}}
                    @if(!empty($settings?->footer_text))

                        <p class="mt-3 small">
                            {{ $settings->footer_text }}
                        </p>

                    @endif

                </div>

            </div>

        </div>

    </div>


    {{-- Copyright --}}
    <div class="copyright text-center">

        <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-center">

            <div>

                {{ $settings->footer_text ?? '© جميع الحقوق محفوظة' }}

                <strong>
                    <span>
                        {{ $settings->site_name ?? 'أوتاد مصر' }}
                    </span>
                </strong>

            </div>


            {{-- Social --}}
            <div class="social-links mt-3 mt-lg-0">


                {{-- Phone --}}
                @if(!empty($settings?->phone))

                    <a
                        href="tel:{{ preg_replace('/[^0-9+]/', '', $settings->phone) }}"
                        aria-label="اتصال"
                        title="اتصال"
                    >
                        <i class="bi bi-telephone-fill"></i>
                    </a>

                @endif


                {{-- WhatsApp --}}
                @if(!empty($settings?->whatsapp))

                    <a
                        href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings->whatsapp) }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="واتساب"
                        title="واتساب"
                    >
                        <i class="bi bi-whatsapp"></i>
                    </a>

                @endif


                {{-- Facebook --}}
                @if(!empty($settings?->facebook))

                    <a
                        href="{{ $settings->facebook }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Facebook"
                        title="Facebook"
                    >
                        <i class="bi bi-facebook"></i>
                    </a>

                @endif


                {{-- Instagram --}}
                @if(!empty($settings?->instagram))

                    <a
                        href="{{ $settings->instagram }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Instagram"
                        title="Instagram"
                    >
                        <i class="bi bi-instagram"></i>
                    </a>

                @endif


                {{-- TikTok --}}
                @if(!empty($settings?->tiktok))

                    <a
                        href="{{ $settings->tiktok }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="TikTok"
                        title="TikTok"
                    >
                        <i class="bi bi-tiktok"></i>
                    </a>

                @endif


                {{-- YouTube --}}
                @if(!empty($settings?->youtube))

                    <a
                        href="{{ $settings->youtube }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="YouTube"
                        title="YouTube"
                    >
                        <i class="bi bi-youtube"></i>
                    </a>

                @endif

            </div>

        </div>

    </div>

</footer>