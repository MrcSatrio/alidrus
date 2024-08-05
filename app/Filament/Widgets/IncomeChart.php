<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class IncomeChart extends ChartWidget
{
    protected static ?string $heading = 'Income Chart';

    protected function getData(): array
    {
        $data = Trend::query(
            Transaction::query()
                ->where('id_jenis_transaksi', 1) // 1 = Pemasukan
        )
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->sum('total_pembayaran');

        return [
            'datasets' => [
                [
                    'label' => 'Income',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
