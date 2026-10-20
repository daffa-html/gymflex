<?php

namespace App\Filament\Resources\BrandAmbassadorResource\Pages;

use App\Filament\Resources\BrandAmbassadorResource\BrandAmbassadorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBrandAmbassador extends EditRecord
{
    protected static string $resource = BrandAmbassadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
