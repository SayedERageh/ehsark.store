<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Slider;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | الأقسام + المنتجات داخل كل قسم
        |--------------------------------------------------------------------------
        */

        $categories = ProductCategory::with([
            'products' => function ($query) {
                $query->where('status', true)
                    ->latest();
            }
        ])->get();


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


        /*
        |--------------------------------------------------------------------------
        | السلايدر الرئيسي
        |--------------------------------------------------------------------------
        */

        $sliders = Slider::where('active', true)
            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | إرسال البيانات للصفحة الرئيسية
        |--------------------------------------------------------------------------
        */

        return view('pages.home', compact(
            'categories',
            'featuredProducts',
            'latestProducts',
            'sliders'
        ));
    }
}