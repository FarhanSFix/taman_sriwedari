<?php

namespace App\Filament\Resources\KeuanganLains\Pages;

use App\Filament\Resources\KeuanganLains\KeuanganLainResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewKeuanganLain extends ViewRecord
{
    protected static string $resource = KeuanganLainResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
