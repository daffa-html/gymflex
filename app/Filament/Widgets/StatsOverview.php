<?php

namespace App\Filament\Widgets;

use App\Models\PesanKontak;
use App\Models\Produk;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 0;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Produk', Produk::count())
                ->description('Jumlah semua produk')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('success'),

            Stat::make('Pesan Baru', PesanKontak::where('sudah_dibaca', false)->count())
                ->description('Belum dibaca')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('danger'),
        ];
    }
}
