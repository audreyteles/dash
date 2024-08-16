<?php

namespace App\Filament\Resources\TaggableResource\Pages;

use App\Filament\Resources\TaggableResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTaggable extends CreateRecord
{
    protected static string $resource = TaggableResource::class;
}
