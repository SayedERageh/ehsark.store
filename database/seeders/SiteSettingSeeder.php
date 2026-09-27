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
                'site_name' => 'شارك استور',

                'site_description' => 'شارك استور متجر متخصص في إكسسوارات الموبايلات، يوفر تشكيلة متنوعة من إكسسوارات الهواتف بجودة وأسعار مناسبة.',

                'phone' => '+20 11 08775757',

                'whatsapp' => '+201108775757',

                'email' => null,

                'address' => null,

                'facebook' => null,

                'instagram' => null,

                'tiktok' => null,

                'youtube' => null,

                'logo' => null,

                'favicon' => null,

                'footer_text' => 'شارك استور - كل احتياجات موبايلك في مكان واحد.',
            ]
        );
    }
}