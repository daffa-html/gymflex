<?php

namespace App\Filament\Resources\KategoriProdukResource\Schemas;

use Filament\Forms;
use Filament\Schemas;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class KategoriProdukForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Schemas\Components\Section::make('Informasi Kategori')->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Kategori')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state))),

                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
            ])->columns(2),

            Schemas\Components\Section::make('Detail Lainnya')->schema([
                Forms\Components\TextInput::make('ikon')
                    ->label('Ikon')
                    ->maxLength(255)
                    ->placeholder('Contoh: heroicon-o-heart'),

                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->rows(3),
            ])->columns(2),
        ]);
    }
}
