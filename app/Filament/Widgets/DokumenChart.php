<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Documents;

class DokumenChart extends ChartWidget
{
    protected ?string $heading = 'Grafik Dokumen';

    public static function getSort(): int
    {
        return 1;
    }

    protected function getData(): array
    {

        $data = Documents::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->pluck('total', 'bulan')
            ->toArray();


        $labels = [];
        $values = [];
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = date('F', mktime(0, 0, 0, $i, 1)); 
            $values[] = isset($data[$i]) ? (int)$data[$i] : 0; 
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Dokumen',
                    'data' => $values,
                    'borderColor' => '#3b82f6', 
                    'backgroundColor' => 'rgba(59, 130, 246, 0.4)',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line'; 
    }
}
