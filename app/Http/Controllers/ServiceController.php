<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController 
{
    // عرض كل الخدمات (اختياري)
    public function index()
    {
        $services = Service::latest()->get();

        return view('services.index', compact('services'));
    }
        // عرض كل الخدمات (اختياري)
    public function home()
    {
        $services = Service::latest()->get();

        return view('pages.home', compact('services'));
    }

    // صفحة التفاصيل
    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        return view('services.show', compact('service'));
    }
    
}