<?php

namespace App\Filament\Admin\Resources\MatchaResource\Pages;

use App\Filament\Admin\Resources\MatchaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMatchas extends ListRecords
{
    protected static string $resource = MatchaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
