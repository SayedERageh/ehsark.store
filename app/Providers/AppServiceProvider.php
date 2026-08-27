<?php

namespace App\Providers;

use App\Models\ProductCategory;
use App\Models\SiteSetting;
use App\Services\CartService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {

            $cart = new CartService();

            $settings = SiteSetting::first();

            $view->with([

                // إعدادات الموقع
                'settings' => $settings,

                // أقسام المنتجات
                'productCategories' => ProductCategory::where('status', true)
                    ->latest()
                    ->get(),

                // السلة
                'cartItems' => $cart->getCart(),

                'cartTotal' => $cart->total(),

                'cartCount' => $cart->count(),

            ]);

        });
    }
}