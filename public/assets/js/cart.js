
document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | إعدادات المتجر
    |--------------------------------------------------------------------------
    */

    const STORAGE_KEY = 'otad_misr_cart';

    // رابط صفحة Checkout من Laravel
    const CHECKOUT_URL = '/checkout';


    /*
    |--------------------------------------------------------------------------
    | عناصر السلة
    |--------------------------------------------------------------------------
    */

    const cartToggle = document.getElementById('cartToggle');
    const cartPanel = document.getElementById('cartPanel');
    const cartOverlay = document.getElementById('cartOverlay');
    const cartClose = document.getElementById('cartClose');

    const cartItems = document.getElementById('cartItems');
    const cartCount = document.getElementById('cartCount');
    const cartTotal = document.getElementById('cartTotal');
    const cartItemsText = document.getElementById('cartItemsText');

    // زر Checkout
    const goToCheckout = document.getElementById('goToCheckout');


    /*
    |--------------------------------------------------------------------------
    | قراءة السلة
    |--------------------------------------------------------------------------
    */

    function getCart() {

        try {

            const cart = JSON.parse(
                localStorage.getItem(STORAGE_KEY) || '[]'
            );

            return Array.isArray(cart) ? cart : [];

        } catch (error) {

            console.error('Cart Read Error:', error);

            return [];

        }

    }


    /*
    |--------------------------------------------------------------------------
    | حفظ السلة
    |--------------------------------------------------------------------------
    */

    function saveCart(cart) {

        try {

            localStorage.setItem(
                STORAGE_KEY,
                JSON.stringify(cart)
            );

        } catch (error) {

            console.error('Cart Save Error:', error);

        }

    }


    /*
    |--------------------------------------------------------------------------
    | تنسيق السعر
    |--------------------------------------------------------------------------
    */

    function formatPrice(price) {

        return Number(price || 0).toLocaleString(
            'ar-EG',
            {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | عدد المنتجات
    |--------------------------------------------------------------------------
    */

    function getCartCount(cart) {

        return cart.reduce(function (total, item) {

            return total + Number(item.quantity || 0);

        }, 0);

    }


    /*
    |--------------------------------------------------------------------------
    | إجمالي السلة
    |--------------------------------------------------------------------------
    */

    function getCartTotal(cart) {

        return cart.reduce(function (total, item) {

            return total +
                (
                    Number(item.price || 0) *
                    Number(item.quantity || 0)
                );

        }, 0);

    }


    /*
    |--------------------------------------------------------------------------
    | تحديث العداد
    |--------------------------------------------------------------------------
    */

    function updateCartCount(cart) {

        const count = getCartCount(cart);


        // أي عنصر عنده cart-count
        document
            .querySelectorAll('.cart-count')
            .forEach(function (element) {

                element.textContent = count;

                element.style.display =
                    count > 0 ? 'flex' : 'none';

            });


        // العداد الرئيسي
        if (cartCount) {

            cartCount.textContent = count;

            cartCount.style.display =
                count > 0 ? 'flex' : 'none';

        }

    }


    /*
    |--------------------------------------------------------------------------
    | تحديث الإجمالي
    |--------------------------------------------------------------------------
    */

    function updateCartTotals(cart) {

        const total = getCartTotal(cart);

        const formatted = formatPrice(total);


        if (cartTotal) {

            cartTotal.textContent = formatted;

        }


        const cartTotalStep2 =
            document.getElementById('cartTotalStep2');

        if (cartTotalStep2) {

            cartTotalStep2.textContent = formatted;

        }


        document
            .querySelectorAll('[data-cart-total]')
            .forEach(function (element) {

                element.textContent = formatted;

            });

    }


    /*
    |--------------------------------------------------------------------------
    | رسالة
    |--------------------------------------------------------------------------
    */

    function showCartMessage(
        message,
        type = 'success'
    ) {

        const oldMessage =
            document.getElementById('cart-message');


        if (oldMessage) {

            oldMessage.remove();

        }


        const messageBox =
            document.createElement('div');


        messageBox.id = 'cart-message';

        messageBox.className =
            'alert alert-' + type;


        messageBox.style.position = 'fixed';
        messageBox.style.top = '90px';
        messageBox.style.right = '20px';
        messageBox.style.zIndex = '999999';
        messageBox.style.minWidth = '280px';
        messageBox.style.maxWidth = '90%';
        messageBox.style.direction = 'rtl';
        messageBox.style.boxShadow =
            '0 10px 30px rgba(0,0,0,.15)';


        messageBox.textContent = message;


        document.body.appendChild(messageBox);


        setTimeout(function () {

            if (messageBox) {

                messageBox.remove();

            }

        }, 2500);

    }


    /*
    |--------------------------------------------------------------------------
    | حماية HTML
    |--------------------------------------------------------------------------
    */

    function escapeHtml(value) {

        const div =
            document.createElement('div');

        div.textContent = value ?? '';

        return div.innerHTML;

    }


    /*
    |--------------------------------------------------------------------------
    | حماية Attribute
    |--------------------------------------------------------------------------
    */

    function escapeAttribute(value) {

        return escapeHtml(value)
            .replace(/"/g, '&quot;');

    }


    /*
    |--------------------------------------------------------------------------
    | رسم السلة
    |--------------------------------------------------------------------------
    */

    function renderCart() {

        const cart = getCart();


        let totalQuantity = 0;


        cart.forEach(function (item) {

            totalQuantity +=
                Number(item.quantity || 0);

        });


        /*
        |----------------------------------------------------------------------
        | تحديث البيانات
        |----------------------------------------------------------------------
        */

        updateCartCount(cart);

        updateCartTotals(cart);


        /*
        |----------------------------------------------------------------------
        | نص عدد المنتجات
        |----------------------------------------------------------------------
        */

        if (cartItemsText) {

            if (totalQuantity === 0) {

                cartItemsText.textContent =
                    'لا توجد منتجات';

            } else if (totalQuantity === 1) {

                cartItemsText.textContent =
                    'منتج واحد';

            } else {

                cartItemsText.textContent =
                    totalQuantity + ' منتجات';

            }

        }


        /*
        |----------------------------------------------------------------------
        | لو السلة غير موجودة
        |----------------------------------------------------------------------
        */

        if (!cartItems) {

            return;

        }


        /*
        |----------------------------------------------------------------------
        | السلة فارغة
        |----------------------------------------------------------------------
        */

        if (!cart.length) {

            cartItems.innerHTML = `

                <div class="cart-empty">

                    <i class="bi bi-cart-x"></i>

                    <h6>
                        السلة فارغة
                    </h6>

                    <p>
                        أضف المنتجات التي تريد طلبها
                    </p>

                </div>

            `;

            return;

        }


        /*
        |----------------------------------------------------------------------
        | عرض المنتجات
        |----------------------------------------------------------------------
        */

        cartItems.innerHTML =
            cart.map(function (item, index) {

                const price =
                    Number(item.price || 0);

                const quantity =
                    Number(item.quantity || 0);

                const stock =
                    Number(item.stock || 0);

                const itemTotal =
                    price * quantity;


                return `

                    <div class="cart-item">

                        <div class="cart-item-top">

                            ${
                                item.image
                                    ? `
                                        <div class="cart-item-image">

                                            <img
                                                src="${escapeAttribute(item.image)}"
                                                alt="${escapeAttribute(item.name)}"
                                            >

                                        </div>
                                    `
                                    : `
                                        <div class="cart-item-image cart-no-image">

                                            <i class="bi bi-image"></i>

                                        </div>
                                    `
                            }


                            <div class="cart-item-info">

                                <div class="cart-item-name">

                                    ${escapeHtml(item.name)}

                                </div>


                                <div class="cart-item-price">

                                    السعر:
                                    ${formatPrice(price)}
                                    جنيه

                                </div>


                                <div class="cart-item-total">

                                    الإجمالي:
                                    ${formatPrice(itemTotal)}
                                    جنيه

                                </div>

                            </div>


                            <button
                                type="button"
                                class="cart-delete"
                                onclick="removeCartItem(${index})"
                                aria-label="حذف المنتج"
                            >

                                <i class="bi bi-trash"></i>

                            </button>

                        </div>


                        <div class="cart-item-stock">

                            المتاح:
                            ${stock}

                        </div>


                        <div class="cart-quantity">

                            <button
                                type="button"
                                onclick="changeCartQuantity(${index}, -1)"
                                aria-label="تقليل الكمية"
                            >
                                −
                            </button>


                            <span>

                                ${quantity}

                            </span>


                            <button
                                type="button"
                                onclick="changeCartQuantity(${index}, 1)"
                                aria-label="زيادة الكمية"
                            >
                                +
                            </button>

                        </div>

                    </div>

                `;

            }).join('');

    }


    /*
    |--------------------------------------------------------------------------
    | إضافة منتج للسلة
    |--------------------------------------------------------------------------
    */

    function addToCart(
        id,
        name,
        price,
        image = '',
        stock = 999999
    ) {

        const cart = getCart();


        const productId =
            String(id);


        const availableStock =
            Number(stock);


        /*
        |----------------------------------------------------------------------
        | المنتج غير متوفر
        |----------------------------------------------------------------------
        */

        if (availableStock <= 0) {

            showCartMessage(
                'هذا المنتج غير متوفر حاليًا.',
                'danger'
            );

            return;

        }


        /*
        |----------------------------------------------------------------------
        | البحث عن المنتج
        |----------------------------------------------------------------------
        */

        const existing =
            cart.find(function (item) {

                return String(item.id) === productId;

            });


        /*
        |----------------------------------------------------------------------
        | المنتج موجود بالفعل
        |----------------------------------------------------------------------
        */

        if (existing) {

            const currentQuantity =
                Number(existing.quantity || 0);


            if (
                currentQuantity >=
                availableStock
            ) {

                showCartMessage(
                    'لا يمكن زيادة الكمية عن المتاح.',
                    'danger'
                );

                return;

            }


            existing.quantity =
                currentQuantity + 1;


            existing.stock =
                availableStock;

        }


        /*
        |----------------------------------------------------------------------
        | منتج جديد
        |----------------------------------------------------------------------
        */

        else {

            cart.push({

                id: id,

                name: String(name || ''),

                price: Number(price || 0),

                image: image || '',

                stock: availableStock,

                quantity: 1

            });

        }


        /*
        |----------------------------------------------------------------------
        | حفظ السلة
        |----------------------------------------------------------------------
        */

        saveCart(cart);

        renderCart();


        showCartMessage(
            'تمت إضافة المنتج إلى عربيتك بنجاح.',
            'success'
        );

    }


    /*
    |--------------------------------------------------------------------------
    | زر إضافة المنتج
    |--------------------------------------------------------------------------
    */

    document.addEventListener(
        'click',
        function (event) {

            const button =
                event.target.closest(
                    '.btn-add-whatsapp'
                );


            if (!button) {

                return;

            }


            const id =
                button.dataset.productId;


            const name =
                button.dataset.productName;


            const price =
                Number(
                    button.dataset.productPrice || 0
                );


            const stock =
                Number(
                    button.dataset.productStock || 0
                );


            let image = '';


            const productCard =
                button.closest(
                    '.whatsapp-product-card'
                );


            if (productCard) {

                const img =
                    productCard.querySelector(
                        '.product-image img'
                    );


                if (img) {

                    image = img.src;

                }

            }


            addToCart(
                id,
                name,
                price,
                image,
                stock
            );


            openCart();

        }
    );


    /*
    |--------------------------------------------------------------------------
    | تغيير الكمية
    |--------------------------------------------------------------------------
    */

    window.changeCartQuantity =
        function (index, change) {

            const cart =
                getCart();


            if (!cart[index]) {

                return;

            }


            const item =
                cart[index];


            const quantity =
                Number(item.quantity || 0);


            const stock =
                Number(item.stock || 0);


            /*
            |----------------------------------------------------------------------
            | زيادة
            |----------------------------------------------------------------------
            */

            if (change > 0) {

                if (
                    stock > 0 &&
                    quantity >= stock
                ) {

                    showCartMessage(
                        'المتاح من هذا المنتج ' +
                        stock +
                        ' فقط.',
                        'danger'
                    );

                    return;

                }


                item.quantity =
                    quantity + 1;

            }


            /*
            |----------------------------------------------------------------------
            | تقليل
            |----------------------------------------------------------------------
            */

            if (change < 0) {

                item.quantity =
                    quantity - 1;

            }


            /*
            |----------------------------------------------------------------------
            | حذف لو الكمية أصبحت صفر
            |----------------------------------------------------------------------
            */

            if (
                Number(item.quantity) <= 0
            ) {

                cart.splice(index, 1);

            }


            saveCart(cart);

            renderCart();

        };


    /*
    |--------------------------------------------------------------------------
    | حذف منتج
    |--------------------------------------------------------------------------
    */

    window.removeCartItem =
        function (index) {

            const cart =
                getCart();


            if (!cart[index]) {

                return;

            }


            cart.splice(index, 1);


            saveCart(cart);

            renderCart();


            showCartMessage(
                'تم حذف المنتج من السلة.',
                'success'
            );

        };


    /*
    |--------------------------------------------------------------------------
    | تفريغ السلة
    |--------------------------------------------------------------------------
    */

    window.clearCart =
        function () {

            localStorage.removeItem(
                STORAGE_KEY
            );


            renderCart();


            showCartMessage(
                'تم تفريغ السلة.',
                'success'
            );

        };


    /*
    |--------------------------------------------------------------------------
    | فتح السلة
    |--------------------------------------------------------------------------
    */

    function openCart() {

        if (!cartPanel) {

            return;

        }


        renderCart();


        cartPanel.classList.add('active');


        if (cartOverlay) {

            cartOverlay.classList.add('active');

        }


        /*
        | مهم:
        | لا نستخدم body.classList أو overflow هنا
        | حتى لا نؤثر على الـ Modal
        */

    }


    /*
    |--------------------------------------------------------------------------
    | إغلاق السلة
    |--------------------------------------------------------------------------
    */

    function closeCart() {

        if (cartPanel) {

            cartPanel.classList.remove('active');

        }


        if (cartOverlay) {

            cartOverlay.classList.remove('active');

        }

    }


    /*
    |--------------------------------------------------------------------------
    | زر فتح السلة
    |--------------------------------------------------------------------------
    */

    if (cartToggle) {

        cartToggle.addEventListener(
            'click',
            function (event) {

                event.preventDefault();

                openCart();

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | زر إغلاق السلة
    |--------------------------------------------------------------------------
    */

    if (cartClose) {

        cartClose.addEventListener(
            'click',
            function () {

                closeCart();

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Overlay
    |--------------------------------------------------------------------------
    */

    if (cartOverlay) {

        cartOverlay.addEventListener(
            'click',
            function () {

                closeCart();

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | إغلاق السلة عند فتح Bootstrap Modal
    |--------------------------------------------------------------------------
    */

    document.addEventListener(
        'show.bs.modal',
        function () {

            closeCart();

        }
    );


    /*
    |--------------------------------------------------------------------------
    | زر Escape
    |--------------------------------------------------------------------------
    */

    document.addEventListener(
        'keydown',
        function (event) {

            if (event.key === 'Escape') {

                closeCart();

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | زر Checkout
    |--------------------------------------------------------------------------
    |
    | هنا فقط يتم الانتقال إلى صفحة Checkout
    |
    */

    if (goToCheckout) {

        goToCheckout.addEventListener(
            'click',
            function (event) {

                event.preventDefault();


                const cart =
                    getCart();


                /*
                |------------------------------------------------------------------
                | التأكد أن السلة ليست فارغة
                |------------------------------------------------------------------
                */

                if (!cart.length) {

                    showCartMessage(
                        'من فضلك أضف منتجًا واحدًا على الأقل.',
                        'danger'
                    );

                    return;

                }


                /*
                |------------------------------------------------------------------
                | إغلاق السلة
                |------------------------------------------------------------------
                */

                closeCart();


                /*
                |------------------------------------------------------------------
                | الانتقال إلى Checkout
                |------------------------------------------------------------------
                */

                window.location.href =
                    CHECKOUT_URL;

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | تشغيل السلة أول مرة
    |--------------------------------------------------------------------------
    */

    renderCart();

});
