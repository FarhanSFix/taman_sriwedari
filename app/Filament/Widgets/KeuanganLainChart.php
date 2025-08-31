<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\KeuanganLain;

class KeuanganLainChart extends ChartWidget
{
    protected ?string $heading = 'Grafik Keuangan Lain';

    public static function getSort(): int
    {
        return 2; 
    }

    protected function getData(): array
    {
        // Ambil jumlah data per bulan dari kolom bulan_pengesahan
        $data = KeuanganLain::selectRaw('MONTH(bulan_pengesahan) as bulan, COUNT(*) as total')
            ->whereNotNull('bulan_pengesahan')
            ->groupBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();

        // Siapkan label bulan Januari - Desember
        $labels = [];
        $values = [];
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = date('F', mktime(0, 0, 0, $i, 1));
            $values[] = isset($data[$i]) ? (int) $data[$i] : 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Keuangan Lain',
                    'data' => $values,
                    'backgroundColor' => 'rgba(16, 185, 129, 0.6)', // hijau transparan
                    'borderColor' => '#10b981', // hijau solid
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Bisa diganti 'line' kalau mau garis
    }
}
