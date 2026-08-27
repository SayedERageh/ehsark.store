<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('معلومات الموقع')
                    ->schema([
                        TextInput::make('site_name')
                            ->label('اسم الموقع')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('site_description')
                            ->label('وصف الموقع')
                            ->rows(4),
                    ])
                    ->columns(2),

                Section::make('بيانات التواصل')
                    ->schema([
                        TextInput::make('phone')
                            ->label('رقم الاتصال')
                            ->tel(),

                        TextInput::make('whatsapp')
                            ->label('رقم الواتساب')
                            ->tel(),

                        TextInput::make('email')
                            ->label('البريد الإلكتروني')
                            ->email(),

                        Textarea::make('address')
                            ->label('عنوان الموقع')
                            ->rows(3),
                    ])
                    ->columns(2),

                Section::make('روابط السوشيال ميديا')
                    ->schema([
                        TextInput::make('facebook')
                            ->label('Facebook')
                            ->url(),

                        TextInput::make('instagram')
                            ->label('Instagram')
                            ->url(),

                        TextInput::make('tiktok')
                            ->label('TikTok')
                            ->url(),

                        TextInput::make('youtube')
                            ->label('YouTube')
                            ->url(),
                    ])
                    ->columns(2),

                Section::make('الهوية البصرية')
                    ->schema([
                        FileUpload::make('logo')
                            ->label('اللوجو')
                            ->image()
                            ->directory('site-settings'),

                        FileUpload::make('favicon')
                            ->label('Favicon')
                            ->image()
                            ->directory('site-settings'),
                    ])
                    ->columns(2),

                Section::make('الفوتر')
                    ->schema([
                        Textarea::make('footer_text')
                            ->label('نص الفوتر')
                            ->rows(4),
                    ]),
            ]);
    }
}