<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // الاسم
                TextInput::make('name')
                    ->label('اسم المستخدم')
                    ->required()
                    ->maxLength(255),

                // البريد الإلكتروني
                TextInput::make('email')
                    ->label('البريد الإلكتروني')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                // كلمة المرور
                TextInput::make('password')
                    ->label('كلمة المرور')
                    ->password()
                    ->required(fn ($record) => $record === null)
                    ->dehydrated(fn ($state) => filled($state))
                    ->minLength(8)
                    ->maxLength(255)
                    ->helperText(
                        'اتركها فارغة عند تعديل المستخدم للاحتفاظ بكلمة المرور الحالية.'
                    ),

            ]);
    }
}
