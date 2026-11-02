<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationLabel = 'Produk Digital';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->label('Nama Produk')
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('category')
                ->label('Kategori Produk')
                ->options([
                    'Source Code & Template' => 'Source Code & Template',
                    'E-Book & Panduan'       => 'E-Book & Panduan',
                    'Video Course'           => 'Video Course',
                    'Tools & Asset Digital'  => 'Tools & Asset Digital',
                ])
                ->required(),
            Forms\Components\TextInput::make('price')
                ->label('Harga (Rp)')
                ->numeric()
                ->prefix('Rp')
                ->required(),
            Forms\Components\FileUpload::make('image')
                ->label('Gambar Thumbnail')
                ->image()
                ->directory('products-thumbnails'),
            Forms\Components\TextInput::make('file_url')
                ->label('Link Download Produk Digital (GDrive / Cloud)')
                ->placeholder('https://drive.google.com/...')
                ->columnSpanFull(),
            Forms\Components\Textarea::make('description')
                ->label('Deskripsi Produk')
                ->required()
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('image')
                ->label('Thumbnail')
                ->circular(),
            Tables\Columns\TextColumn::make('name')
                ->label('Nama Produk')
                ->searchable(),
            Tables\Columns\TextColumn::make('category')
                ->label('Kategori')
                ->badge(),
            Tables\Columns\TextColumn::make('price')
                ->label('Harga')
                ->money('IDR', locale: 'id')
                ->sortable(),
        ])->filters([])->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit'   => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}