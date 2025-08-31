<?php

namespace App\Filament\Resources\KeuanganLains\Pages;

use App\Filament\Resources\KeuanganLains\KeuanganLainResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKeuanganLains extends ListRecords
{
    protected static string $resource = KeuanganLainResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
