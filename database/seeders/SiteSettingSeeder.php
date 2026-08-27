<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => 'أوتاد مصر',

                'site_description' => 'أوتاد مصر متخصص في بيع الأدوات الصحية والخلاطات والأحواض وجميع مستلزمات السباكة الأصلية، بالإضافة إلى المعدات والمستلزمات الصحية بأفضل الأسعار وجودة مضمونة.',

                'phone' => '201500035736',

                'whatsapp' => '201500035736',

                'email' => null,

                'address' => 'مصر',

                'facebook' => null,

                'instagram' => null,

                'tiktok' => null,

                'youtube' => null,

                'logo' => null,

                'favicon' => null,

                'footer_text' => '© جميع الحقوق محفوظة - أوتاد مصر',
            ]
        );
    }
}