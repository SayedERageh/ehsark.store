<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('بيانات السؤال')
                    ->schema([

                        TextInput::make('question')
                            ->label('السؤال')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('answer')
                            ->label('الإجابة')
                            ->required()
                            ->rows(6)
                            ->columnSpanFull(),

                    ]),

                Section::make('إعدادات العرض')
                    ->schema([

                        TextInput::make('sort_order')
                            ->label('ترتيب الظهور')
                            ->numeric()
                            ->default(0)
                            ->helperText('الرقم الأصغر يظهر أولاً.'),

                        Toggle::make('is_active')
                            ->label('إظهار في الموقع')
                            ->default(true),

                    ])
                    ->columns(2),

            ]);
    }
}