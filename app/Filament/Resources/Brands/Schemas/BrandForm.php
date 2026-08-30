<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('بيانات البراند')
                    ->schema([

                        TextInput::make('name')
                            ->label('اسم البراند')
                            ->required()
                            ->maxLength(255),

                        FileUpload::make('image')
                            ->label('صورة البراند')
                            ->image()
                            ->disk('public')
                            ->directory('brands')
                            ->visibility('public')
                            ->imageEditor()
                            ->required(),

                        TextInput::make('url')
                            ->label('رابط البراند')
                            ->url()
                            ->nullable()
                            ->placeholder('https://example.com'),

                    ])
                    ->columns(2),

                Section::make('إعدادات البراند')
                    ->schema([

                        Toggle::make('status')
                            ->label('عرض البراند')
                            ->default(true),

                        TextInput::make('sort_order')
                            ->label('ترتيب البراند')
                            ->numeric()
                            ->default(0)
                            ->minValue(0),

                    ])
                    ->columns(2),

            ]);
    }
}
    
