<div class="section-heading text-center mb-5">
    <span>تواصل معنا</span>
    <h2>نحن هنا لخدمتك</h2>
    <p>لو عندك استفسار عن منتج أو محتاج مساعدة في اختيار الأدوات الصحية أو مستلزمات السباكة، تواصل معنا.</p>
</div>

<div class="row gy-4">

    {{-- معلومات المتجر --}}
    <div class="col-lg-5">
        <div class="contact-info">

            <div class="contact-brand">
                <div class="brand-icon">
                    <i class="bi bi-droplet-fill"></i>
                </div>
                <div>
                    <h3>أوتاد مصر</h3>
                    <span>متجر الأدوات الصحية والسباكة</span>
                </div>
            </div>

            <p class="contact-description">
                في أوتاد مصر نوفر لك مجموعة متنوعة من الأدوات الصحية ومستلزمات السباكة
                والمنتجات التي تحتاجها لمنزلك أو مشروعك، مع الحرص على الجودة وتوفير
                منتجات موثوقة وأسعار مناسبة.
            </p>

            <div class="contact-item">
                <div class="contact-icon">
                    <i class="bi bi-whatsapp"></i>
                </div>
                <div>
                    <small>واتساب</small>
                    <a href="https://wa.me/2011128555985" target="_blank">
                        011128555985
                    </a>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">
                    <i class="bi bi-telephone-fill"></i>
                </div>
                <div>
                    <small>اتصل بنا</small>
                    <a href="tel:011128555985">
                        011128555985
                    </a>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">
                    <i class="bi bi-facebook"></i>
                </div>
                <div>
                    <small>فيسبوك</small>
                    <a href="https://www.facebook.com/profile.php?id=61591562046753" target="_blank">
                        تابع صفحتنا
                    </a>
                </div>
            </div>

        </div>
    </div>

    {{-- نموذج التواصل --}}
    <div class="col-lg-7">
        <div class="contact-form">

            <div class="form-header">
                <h3>أرسل لنا استفسارك</h3>
                <p>اكتب بياناتك واستفسارك وسنتواصل معك في أقرب وقت.</p>
            </div>

            <form action="{{ route('contact.store') }}" method="POST">
                @csrf

                <div class="row g-3">

                    <div class="col-md-6">
                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="الاسم بالكامل"
                               required>
                    </div>

                    <div class="col-md-6">
                        <input type="text"
                               name="phone"
                               class="form-control"
                               placeholder="رقم الهاتف"
                               required>
                    </div>

                    <div class="col-12">
                        <textarea name="message"
                                  class="form-control"
                                  rows="6"
                                  placeholder="اكتب استفسارك عن المنتج أو الأدوات الصحية والسباكة التي تحتاجها..."
                                  required></textarea>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="contact-submit">
                            <i class="bi bi-send-fill"></i>
                            إرسال الاستفسار
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>

</div>
</div>