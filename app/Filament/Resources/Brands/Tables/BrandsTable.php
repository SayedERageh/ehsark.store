<?php

namespace App\Filament\Resources\Brands\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class BrandsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                // صورة البراند
                ImageColumn::make('image')
                    ->label('اللوجو')
                    ->disk('public')
                    ->square(),

                // اسم البراند
                TextColumn::make('name')
                    ->label('اسم البراند')
                    ->searchable()
                    ->sortable(),

                // ترتيب البراند
                TextColumn::make('sort_order')
                    ->label('الترتيب')
                    ->sortable(),

                // حالة البراند
                ToggleColumn::make('status')
                    ->label('نشط'),

                // تاريخ الإضافة
                TextColumn::make('created_at')
                    ->label('تاريخ الإضافة')
                    ->dateTime('d/m/Y')
                    ->sortable(),

            ])

            ->filters([

                // فلتر الحالة
                //
                // ممكن نضيف فلتر نشط / غير نشط هنا لاحقًا

            ])

            ->recordActions([
                EditAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])

            ->defaultSort('sort_order', 'asc');
    }
}
    
