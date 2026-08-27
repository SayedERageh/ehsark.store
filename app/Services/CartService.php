<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    private string $sessionKey = 'shop_cart';

    /**
     * جلب السلة من Session
     */
    public function getCart(): array
    {
        return session()->get($this->sessionKey, []);
    }

    /**
     * إضافة منتج
     */
    public function add(Product $product): array
    {
        $cart = $this->getCart();

        $id = (string) $product->id;

        $price = $product->sale_price !== null && $product->sale_price > 0
            ? (float) $product->sale_price
            : (float) $product->price;

        if (isset($cart[$id])) {

            $currentQuantity = (int) $cart[$id]['quantity'];

            if ($currentQuantity >= (int) $product->quantity) {
                return [
                    'success' => false,
                    'message' => 'لا يمكن زيادة الكمية عن المخزون المتاح.',
                ];
            }

            $cart[$id]['quantity']++;

        } else {

            $cart[$id] = [
                'id'       => (int) $product->id,
                'name'     => $product->name,
                'price'    => $price,
                'image'    => $product->images[0] ?? null,
                'quantity' => 1,
            ];
        }

        session()->put($this->sessionKey, $cart);

        return [
            'success' => true,
            'message' => 'تمت إضافة المنتج إلى السلة.',
        ];
    }

    /**
     * زيادة الكمية
     */
    public function increase(int $id): array
    {
        $cart = $this->getCart();
        $key = (string) $id;

        if (!isset($cart[$key])) {
            return [
                'success' => false,
                'message' => 'المنتج غير موجود في السلة.',
            ];
        }

        $product = Product::find($id);

        if (!$product) {
            return [
                'success' => false,
                'message' => 'المنتج غير موجود.',
            ];
        }

        if ((int) $product->quantity <= 0) {
            return [
                'success' => false,
                'message' => 'المنتج غير متوفر.',
            ];
        }

        if ((int) $cart[$key]['quantity'] >= (int) $product->quantity) {
            return [
                'success' => false,
                'message' => 'وصلت للكمية المتاحة من المخزون.',
            ];
        }

        $cart[$key]['quantity']++;

        session()->put($this->sessionKey, $cart);

        return [
            'success' => true,
            'message' => 'تمت زيادة الكمية.',
        ];
    }

    /**
     * تقليل الكمية
     */
    public function decrease(int $id): array
    {
        $cart = $this->getCart();
        $key = (string) $id;

        if (!isset($cart[$key])) {
            return [
                'success' => false,
                'message' => 'المنتج غير موجود في السلة.',
            ];
        }

        if ((int) $cart[$key]['quantity'] > 1) {

            $cart[$key]['quantity']--;

        } else {

            unset($cart[$key]);
        }

        session()->put($this->sessionKey, $cart);

        return [
            'success' => true,
            'message' => 'تم تحديث السلة.',
        ];
    }

    /**
     * حذف منتج
     */
    public function remove(int $id): array
    {
        $cart = $this->getCart();
        $key = (string) $id;

        if (!isset($cart[$key])) {
            return [
                'success' => false,
                'message' => 'المنتج غير موجود في السلة.',
            ];
        }

        unset($cart[$key]);

        session()->put($this->sessionKey, $cart);

        return [
            'success' => true,
            'message' => 'تم حذف المنتج.',
        ];
    }

    /**
     * عدد المنتجات
     */
    public function count(): int
    {
        return (int) collect($this->getCart())
            ->sum('quantity');
    }

    /**
     * إجمالي السلة
     */
    public function total(): float
    {
        return (float) collect($this->getCart())
            ->sum(function ($item) {
                return ((float) $item['price']) * ((int) $item['quantity']);
            });
    }

    /**
     * تفريغ السلة
     */
    public function clear(): void
    {
        session()->forget($this->sessionKey);
    }

    /**
     * بيانات السلة كاملة
     */
    public function data(): array
    {
        return [
            'items' => array_values($this->getCart()),
            'count' => $this->count(),
            'total' => $this->total(),
        ];
    }
}