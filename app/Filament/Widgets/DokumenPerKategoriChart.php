<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Documents;

class DokumenPerKategoriChart extends ChartWidget
{
    protected ?string $heading = 'Dokumen per Kategori';
    protected int|string|array $columnSpan = 'half';

    protected string $color = 'info'; 

    protected function getData(): array
    {
        $data = Documents::selectRaw('jenis, COUNT(*) as total')
            ->groupBy('jenis')
            ->pluck('total', 'jenis')
            ->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Dokumen',
                    'data' => array_values($data),
                    'backgroundColor' => [
                        '#f87171', // merah
                        '#60a5fa', // biru
                        '#34d399', // hijau
                        '#fbbf24', // kuning
                        '#a78bfa', // ungu
                    ],
                ],
            ],
            'labels' => array_keys($data),
        ];
    }

    protected function getType(): string
    {
        return 'pie'; 
    }
}
