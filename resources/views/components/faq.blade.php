{{-- FAQ Section --}}
<section class="faq-section" dir="rtl">

    <div class="container">

        {{-- العنوان --}}
        <div class="section-heading text-center mb-5">

            <span>الأسئلة الشائعة</span>

            <h2>الأسئلة التي تهمك</h2>

            <p>
                جمعنا لك أهم الأسئلة والاستفسارات حول منتجاتنا وخدماتنا
                لتجد الإجابة بسهولة.
            </p>

        </div>


        {{-- الأسئلة --}}
        @php
            $faqs = \App\Models\Faq::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->get();
        @endphp


        <div class="faq-list">

            @forelse ($faqs as $index => $faq)

                <div class="faq-item {{ $index === 0 ? 'faq-active' : '' }}">

                    {{-- الأيقونة --}}
                    <div class="faq-icon-wrapper">

                        <i class="faq-icon bi bi-question-lg"></i>

                    </div>


                    {{-- السؤال والإجابة --}}
                    <div class="faq-body">

                        <h3>
                            {{ $faq->question }}
                        </h3>

                        <div class="faq-content">

                            <p>
                                {{ $faq->answer }}
                            </p>

                        </div>

                    </div>


                    {{-- زر الفتح --}}
                    <button
                        type="button"
                        class="faq-toggle"
                        aria-label="فتح السؤال"
                    >

                        <i class="bi bi-chevron-down"></i>

                    </button>

                </div>

            @empty

                <div class="faq-empty text-center">

                    <i class="bi bi-question-circle"></i>

                    <h3>لا توجد أسئلة حاليًا</h3>

                    <p>
                        سيتم إضافة الأسئلة الشائعة قريبًا.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>


<style>

    /* =========================================
       FAQ SECTION
    ========================================== */

    .faq-section {
        padding: 80px 0;
        background: #f8fafc;
    }


    /* =========================================
       Heading
    ========================================== */

    .faq-section .section-heading span {
        display: inline-block;
        margin-bottom: 10px;
        color: #0d6efd;
        font-size: 15px;
        font-weight: 700;
    }

    .faq-section .section-heading h2 {
        margin-bottom: 15px;
        font-size: 36px;
        font-weight: 800;
        color: #172033;
    }

    .faq-section .section-heading p {
        max-width: 650px;
        margin: auto;
        color: #6b7280;
        line-height: 1.9;
    }


    /* =========================================
       FAQ LIST
    ========================================== */

    .faq-list {
        max-width: 900px;
        margin: 0 auto;
    }


    /* =========================================
       FAQ ITEM
    ========================================== */

    .faq-item {
        position: relative;

        display: flex;
        align-items: flex-start;

        gap: 18px;

        padding: 22px 24px;

        margin-bottom: 15px;

        background: #fff;

        border: 1px solid #e8edf3;

        border-radius: 16px;

        box-shadow: 0 5px 20px rgba(0, 0, 0, .04);

        transition:
            transform .3s ease,
            box-shadow .3s ease,
            border-color .3s ease;
    }


    .faq-item:hover {
        transform: translateY(-2px);

        box-shadow: 0 10px 30px rgba(0, 0, 0, .08);

        border-color: rgba(13, 110, 253, .25);
    }


    /* =========================================
       ICON
    ========================================== */

    .faq-icon-wrapper {
        flex: 0 0 48px;

        width: 48px;
        height: 48px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 12px;

        background: #eef5ff;

        color: #0d6efd;

        transition: .3s ease;
    }

    .faq-icon {
        font-size: 21px;
    }


    /* =========================================
       BODY
    ========================================== */

    .faq-body {
        flex: 1;
        min-width: 0;
    }


    .faq-body h3 {
        margin: 5px 0 0;

        padding-left: 10px;

        font-size: 17px;

        line-height: 1.7;

        font-weight: 700;

        color: #172033;

        cursor: pointer;
    }


    /* =========================================
       CONTENT
    ========================================== */

    .faq-content {
        display: none;

        padding-top: 12px;

        animation: faqShow .3s ease;
    }


    .faq-content p {
        margin: 0;

        color: #6b7280;

        line-height: 1.9;

        font-size: 15px;
    }


    /* =========================================
       ACTIVE
    ========================================== */

    .faq-item.faq-active {
        border-color: rgba(13, 110, 253, .25);

        box-shadow: 0 12px 35px rgba(13, 110, 253, .08);
    }


    .faq-item.faq-active .faq-icon-wrapper {
        background: #0d6efd;
        color: #fff;
    }


    .faq-item.faq-active .faq-content {
        display: block;
    }


    .faq-item.faq-active .faq-toggle i {
        transform: rotate(180deg);
    }


    /* =========================================
       TOGGLE
    ========================================== */

    .faq-toggle {
        flex: 0 0 40px;

        width: 40px;
        height: 40px;

        margin-top: 2px;

        border: 0;

        border-radius: 50%;

        background: #f1f5f9;

        color: #475569;

        display: flex;
        align-items: center;
        justify-content: center;

        cursor: pointer;

        transition: .3s ease;
    }


    .faq-toggle i {
        font-size: 16px;

        transition: transform .3s ease;
    }


    .faq-toggle:hover {
        background: #0d6efd;
        color: #fff;
    }


    /* =========================================
       EMPTY
    ========================================== */

    .faq-empty {
        background: #fff;

        padding: 50px 20px;

        border-radius: 18px;

        border: 1px solid #e8edf3;
    }

    .faq-empty i {
        font-size: 45px;
        color: #0d6efd;
    }

    .faq-empty h3 {
        margin-top: 15px;
        font-weight: 700;
    }

    .faq-empty p {
        color: #777;
    }


    /* =========================================
       ANIMATION
    ========================================== */

    @keyframes faqShow {

        from {
            opacity: 0;
            transform: translateY(-5px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }

    }


    /* =========================================
       MOBILE
    ========================================== */

    @media (max-width: 767px) {

        .faq-section {
            padding: 60px 0;
        }

        .faq-section .section-heading h2 {
            font-size: 28px;
        }

        .faq-item {
            gap: 12px;
            padding: 18px;
        }

        .faq-icon-wrapper {
            flex: 0 0 42px;

            width: 42px;
            height: 42px;
        }

        .faq-body h3 {
            font-size: 15px;
        }

        .faq-content p {
            font-size: 14px;
        }

        .faq-toggle {
            flex: 0 0 34px;

            width: 34px;
            height: 34px;
        }

    }

</style>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(function (item) {

        const toggle = item.querySelector('.faq-toggle');
        const question = item.querySelector('.faq-body h3');

        function toggleFaq() {

            const isActive = item.classList.contains('faq-active');


            // إغلاق كل الأسئلة
            faqItems.forEach(function (otherItem) {

                otherItem.classList.remove('faq-active');

            });


            // فتح السؤال المختار
            if (!isActive) {

                item.classList.add('faq-active');

            }

        }


        toggle.addEventListener('click', toggleFaq);

        question.addEventListener('click', toggleFaq);

    });

});

</script>