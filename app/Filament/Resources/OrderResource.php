<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationLabel = 'Pesanan (Orders)';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('order_id')
                ->label('Nomor Invoice')
                ->disabled(),
            Forms\Components\Select::make('product_id')
                ->relationship('product', 'name')
                ->label('Produk')
                ->disabled(),
            Forms\Components\TextInput::make('customer_name')
                ->label('Nama Pembeli')
                ->required(),
            Forms\Components\TextInput::make('customer_email')
                ->label('Email Pembeli')
                ->email()
                ->required(),
            Forms\Components\TextInput::make('customer_phone')
                ->label('No. WhatsApp')
                ->required(),
            Forms\Components\TextInput::make('total_price')
                ->label('Total Bayar')
                ->numeric()
                ->prefix('Rp')
                ->disabled(),
            Forms\Components\Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'paid'    => 'Paid (Lunas)',
                    'failed'  => 'Failed / Expired',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('order_id')
                ->label('Invoice')
                ->searchable()
                ->copyable(),
            Tables\Columns\TextColumn::make('product.name')
                ->label('Produk')
                ->searchable(),
            Tables\Columns\TextColumn::make('customer_name')
                ->label('Pembeli')
                ->searchable(),
            Tables\Columns\TextColumn::make('customer_phone')
                ->label('WhatsApp'),
            Tables\Columns\TextColumn::make('total_price')
                ->label('Total')
                ->money('IDR', locale: 'id')
                ->sortable(),
            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'paid'    => 'success',
                    'pending' => 'warning',
                    'failed'  => 'danger',
                    default   => 'gray',
                }),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Tanggal')
                ->dateTime('d M Y H:i')
                ->sortable(),
        ])->defaultSort('created_at', 'desc')
          ->filters([])
          ->actions([
              Tables\Actions\EditAction::make(),
          ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit'   => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}