<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                // الاسم
                TextColumn::make('name')
                    ->label('اسم المستخدم')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                // البريد الإلكتروني
                TextColumn::make('email')
                    ->label('البريد الإلكتروني')
                    ->searchable()
                    ->sortable()
                    ->copyable(),

                // تاريخ إنشاء الحساب
                TextColumn::make('created_at')
                    ->label('تاريخ التسجيل')
                    ->dateTime('Y/m/d H:i')
                    ->sortable(),

                // آخر تحديث
                TextColumn::make('updated_at')
                    ->label('آخر تحديث')
                    ->dateTime('Y/m/d H:i')
                    ->sortable(),

            ])

            ->filters([
                //
            ])

            ->recordActions([
                EditAction::make()
                    ->label('تعديل'),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('حذف المحدد'),
                ]),
            ]);
    }
}
