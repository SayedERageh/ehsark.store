<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [

            // 1
            [
                'category' => 'smart-watches',
                'name' => 'ساعة سمارت Mibro',
                'description' => 'ساعة ذكية بتصميم عصري وشاشة عالية الجودة ومميزات متعددة للاستخدام اليومي.',
                'price' => 899,
                'sale_price' => 749,
                'quantity' => 15,
                'image' => 'category/2024-10-13-670bb7bd620f6.webp',
            ],

            // 2
            [
                'category' => 'airpods',
                'name' => 'AirPods Pro Wireless',
                'description' => 'سماعة لاسلكية بتصميم مميز وجودة صوت واضحة ومناسبة للاستخدام اليومي.',
                'price' => 699,
                'sale_price' => 599,
                'quantity' => 20,
                'image' => 'category/2024-10-13-670bcc65bc2d1.webp',
            ],

            // 3
            [
                'category' => 'charging-cables',
                'name' => 'كابل شحن Type-C سريع',
                'description' => 'كابل Type-C للشحن السريع ونقل البيانات بجودة عالية.',
                'price' => 150,
                'sale_price' => 119,
                'quantity' => 40,
                'image' => 'category/2025-02-18-67b4b3abf4139.webp',
            ],

            // 4
            [
                'category' => 'watch-bands',
                'name' => 'سير ساعة سمارت سيليكون',
                'description' => 'سير مريح وأنيق متوافق مع العديد من الساعات الذكية.',
                'price' => 120,
                'sale_price' => 99,
                'quantity' => 30,
                'image' => 'category/2025-02-18-67b4ec50cb81c.webp',
            ],

            // 5
            [
                'category' => 'headphones',
                'name' => 'Headphone Wireless',
                'description' => 'سماعة رأس لاسلكية بصوت واضح وتصميم مريح للاستخدام لفترات طويلة.',
                'price' => 650,
                'sale_price' => 549,
                'quantity' => 12,
                'image' => 'category/2025-02-19-67b5eb1b4df05.webp',
            ],

            // 6
            [
                'category' => 'handsfree',
                'name' => 'هاند فري Stereo',
                'description' => 'هاند فري عملي للمكالمات والاستماع للموسيقى بجودة صوت جيدة.',
                'price' => 180,
                'sale_price' => 149,
                'quantity' => 35,
                'image' => 'category/2025-02-20-67b76f84cf37b.webp',
            ],

            // 7
            [
                'category' => 'power-banks',
                'name' => 'Power Bank 10000mAh',
                'description' => 'باور بنك بسعة 10000mAh لشحن الموبايل أثناء التنقل.',
                'price' => 650,
                'sale_price' => 549,
                'quantity' => 18,
                'image' => 'category/2025-03-08-67cca11b1a6ea.webp',
            ],

            // 8
            [
                'category' => 'stands',
                'name' => 'ستاند موبايل قابل للطي',
                'description' => 'ستاند عملي للموبايل مناسب للمكتب والمشاهدة والاستخدام اليومي.',
                'price' => 180,
                'sale_price' => 149,
                'quantity' => 25,
                'image' => 'category/2025-05-24-6831cccb2a620.webp',
            ],

            // 9
            [
                'category' => 'airpods-cases',
                'name' => 'جراب حماية AirPods',
                'description' => 'جراب أنيق لحماية سماعات AirPods من الخدوش والصدمات.',
                'price' => 120,
                'sale_price' => 89,
                'quantity' => 30,
                'image' => 'category/2025-05-24-6831cd7c13437.webp',
            ],

            // 10
            [
                'category' => 'ring-lights',
                'name' => 'Ring Light 26cm',
                'description' => 'رينج لايت مناسب للتصوير وصناعة المحتوى والمكالمات والبث المباشر.',
                'price' => 450,
                'sale_price' => 379,
                'quantity' => 14,
                'image' => 'category/2025-12-24-694bdb6c94644.webp',
            ],

            // 11
            [
                'category' => 'phone-holders',
                'name' => 'هولدر موبايل للسيارة',
                'description' => 'هولدر قوي وثابت للموبايل مناسب للاستخدام داخل السيارة.',
                'price' => 250,
                'sale_price' => 199,
                'quantity' => 22,
                'image' => 'category/2026-01-06-695d5936ae6bf.webp',
            ],

            // 12
            [
                'category' => 'mobile-phones',
                'name' => 'هاتف ذكي تجريبي',
                'description' => 'هاتف ذكي بمواصفات مناسبة للاستخدام اليومي والتصفح والتطبيقات.',
                'price' => 6999,
                'sale_price' => 6499,
                'quantity' => 8,
                'image' => 'category/2026-06-10-6a29739a4d40a.webp',
            ],

            // 13
            [
                'category' => 'malaz',
                'name' => 'سماعة MALAZ Wireless',
                'description' => 'سماعة لاسلكية من MALAZ بتصميم عصري وجودة صوت مميزة.',
                'price' => 550,
                'sale_price' => 449,
                'quantity' => 16,
                'image' => 'category/2026-06-17-6a32bf7706a6b.webp',
            ],

            // 14
            [
                'category' => 'oraimo',
                'name' => 'Oraimo Power Bank',
                'description' => 'باور بنك من Oraimo بسعة مناسبة للشحن أثناء التنقل.',
                'price' => 850,
                'sale_price' => 749,
                'quantity' => 10,
                'image' => 'category/2026-08-12-6a7c82ce313b8.webp',
            ],

            // 15
            [
                'category' => 'voco',
                'name' => 'VOCO Wireless Earbuds',
                'description' => 'سماعة لاسلكية من VOCO بتصميم صغير وصوت واضح.',
                'price' => 500,
                'sale_price' => 399,
                'quantity' => 15,
                'image' => 'category/2026-08-19-6a85a30ceb190.webp',
            ],

            // 16
            [
                'category' => 'dadu',
                'name' => 'DADU Fast Charger',
                'description' => 'شاحن سريع من DADU مناسب للعديد من الهواتف الذكية.',
                'price' => 350,
                'sale_price' => 299,
                'quantity' => 20,
                'image' => 'category/2026-08-19-6a85a574b4244.webp',
            ],

            // 17
            [
                'category' => 'miscellaneous',
                'name' => 'إكسسوار موبايل متنوع',
                'description' => 'منتج متنوع من إكسسوارات ومستلزمات الموبايلات.',
                'price' => 200,
                'sale_price' => 159,
                'quantity' => 25,
                'image' => 'category/2025-02-18-67b4804ba99ca.webp',
            ],

            // 18
            [
                'category' => 'screen-protectors',
                'name' => 'سكرينة حماية 9D',
                'description' => 'سكرينة حماية عالية الجودة للمساعدة في حماية شاشة الموبايل.',
                'price' => 100,
                'sale_price' => 79,
                'quantity' => 50,
                'image' => 'category/2024-10-13-670bccaaad7fc.webp',
            ],

            // 19
            [
                'category' => 'phone-cases',
                'name' => 'جراب موبايل حماية',
                'description' => 'جراب حماية أنيق ومتين لحماية الموبايل من الخدوش والصدمات.',
                'price' => 180,
                'sale_price' => 129,
                'quantity' => 40,
                'image' => 'category/2024-10-13-670bcd8977f8b.webp',
            ],

            // 20
            [
                'category' => 'chargers',
                'name' => 'شاحن Fast Charger',
                'description' => 'شاحن سريع بجودة عالية مناسب لمختلف الهواتف والأجهزة الذكية.',
                'price' => 300,
                'sale_price' => 249,
                'quantity' => 30,
                'image' => 'category/2024-10-13-670bcdca320c8.webp',
            ],

        ];

        foreach ($products as $item) {

            $category = ProductCategory::where(
                'slug',
                $item['category']
            )->first();

            if (!$category) {
                continue;
            }

            Product::updateOrCreate(
                [
                    'name' => $item['name'],
                    'category_id' => $category->id,
                ],
                [
                    'description' => $item['description'],
                    'price' => $item['price'],
                    'sale_price' => $item['sale_price'],
                    'quantity' => $item['quantity'],

                    'images' => [
                        $item['image'],
                    ],

                    'is_new' => true,
                    'is_featured' => true,
                    'status' => true,
                ]
            );
        }
    }
}