<?php

namespace App\Filament\Resources\GaleriResource\Schemas;

use Filament\Forms;
use Filament\Schemas;
use Filament\Schemas\Schema;

class GaleriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Schemas\Components\Section::make('Informasi Galeri')->schema([
                Forms\Components\TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('kategori')
                    ->label('Kategori')
                    ->options([
                        'foto' => 'Foto Produk',
                        'dokumentasi' => 'Dokumentasi',
                        'kegiatan' => 'Kegiatan',
                    ])
                    ->default('foto')
                    ->required(),
            ])->columns(2),

            Schemas\Components\Section::make('Detail Lainnya')->schema([
                Forms\Components\FileUpload::make('gambar')
                    ->label('Gambar')
                    ->image()
                    ->disk('public')
                    ->directory('galeri')
                    ->required(),

                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->rows(3),
            ])->columns(2),
        ]);
    }
}
