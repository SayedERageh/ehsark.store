<div class="sharek-categories-section" dir="rtl">
    <div class="container">

        <!-- Section Header -->
        <div class="sharek-categories-header text-center mb-5">

            <span class="sharek-section-badge">
                <i class="bi bi-grid-fill"></i>
                تصفح المتجر
            </span>

            <h2 class="sharek-section-title">
                اكتشف <span>أقسام    شرق  استور</span>
            </h2>

            <p class="sharek-section-subtitle">
                اختار القسم المناسب ليك واكتشف أحدث إكسسوارات ومستلزمات الموبايلات
            </p>

        </div>


        <!-- Categories -->
        <div class="row g-4">

            @foreach($categories as $category)

                <div class="col-xl-3 col-lg-4 col-md-6">

                    <div class="sharek-category-card">

                        <!-- Image -->
                        <a                                       href="{{ route('shop.category', $category->id) }}"

                           class="sharek-category-image">

                            @if($category->image)

                                <img
                                    src="{{ asset('uploads/' . $category->image) }}"
                                    alt="{{ $category->name }}"
                                >

                            @else

                                <div class="sharek-category-placeholder">
                                    <i class="bi bi-phone"></i>
                                </div>

                            @endif

                            <div class="sharek-image-overlay">
                                <span>
                                    <i class="bi bi-eye"></i>
                                    استكشف القسم
                                </span>
                            </div>

                        </a>


                        <!-- Content -->
                        <div class="sharek-category-content">

                            <div class="sharek-category-label">
                                <i class="bi bi-phone-fill"></i>
                                إكسسوارات ومستلزمات
                            </div>

                            <h3>
                                {{ $category->name }}
                            </h3>

                            @if($category->description)

                                <p>
                                    {{ Str::limit($category->description, 85) }}
                                </p>

                            @else

                                <p>
                                    اكتشف أفضل المنتجات المتوفرة داخل هذا القسم
                                    بأسعار مناسبة وجودة مميزة.
                                </p>

                            @endif


                            <!-- Footer -->
                            <div class="sharek-category-footer">

                                <a 
                                       href="{{ route('shop.category', $category->id) }}"
                                   class="sharek-category-btn">

                                    <span>
                                        عرض المنتجات
                                    </span>

                                    <i class="bi bi-arrow-left"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>
</div>


<style>

/* =========================================================
   SHAREK STORE - CATEGORIES
========================================================= */

.sharek-categories-section {
    background:
        linear-gradient(180deg, #f8fbff 0%, #ffffff 100%);
    padding: 85px 0;
    direction: rtl;
}

/* HEADER */

.sharek-categories-header {
    max-width: 780px;
    margin: 0 auto 50px;
}

.sharek-section-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    background: #eef6ff;
    color: #2563eb;

    padding: 9px 20px;
    border-radius: 50px;

    font-size: 14px;
    font-weight: 800;

    margin-bottom: 16px;

    border: 1px solid #dbeafe;
}

.sharek-section-badge i {
    font-size: 15px;
}

.sharek-section-title {
    font-size: 42px;
    font-weight: 900;

    color: #172033;

    margin: 0 0 14px;

    line-height: 1.4;
}

.sharek-section-title span {
    color: #2563eb;
}

.sharek-section-subtitle {
    color: #64748b;
    font-size: 17px;
    line-height: 1.8;
    margin: 0;
}


/* =========================================================
   CARD
========================================================= */

.sharek-category-card {
    background: #ffffff;

    border: 1px solid #e5eaf1;
    border-radius: 20px;

    overflow: hidden;

    height: 100%;

    display: flex;
    flex-direction: column;

    transition:
        transform .35s ease,
        box-shadow .35s ease,
        border-color .35s ease;

    box-shadow: 0 8px 25px rgba(30, 64, 175, .06);
}

.sharek-category-card:hover {
    transform: translateY(-9px);

    border-color: #93c5fd;

    box-shadow:
        0 22px 50px rgba(37, 99, 235, .15);
}


/* =========================================================
   IMAGE
========================================================= */

.sharek-category-image {
    height: 235px;

    background:
        linear-gradient(
            135deg,
            #f1f7ff 0%,
            #ffffff 55%,
            #eef4ff 100%
        );

    position: relative;

    display: flex;
    align-items: center;
    justify-content: center;

    overflow: hidden;

    text-decoration: none;
}

.sharek-category-image::before {
    content: "";

    position: absolute;

    width: 180px;
    height: 180px;

    border-radius: 50%;

    background: rgba(37, 99, 235, .07);

    top: -60px;
    left: -50px;

    transition: .5s;
}

.sharek-category-card:hover
.sharek-category-image::before {
    transform: scale(1.5);
}

.sharek-category-image img {
    width: 100%;
    height: 100%;

    object-fit: contain;

    padding: 25px;

    position: relative;
    z-index: 2;

    transition: .5s;
}

.sharek-category-card:hover
.sharek-category-image img {
    transform: scale(1.08);
}


/* =========================================================
   OVERLAY
========================================================= */

.sharek-image-overlay {
    position: absolute;

    inset: 0;

    background: rgba(15, 23, 42, .55);

    display: flex;
    align-items: center;
    justify-content: center;

    opacity: 0;

    transition: .3s;

    z-index: 5;
}

.sharek-category-card:hover
.sharek-image-overlay {
    opacity: 1;
}

.sharek-image-overlay span {
    background: #2563eb;
    color: #ffffff;

    padding: 11px 20px;

    border-radius: 10px;

    font-size: 14px;
    font-weight: 800;

    display: flex;
    align-items: center;
    gap: 8px;

    transform: translateY(12px);

    transition: .3s;

    box-shadow: 0 8px 20px rgba(37, 99, 235, .3);
}

.sharek-category-card:hover
.sharek-image-overlay span {
    transform: translateY(0);
}


/* =========================================================
   PLACEHOLDER
========================================================= */

.sharek-category-placeholder {
    width: 100%;
    height: 100%;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #93c5fd;

    font-size: 72px;
}


/* =========================================================
   CONTENT
========================================================= */

.sharek-category-content {
    padding: 23px;

    display: flex;
    flex-direction: column;

    flex: 1;
}

.sharek-category-label {
    display: flex;
    align-items: center;

    gap: 7px;

    color: #94a3b8;

    font-size: 12px;
    font-weight: 800;

    margin-bottom: 9px;
}

.sharek-category-label i {
    color: #2563eb;
    font-size: 14px;
}

.sharek-category-content h3 {
    color: #172033;

    font-size: 21px;
    font-weight: 900;

    margin: 0 0 10px;

    line-height: 1.5;

    transition: .25s;
}

.sharek-category-card:hover
.sharek-category-content h3 {
    color: #2563eb;
}

.sharek-category-content p {
    color: #64748b;

    font-size: 14px;

    line-height: 1.9;

    margin-bottom: 20px;

    min-height: 53px;
}


/* =========================================================
   FOOTER
========================================================= */

.sharek-category-footer {
    margin-top: auto;

    padding-top: 15px;

    border-top: 1px solid #edf1f6;
}

.sharek-category-btn {
    width: 100%;

    display: flex;
    align-items: center;
    justify-content: space-between;

    text-decoration: none;

    background: #172033;
    color: #ffffff;

    padding: 13px 17px;

    border-radius: 10px;

    font-size: 14px;
    font-weight: 800;

    transition: .3s;
}

.sharek-category-btn i {
    font-size: 18px;

    transition: .3s;
}

.sharek-category-btn:hover {
    background: #2563eb;
    color: #ffffff;

    box-shadow:
        0 8px 20px rgba(37, 99, 235, .22);
}

.sharek-category-btn:hover i {
    transform: translateX(-6px);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .sharek-section-title {
        font-size: 34px;
    }

    .sharek-category-image {
        height: 215px;
    }
}

@media (max-width: 576px) {

    .sharek-categories-section {
        padding: 60px 15px;
    }

    .sharek-section-title {
        font-size: 28px;
    }

    .sharek-section-subtitle {
        font-size: 14px;
    }

    .sharek-category-image {
        height: 225px;
    }

    .sharek-category-content {
        padding: 20px;
    }
}

</style>