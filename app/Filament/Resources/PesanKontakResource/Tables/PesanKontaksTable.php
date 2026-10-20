<?php

namespace App\Filament\Resources\PesanKontakResource\Tables;

use Filament\Actions;
use Filament\Tables;
use Filament\Tables\Table;

class PesanKontaksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('subjek')
                    ->label('Subjek')
                    ->searchable(),

                Tables\Columns\TextColumn::make('pesan')
                    ->label('Pesan')
                    ->limit(50),

                Tables\Columns\IconColumn::make('sudah_dibaca')
                    ->label('Dibaca')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TernaryFilter::make('sudah_dibaca')
                    ->label('Sudah Dibaca'),
            ])
            ->recordActions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->toolbarActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
