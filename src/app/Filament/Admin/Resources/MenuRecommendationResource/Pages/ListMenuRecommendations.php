<?php

namespace App\Filament\Admin\Resources\MenuRecommendationResource\Pages;

use App\Filament\Admin\Resources\MenuRecommendationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMenuRecommendations extends ListRecords
{
    protected static string $resource = MenuRecommendationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
