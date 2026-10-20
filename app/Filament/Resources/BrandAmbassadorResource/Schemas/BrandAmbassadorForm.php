<?php

namespace App\Filament\Resources\BrandAmbassadorResource\Schemas;

use Filament\Forms;
use Filament\Schemas;
use Filament\Schemas\Schema;

class BrandAmbassadorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Schemas\Components\Section::make('Informasi Ambassador')->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('profesi')
                    ->label('Profesi')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('instagram')
                    ->label('Instagram')
                    ->maxLength(255)
                    ->placeholder('@username'),

                Forms\Components\TextInput::make('urutan')
                    ->label('Urutan')
                    ->numeric()
                    ->default(0),
            ])->columns(2),

            Schemas\Components\Section::make('Detail Lainnya')->schema([
                Forms\Components\FileUpload::make('foto')
                    ->label('Foto')
                    ->image()
                    ->disk('public')
                    ->directory('brand-ambassador')
                    ->nullable(),

                Forms\Components\Textarea::make('bio')
                    ->label('Bio')
                    ->rows(3),
            ])->columns(2),
        ]);
    }
}
