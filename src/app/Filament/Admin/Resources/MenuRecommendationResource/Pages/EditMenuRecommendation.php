<?php

namespace App\Filament\Admin\Resources\MenuRecommendationResource\Pages;

use App\Filament\Admin\Resources\MenuRecommendationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMenuRecommendation extends EditRecord
{
    protected static string $resource = MenuRecommendationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
