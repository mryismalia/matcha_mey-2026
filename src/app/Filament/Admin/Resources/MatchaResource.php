<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\MatchaResource\Pages;
use App\Models\Matcha;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MatchaResource extends Resource
{
    protected static ?string $model = Matcha::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static ?string $navigationGroup = 'Konten Matcha';

    protected static ?string $navigationLabel = 'Jenis Matcha';

    protected static ?string $modelLabel = 'Jenis Matcha';

    protected static ?string $pluralModelLabel = 'Jenis Matcha';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Jenis Matcha')
                    ->description('Kelola data katalog jenis matcha yang akan tampil pada website pengunjung.')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Matcha')
                            ->placeholder('Contoh: Ceremonial Matcha')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('grade')
                            ->label('Grade')
                            ->placeholder('Contoh: Ceremonial, Premium, Culinary')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('origin')
                            ->label('Origin')
                            ->placeholder('Contoh: Uji, Japan')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('taste_profile')
                            ->label('Karakter Rasa')
                            ->placeholder('Contoh: Smooth, Light, Umami')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->placeholder('Tuliskan penjelasan lengkap mengenai jenis matcha ini.')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('usage_recommendation')
                            ->label('Rekomendasi Penggunaan')
                            ->placeholder('Contoh: Cocok untuk matcha latte, cookies, dessert, dan lain-lain.')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar Matcha')
                            ->image()
                            ->disk('public')
                            ->directory('matchas')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->acceptedFileTypes([
                                'image/jpeg',
                                'image/png',
                                'image/webp',
                            ])
                            ->imageEditor()
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
                    ->label('Nama Matcha')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('grade')
                    ->label('Grade')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('origin')
                    ->label('Origin')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('taste_profile')
                    ->label('Karakter Rasa')
                    ->searchable()
                    ->limit(30),

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
                Tables\Filters\SelectFilter::make('grade')
                    ->label('Filter Grade')
                    ->options([
                        'Ceremonial' => 'Ceremonial',
                        'Premium' => 'Premium',
                        'Culinary' => 'Culinary',
                    ]),
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
            'index' => Pages\ListMatchas::route('/'),
            'create' => Pages\CreateMatcha::route('/create'),
            'edit' => Pages\EditMatcha::route('/{record}/edit'),
        ];
    }
}
