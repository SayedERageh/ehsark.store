<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [

            [
                'name' => 'ساعات سمارت',
                'description' => 'مجموعة متنوعة من الساعات الذكية بتصميمات عصرية ومميزات متعددة.',
                'slug' => 'smart-watches',
                'image' => 'category/2024-10-13-670bb7bd620f6.webp',
                'status' => true,
            ],

            [
                'name' => 'اير بودز',
                'description' => 'أفضل سماعات اير بودز لتجربة صوت مميزة واستخدام يومي مريح.',
                'slug' => 'airpods',
                'image' => 'category/2024-10-13-670bcc65bc2d1.webp',
                'status' => true,
            ],

            [
                'name' => 'كابل شاحن',
                'description' => 'كابلات شحن متنوعة بجودة عالية ومتوافقة مع مختلف الأجهزة.',
                'slug' => 'charging-cables',
                'image' => 'category/2025-02-18-67b4b3abf4139.webp',
                'status' => true,
            ],

            [
                'name' => 'WATCH BANDS',
                'description' => 'أساور وسير ساعات سمارت بتصميمات وألوان متنوعة.',
                'slug' => 'watch-bands',
                'image' => 'category/2025-02-18-67b4ec50cb81c.webp',
                'status' => true,
            ],

            [
                'name' => 'Headphone',
                'description' => 'سماعات رأس متنوعة للاستمتاع بصوت واضح وتجربة استخدام مريحة.',
                'slug' => 'headphones',
                'image' => 'category/2025-02-19-67b5eb1b4df05.webp',
                'status' => true,
            ],

            [
                'name' => 'هاند فري',
                'description' => 'تشكيلة من الهاند فري والسماعات للاستخدام اليومي والمكالمات والموسيقى.',
                'slug' => 'handsfree',
                'image' => 'category/2025-02-20-67b76f84cf37b.webp',
                'status' => true,
            ],

            [
                'name' => 'باور بنك',
                'description' => 'باور بانك بسعات مختلفة لشحن أجهزتك أثناء التنقل.',
                'slug' => 'power-banks',
                'image' => 'category/2025-03-08-67cca11b1a6ea.webp',
                'status' => true,
            ],

            [
                'name' => 'صبات',
                'description' => 'صبات ومستلزمات متنوعة للموبايلات والأجهزة الإلكترونية.',
                'slug' => 'stands',
                'image' => 'category/2025-05-24-6831cccb2a620.webp',
                'status' => true,
            ],

            [
                'name' => 'جراب ايربودز',
                'description' => 'جرابات حماية أنيقة ومميزة لسماعات ايربودز.',
                'slug' => 'airpods-cases',
                'image' => 'category/2025-05-24-6831cd7c13437.webp',
                'status' => true,
            ],

            [
                'name' => 'رينج لايت',
                'description' => 'رينج لايت للتصوير وصناعة المحتوى والبث المباشر.',
                'slug' => 'ring-lights',
                'image' => 'category/2025-12-24-694bdb6c94644.webp',
                'status' => true,
            ],

            [
                'name' => 'هولدرات',
                'description' => 'هولدرات موبايل متنوعة للسيارة والمكتب والاستخدام اليومي.',
                'slug' => 'phone-holders',
                'image' => 'category/2026-01-06-695d5936ae6bf.webp',
                'status' => true,
            ],

            [
                'name' => 'هواتف',
                'description' => 'مجموعة من الهواتف والموبايلات بموديلات وإمكانيات متنوعة.',
                'slug' => 'mobile-phones',
                'image' => 'category/2026-06-10-6a29739a4d40a.webp',
                'status' => true,
            ],

            [
                'name' => 'براند MALAZ',
                'description' => 'منتجات وإكسسوارات مميزة من براند MALAZ.',
                'slug' => 'malaz',
                'image' => 'category/2026-06-17-6a32bf7706a6b.webp',
                'status' => true,
            ],

            [
                'name' => 'براند oraimo',
                'description' => 'مجموعة من منتجات وإكسسوارات oraimo.',
                'slug' => 'oraimo',
                'image' => 'category/2026-08-12-6a7c82ce313b8.webp',
                'status' => true,
            ],

            [
                'name' => 'براند VOCO',
                'description' => 'منتجات وإكسسوارات متنوعة من براند VOCO.',
                'slug' => 'voco',
                'image' => 'category/2026-08-19-6a85a30ceb190.webp',
                'status' => true,
            ],

            [
                'name' => 'براند DADU',
                'description' => 'مجموعة مختارة من منتجات وإكسسوارات DADU.',
                'slug' => 'dadu',
                'image' => 'category/2026-08-19-6a85a574b4244.webp',
                'status' => true,
            ],

            [
                'name' => 'متنوع',
                'description' => 'مجموعة متنوعة من إكسسوارات ومستلزمات الموبايلات والأجهزة الإلكترونية.',
                'slug' => 'miscellaneous',
                'image' => 'category/2025-02-18-67b4804ba99ca.webp',
                'status' => true,
            ],

            [
                'name' => 'سكرينات حماية',
                'description' => 'سكرينات وواقيات شاشة لحماية شاشة الموبايل من الخدوش والصدمات.',
                'slug' => 'screen-protectors',
                'image' => 'category/2024-10-13-670bccaaad7fc.webp',
                'status' => true,
            ],

            [
                'name' => 'كافرات',
                'description' => 'كافرات وجرابات موبايل بتصميمات متنوعة للحماية والأناقة.',
                'slug' => 'phone-cases',
                'image' => 'category/2024-10-13-670bcd8977f8b.webp',
                'status' => true,
            ],

            [
                'name' => 'شواحن',
                'description' => 'شواحن موبايلات متنوعة بجودة عالية ومناسبة لمختلف الأجهزة.',
                'slug' => 'chargers',
                'image' => 'category/2024-10-13-670bcdca320c8.webp',
                'status' => true,
            ],

        ];

        foreach ($categories as $category) {
            ProductCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}