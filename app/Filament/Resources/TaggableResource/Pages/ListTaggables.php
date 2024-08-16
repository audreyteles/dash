<?php

namespace App\Filament\Resources\TaggableResource\Pages;

use App\Filament\Resources\TaggableResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTaggables extends ListRecords
{
    protected static string $resource = TaggableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
