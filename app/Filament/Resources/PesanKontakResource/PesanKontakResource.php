<?php

namespace App\Filament\Resources\PesanKontakResource;

use App\Filament\Resources\PesanKontakResource\Schemas\PesanKontakForm;
use App\Models\PesanKontak;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class PesanKontakResource extends Resource
{
    protected static ?string $model = PesanKontak::class;

    protected static ?string $slug = 'pesan-kontaks';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationLabel = 'Pesan Kontak';

    protected static ?string $modelLabel = 'Pesan Kontak';

    protected static ?string $pluralModelLabel = 'Pesan Kontak';

    protected static string|\UnitEnum|null $navigationGroup = 'Komunikasi';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return PesanKontakForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return Tables\PesanKontaksTable::configure($table);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPesanKontaks::route('/'),
            'edit' => Pages\EditPesanKontak::route('/{record}/edit'),
        ];
    }
}
