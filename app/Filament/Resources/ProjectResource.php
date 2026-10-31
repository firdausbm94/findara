<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('category')
                ->options([
                    // Kategori Industri / Template
                    'Corporate & Business' => 'Corporate & Business',
                    'Medical & Healthcare' => 'Medical & Healthcare',
                    'Property & Real Estate' => 'Property & Real Estate',
                    'E-Commerce & Retail' => 'E-Commerce & Retail',
                    'Education & LMS' => 'Education & LMS',
                    'SaaS & Landing Page' => 'SaaS & Landing Page',
                    'Portfolio & Creative' => 'Portfolio & Creative',
                    
                    // Kategori Custom System
                    'Web Company Profile' => 'Web Company Profile',
                    'Web Booking / Reservasi' => 'Web Booking / Reservasi',
                    'Web System / App' => 'Web System / App',
                    'Enterprise System' => 'Enterprise System',
                ])
                ->searchable()
                ->required(),
            Forms\Components\Select::make('badge_color')
                ->options([
                    'primary' => 'Biru (Primary)',
                    'success' => 'Hijau (Success)',
                    'warning' => 'Kuning (Warning)',
                    'danger' => 'Merah (Danger)',
                    'info' => 'Cyan (Info)',
                ])
                ->required(),
            Forms\Components\FileUpload::make('image')
                ->image()
                ->directory('projects-thumbnails')
                ->label('Gambar Thumbnail'),
            Forms\Components\TextInput::make('live_url')
                ->label('Live View URL atau Relative Path')
                ->placeholder('Contoh: /template/namatema/index.html atau http://resto.test'),
            Forms\Components\Textarea::make('description')
                ->required()
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('image')
                ->circular(),
            Tables\Columns\TextColumn::make('title')
                ->searchable(),
            Tables\Columns\TextColumn::make('category')
                ->badge(),
            Tables\Columns\TextColumn::make('live_url')
                ->label('URL Preview')
                ->limit(30),
        ])->filters([])->actions([
            Tables\Actions\EditAction::make(),
        ])->bulkActions([
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}