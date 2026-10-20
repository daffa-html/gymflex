<?php

namespace App\Filament\Resources\BrandAmbassadorResource\Pages;

use App\Filament\Resources\BrandAmbassadorResource\BrandAmbassadorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBrandAmbassadors extends ListRecords
{
    protected static string $resource = BrandAmbassadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
