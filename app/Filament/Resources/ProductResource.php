<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;

use App\Models\Product;
use App\Traits\HasTranslatedResourceLabels;
use Filament\Forms;
use Filament\Forms\Components\{TextInput, Textarea, FileUpload, Select};
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\{TextColumn, ImageColumn};


class ProductResource extends Resource
{

    use HasTranslatedResourceLabels;

    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                static::__TextInput('name')->required(),
                static::__Textarea('description'),
                static::__TextInput('price')->numeric()->required(),
                static::__TextInput('stock')->numeric()->required(),
                static::__FileUpload('image')->directory('resources.products-images')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                static::__TextColumn('name')->searchable()->sortable(),
                static::__TextColumn('price')->money('OMR'),
                static::__TextColumn('stock'),
                static::__TextColumn('owner.name')->searchable(),
                static::__ImageColumn('image')->disk('public'),
            ])
            ->filters([
                Tables\Filters\Filter::make('in_stock')
                    ->query(fn($query) => $query->where('stock', '>', 0))
                    ->label('منتجات متوفرة'),
                Tables\Filters\Filter::make('out_of_stock')
                    ->query(fn($query) => $query->where('stock', 0))
                    ->label('منتجات غير متوفرة'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make()->label(__('resources.products.fields.view')),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
            'view' => Pages\ViewProduct::route('/{record}'),
        ];
    }
}
