<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $pemasukan = Transaction::where('id_jenis_transaksi', 1)->sum('total_pembayaran');
        $pengeluaran = Transaction::where('id_jenis_transaksi', 2)->sum('total_pembayaran');

        return [
            Stat::make('Total Pemasukan', 'Rp.' . number_format($pemasukan))
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Total Pengeluaran', 'Rp.' . number_format($pengeluaran)),
            Stat::make('Selisih Transaksi', 'Rp.' . number_format($pemasukan - $pengeluaran)),
        ];
    }
}
