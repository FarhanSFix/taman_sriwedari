<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\DokumenChart;
use BackedEnum;
use App\Filament\Widgets\KeuanganLainChart;
use Filament\Support\Icons\Heroicon;
use App\Filament\Widgets\DokumenPerKategoriChart;

class Dashboard extends BaseDashboard
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Home;

    public function getWidgets(): array
    {
        return [
            DokumenChart::class,
            KeuanganLainChart::class,
            DokumenPerKategoriChart::class,
        ];
    }

    public function getColumns(): int|array
    {
        return [
            'default' => 12,
            'sm' => 12,
            'md' => 12,
            'lg' => 12,
            'xl' => 12,
        ];
    }
}
