<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'صيانة الموبايلات',
                'slug' => 'mobile-repair',
            ],
            [
                'name' => 'شاشات الموبايلات',
                'slug' => 'mobile-screens',
            ],
            [
                'name' => 'بطاريات وشحن',
                'slug' => 'batteries-charging',
            ],
            [
                'name' => 'آيفون',
                'slug' => 'iphone',
            ],
            [
                'name' => 'سامسونج وأندرويد',
                'slug' => 'samsung-android',
            ],
            [
                'name' => 'إكسسوارات الموبايلات',
                'slug' => 'mobile-accessories',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                ['name' => $category['name']]
            );
        }
    }
}