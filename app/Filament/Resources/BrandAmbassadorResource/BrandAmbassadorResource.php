<?php

namespace App\Filament\Resources\BrandAmbassadorResource;

use App\Filament\Resources\BrandAmbassadorResource\Schemas\BrandAmbassadorForm;
use App\Models\BrandAmbassador;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class BrandAmbassadorResource extends Resource
{
    protected static ?string $model = BrandAmbassador::class;

    protected static ?string $slug = 'brand-ambassadors';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Brand Ambassador';

    protected static ?string $modelLabel = 'Brand Ambassador';

    protected static ?string $pluralModelLabel = 'Brand Ambassador';

    protected static string|\UnitEnum|null $navigationGroup = 'Galeri & Brand';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return BrandAmbassadorForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return Tables\BrandAmbassadorsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBrandAmbassadors::route('/'),
            'create' => Pages\CreateBrandAmbassador::route('/create'),
            'edit' => Pages\EditBrandAmbassador::route('/{record}/edit'),
        ];
    }
}
