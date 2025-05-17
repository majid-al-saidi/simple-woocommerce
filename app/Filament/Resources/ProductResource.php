<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\{TextColumn, ImageColumn};


class ProductResource extends Resource
{

    //This is for the translation: //resources\lang\ar\models\product.php
    public static function getLabel(): string
    {
        return __('product.label');
    }

    public static function getPluralLabel(): string
    {
        return __('product.plural');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-dashboard.product.label');
    }

    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->label(__('product.fields.name')),
                Forms\Components\Textarea::make('description')->label(__('product.fields.description')),
                Forms\Components\TextInput::make('price')->numeric()->required()->label(__('product.fields.price')),
                Forms\Components\TextInput::make('stock')->numeric()->required()->label(__('product.fields.stock')),
                Forms\Components\FileUpload::make('image')->directory('product-images')->label(__('product.fields.image')),
                Forms\Components\Select::make('owner_id')
                    ->relationship('owner', 'name')
                    ->searchable()
                    ->required()
                    ->label(__('product.fields.owner')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable()->label(__('product.fields.name')),
                Tables\Columns\TextColumn::make('price')->money('OMR')->label(__('product.fields.price')),
                Tables\Columns\TextColumn::make('stock')->label(__('product.fields.stock')),
                Tables\Columns\TextColumn::make('owner.name')->searchable()->label('Owner')->label(__('product.fields.owner')),
                ImageColumn::make('image')->disk('public')->label('product-images')->label(__('product.fields.image')),
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
                Tables\Actions\ViewAction::make()->label(__('product.fields.view')),
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
