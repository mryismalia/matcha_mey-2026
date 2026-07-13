<?php

namespace App\Filament\Admin\Resources\MatchaResource\Pages;

use App\Filament\Admin\Resources\MatchaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMatcha extends EditRecord
{
    protected static string $resource = MatchaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
