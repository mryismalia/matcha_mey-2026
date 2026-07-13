<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\MenuRecommendationResource\Pages;
use App\Models\MenuRecommendation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class MenuRecommendationResource extends Resource
{
    protected static ?string $model = MenuRecommendation::class;

    protected static ?string $navigationIcon = 'heroicon-o-cake';

    protected static ?string $navigationGroup = 'Konten Matcha';

    protected static ?string $navigationLabel = 'Rekomendasi Menu';

    protected static ?string $modelLabel = 'Rekomendasi Menu';

    protected static ?string $pluralModelLabel = 'Rekomendasi Menu';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Menu')
                    ->description('Kelola rekomendasi menu matcha berdasarkan karakter rasa, tingkat kemanisan, dan jenis menu.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Menu')
                            ->placeholder('Contoh: Matcha Latte')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set): void {
                                if ($operation === 'create') {
                                    $set('slug', Str::slug($state));
                                }
                            }),

                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->placeholder('matcha-latte')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        Forms\Components\Select::make('taste_profile')
                            ->label('Karakter Rasa')
                            ->options(MenuRecommendation::TASTE_PROFILES)
                            ->required()
                            ->native(false)
                            ->searchable(),

                        Forms\Components\Select::make('sweetness_level')
                            ->label('Tingkat Kemanisan')
                            ->options(MenuRecommendation::SWEETNESS_LEVELS)
                            ->required()
                            ->native(false),

                        Forms\Components\Select::make('menu_type')
                            ->label('Jenis Menu')
                            ->options(MenuRecommendation::MENU_TYPES)
                            ->required()
                            ->native(false),

                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar Menu')
                            ->image()
                            ->disk('public')
                            ->directory('menu-recommendations')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->acceptedFileTypes([
                                'image/jpeg',
                                'image/png',
                                'image/webp',
                            ])
                            ->imageEditor()
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->placeholder('Tuliskan deskripsi singkat mengenai menu ini.')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->disk('public')
                    ->square(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Menu')
                    ->searchable()
                    ->sortable()
                    ->limit(35),

                Tables\Columns\TextColumn::make('taste_profile')
                    ->label('Karakter Rasa')
                    ->badge()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('sweetness_level')
                    ->label('Kemanisan')
                    ->badge()
                    ->sortable(),

                Tables\Columns\TextColumn::make('menu_type')
                    ->label('Jenis Menu')
                    ->badge()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diubah')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('taste_profile')
                    ->label('Karakter Rasa')
                    ->options(MenuRecommendation::TASTE_PROFILES),

                Tables\Filters\SelectFilter::make('sweetness_level')
                    ->label('Tingkat Kemanisan')
                    ->options(MenuRecommendation::SWEETNESS_LEVELS),

                Tables\Filters\SelectFilter::make('menu_type')
                    ->label('Jenis Menu')
                    ->options(MenuRecommendation::MENU_TYPES),
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
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListMenuRecommendations::route('/'),
            'create' => Pages\CreateMenuRecommendation::route('/create'),
            'edit' => Pages\EditMenuRecommendation::route('/{record}/edit'),
        ];
    }
}
