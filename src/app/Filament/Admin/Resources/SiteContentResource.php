<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SiteContentResource\Pages;
use App\Models\SiteContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SiteContentResource extends Resource
{
    protected static ?string $model = SiteContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Pengaturan Website';

    protected static ?string $navigationLabel = 'Konten Halaman';

    protected static ?string $modelLabel = 'Konten Halaman';

    protected static ?string $pluralModelLabel = 'Konten Halaman';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Identitas Konten')
                    ->schema([
                        Forms\Components\Select::make('page')
                            ->label('Halaman')
                            ->options([
                                'global' => 'Global',
                                'home' => 'Home',
                                'about' => 'Tentang Matcha',
                                'matchas' => 'Katalog Matcha',
                                'articles' => 'Artikel',
                                'menus' => 'Rekomendasi Menu',
                                'search' => 'Search',
                                'contact' => 'Kontak',
                            ])
                            ->required()
                            ->native(false),

                        Forms\Components\TextInput::make('section')
                            ->label('Section Key')
                            ->placeholder('Contoh: hero, footer, info')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Isi Konten')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->maxLength(255),

                        Forms\Components\Textarea::make('subtitle')
                            ->label('Subjudul')
                            ->rows(3),

                        Forms\Components\RichEditor::make('content')
                            ->label('Konten')
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar')
                            ->image()
                            ->disk('public')
                            ->directory('site-contents')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->acceptedFileTypes([
                                'image/jpeg',
                                'image/png',
                                'image/webp',
                            ])
                            ->imageEditor()
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('button_label')
                            ->label('Label Tombol')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('button_url')
                            ->label('URL Tombol')
                            ->placeholder('/katalog-matcha')
                            ->maxLength(255),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page')
                    ->label('Halaman')
                    ->badge()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('section')
                    ->label('Section')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->limit(45)
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diubah')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('page')
                    ->label('Halaman')
                    ->options([
                        'global' => 'Global',
                        'home' => 'Home',
                        'about' => 'Tentang Matcha',
                        'matchas' => 'Katalog Matcha',
                        'articles' => 'Artikel',
                        'menus' => 'Rekomendasi Menu',
                        'search' => 'Search',
                        'contact' => 'Kontak',
                    ]),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('page');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiteContents::route('/'),
            'create' => Pages\CreateSiteContent::route('/create'),
            'edit' => Pages\EditSiteContent::route('/{record}/edit'),
        ];
    }
}
