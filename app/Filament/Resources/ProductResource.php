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

    public static function getNavigationLabel(): string
    {
        return __('dashboard.product.label');
    }

    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->label(__('fields/product.name')),
                Forms\Components\Textarea::make('description')->label(__('fields/product.description')),
                Forms\Components\TextInput::make('price')->numeric()->required()->label(__('fields/product.price')),
                Forms\Components\TextInput::make('stock')->numeric()->required()->label(__('fields/product.stock')),
                Forms\Components\FileUpload::make('image')->directory('product-images')->label(__('fields/product.image')),
                Forms\Components\Select::make('owner_id')
                    ->relationship('owner', 'name')
                    ->searchable()
                    ->required()
                    ->label(__('fields/product.owner')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('price')->money('OMR'),
                Tables\Columns\TextColumn::make('stock'),
                Tables\Columns\TextColumn::make('owner.name')->label('Owner'),
                ImageColumn::make('image')->disk('public')->label('product-images'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
        ];
    }
}
