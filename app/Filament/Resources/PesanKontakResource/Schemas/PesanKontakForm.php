<?php

namespace App\Filament\Resources\PesanKontakResource\Schemas;

use Filament\Forms;
use Filament\Schemas;
use Filament\Schemas\Schema;

class PesanKontakForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            Schemas\Components\Section::make('Informasi Pengirim')->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('subjek')
                    ->label('Subjek')
                    ->required()
                    ->maxLength(255),
            ])->columns(2),

            Schemas\Components\Section::make('Isi Pesan')->schema([
                Forms\Components\Textarea::make('pesan')
                    ->label('Pesan')
                    ->required()
                    ->rows(4),

                Forms\Components\Toggle::make('sudah_dibaca')
                    ->label('Sudah Dibaca')
                    ->default(false),
            ]),
        ]);
    }
}
