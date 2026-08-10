<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;


class ShopController
{
    public function index(Request $request)
    {
        $categories = ProductCategory::with([
            'products' => function ($query) {
                $query->where('status', true)
                    ->latest();
            }
        ])->get();


        $query = Product::with('category')
            ->where('status', true);


        if ($request->filled('search')) {

            $query->where(function ($q) use ($request) {

                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');

            });

        }


        if ($request->filled('category')) {

            $query->where('category_id', $request->category);

        }


        $products = $query
            ->latest()
            ->paginate(12)
            ->withQueryString();


        $featuredProducts = Product::with('category')
            ->where('status', true)
            ->where('is_featured', true)
            ->latest()
            ->take(8)
            ->get();


        return view('shop.index', compact(
            'products',
            'categories',
            'featuredProducts'
        ));
    }


    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);


        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', true)
            ->take(4)
            ->get();


        return view('shop.show', compact(
            'product',
            'relatedProducts'
        ));
    }
}