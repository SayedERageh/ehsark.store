<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ShopController
{
    /**
     * الصفحة الرئيسية للمتجر
     */
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | الأقسام
        |--------------------------------------------------------------------------
        */

        $categories = ProductCategory::withCount([
            'products' => function ($query) {
                $query->where('status', true);
            }
        ])
        ->with([
            'products' => function ($query) {
                $query->where('status', true)
                    ->latest();
            }
        ])
        ->latest()
        ->get();


        /*
        |--------------------------------------------------------------------------
        | المنتجات
        |--------------------------------------------------------------------------
        */

        $query = Product::with('category')
            ->where('status', true);


        /*
        |--------------------------------------------------------------------------
        | البحث
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');

            });
        }


        /*
        |--------------------------------------------------------------------------
        | فلترة القسم
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category')) {

            $query->where('category_id', $request->category);

        }


        /*
        |--------------------------------------------------------------------------
        | جميع المنتجات
        |--------------------------------------------------------------------------
        */

        $products = $query
            ->latest()
            ->paginate(12)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | المنتجات المميزة
        |--------------------------------------------------------------------------
        */

        $featuredProducts = Product::with('category')
            ->where('status', true)
            ->where('is_featured', true)
            ->latest()
            ->take(8)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | أحدث المنتجات
        |--------------------------------------------------------------------------
        */

        $latestProducts = Product::with('category')
            ->where('status', true)
            ->latest()
            ->take(8)
            ->get();


        return view('shop.index', compact(
            'categories',
            'products',
            'featuredProducts',
            'latestProducts'
        ));
    }

public function category($id)
{
    $category = ProductCategory::findOrFail($id);

    $products = Product::with('category')
        ->where('category_id', $category->id)
        ->where('status', true)
        ->latest()
        ->paginate(12)
        ->withQueryString();

    $categories = ProductCategory::withCount([
        'products' => function ($query) {
            $query->where('status', true);
        }
    ])
    ->latest()
    ->get();

    return view('shop.category', compact(
        'category',
        'products',
        'categories'
    ));
}


    /**
     * صفحة المنتج
     */
    public function show($id)
    {
        $product = Product::with('category')
            ->where('status', true)
            ->findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | منتجات مشابهة من نفس القسم
        |--------------------------------------------------------------------------
        */

        $relatedProducts = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', true)
            ->latest()
            ->take(4)
            ->get();


        return view('shop.show', compact(
            'product',
            'relatedProducts'
        ));
    }
}