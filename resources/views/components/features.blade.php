<div class="categories-section">
    <div class="container">

        <!-- Section Header -->
        <div class="categories-header text-center mb-5">
            <span class="section-badge">
                <i class="bi bi-grid-3x3-gap-fill"></i>
                تصفح الأقسام
            </span>

            <h2 class="section-title">
                اكتشف <span>منتجاتنا</span>
            </h2>

            <p class="section-subtitle">
                اختر القسم الذي تريد تصفحه واكتشف أفضل المنتجات والعروض
            </p>
        </div>


        <!-- Categories -->
        <div class="row g-4">

            @foreach($categories as $category)

                <div class="col-xl-3 col-lg-4 col-md-6">

                    <div class="category-card">

                        <!-- Image Area -->
                        <a href="{{ route('shop.index', ['category' => $category->id]) }}"
                           class="category-image">

                            @if($category->image)

                                <img
                                    src="{{ asset('uploads/' . $category->image) }}"
                                    alt="{{ $category->name }}"
                                >

                            @else

                                <div class="category-placeholder">
                                    <i class="bi bi-box-seam"></i>
                                </div>

                            @endif

                            <!-- Overlay -->
                            <div class="image-overlay">
                                <span>
                                    <i class="bi bi-eye"></i>
                                    تصفح القسم
                                </span>
                            </div>

                        </a>


                        <!-- Card Content -->
                        <div class="category-content">

                            <div class="category-label">
                                <i class="bi bi-tag-fill"></i>
                                قسم المنتجات
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
                                    اكتشف مجموعة مميزة من أفضل المنتجات
                                    المتوفرة داخل هذا القسم.
                                </p>

                            @endif


                            <!-- Bottom -->
                            <div class="category-footer">

                                <a href="{{ route('shop.index', ['category' => $category->id]) }}"
                                   class="category-btn">

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
  .categories-section{background:#f3f4f6;padding:80px 0;direction:rtl}.categories-header{max-width:750px;margin:0 auto 45px;text-align:center}.section-badge{display:inline-flex;align-items:center;gap:8px;background:#fff3cd;color:#091ab4;padding:8px 18px;border-radius:50px;font-size:14px;font-weight:700;margin-bottom:15px;border:1px solid #fde68a}.section-title{font-size:42px;font-weight:900;color:#111827;margin:0 0 12px}.section-title span{color:#003aae}.section-subtitle{color:#6b7280;font-size:17px;margin:0}.category-card{background:#fff;border:1px solid #e5e7eb;border-radius:18px;overflow:hidden;height:100%;display:flex;flex-direction:column;transition:.35s;box-shadow:0 4px 15px rgba(0,0,0,.05)}.category-card:hover{transform:translateY(-8px);border-color:#f59e0b;box-shadow:0 18px 45px rgba(0,0,0,.13)}.category-image{height:230px;background:#f8fafc;position:relative;display:flex;align-items:center;justify-content:center;overflow:hidden;text-decoration:none}.category-image img{width:100%;height:100%;object-fit:contain;padding:25px;transition:.45s}.category-card:hover .category-image img{transform:scale(1.08)}.image-overlay{position:absolute;inset:0;background:rgba(17,24,39,.55);display:flex;align-items:center;justify-content:center;opacity:0;transition:.3s}.category-card:hover .image-overlay{opacity:1}.image-overlay span{background:#f59e0b;color:#111827;padding:10px 18px;border-radius:8px;font-size:14px;font-weight:800;display:flex;align-items:center;gap:8px;transform:translateY(10px);transition:.3s}.category-card:hover .image-overlay span{transform:translateY(0)}.category-placeholder{width:100%;height:100%;display:flex;align-items:center;justify-content:center;color:#d1d5db;font-size:70px}.category-content{padding:22px;display:flex;flex-direction:column;flex:1}.category-label{display:flex;align-items:center;gap:6px;color:#9ca3af;font-size:12px;font-weight:700;margin-bottom:8px}.category-label i{color:#f59e0b}.category-content h3{color:#111827;font-size:21px;font-weight:800;margin:0 0 10px;line-height:1.5;transition:.25s}.category-card:hover .category-content h3{color:#d97706}.category-content p{color:#6b7280;font-size:14px;line-height:1.8;margin-bottom:20px;min-height:50px}.category-footer{margin-top:auto;padding-top:15px;border-top:1px solid #f1f1f1}.category-btn{width:100%;display:flex;align-items:center;justify-content:space-between;text-decoration:none;background:#111827;color:#fff;padding:12px 16px;border-radius:9px;font-size:14px;font-weight:700;transition:.3s}.category-btn i{font-size:18px;transition:.3s}.category-btn:hover{background:#f59e0b;color:#111827}.category-btn:hover i{transform:translateX(-5px)}@media(max-width:991px){.section-title{font-size:34px}.category-image{height:210px}}@media(max-width:576px){.categories-section{padding:60px 15px}.section-title{font-size:28px}.section-subtitle{font-size:14px}.category-image{height:220px}}
</style>
{{-- =========================================================
     PRODUCTS SECTION
========================================================= --}}

