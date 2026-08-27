<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'site_description',
        'phone',
        'whatsapp',
        'email',
        'address',
        'facebook',
        'instagram',
        'tiktok',
        'youtube',
        'logo',
        'favicon',
        'footer_text',
    ];
}