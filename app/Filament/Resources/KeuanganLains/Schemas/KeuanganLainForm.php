<?php

namespace App\Filament\Resources\KeuanganLains\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Radio;

class KeuanganLainForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->label('Nama Dokumen')
                    ->required()
                    ->maxLength(255),
                DatePicker::make('bulan_pengesahan')
                    ->label('Bulan Pengesahan')
                    ->required()
                    ->format('Y-m-d'),
                FileUpload::make('link')
                    ->label('Link Dokumen')
                    ->directory('uploads')
                    ->required(),
                Radio::make('keterangan')
                    ->label('Keterangan')
                    ->options([
                        'Belum diaudit' => 'Belum diaudit',
                        'Sudah diaudit' => 'Sudah diaudit',
                    ])
                    ->required(),
            ]);
    }
}
