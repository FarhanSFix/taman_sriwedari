<?php

namespace App\Filament\Resources\Dokumens\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Radio;
use Filament\Forms\Form;

class DokumenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('nama')
                    ->label('Nama Dokumen')
                    ->required()
                    ->maxLength(255),
                Select::make('jenis')
                    ->label('Jenis Dokumen')
                    ->options([
                        'LS/TUNAI' => 'LS/TUNAI',
                        'GU/TUNAI' => 'GU/TUNAI',
                        'GU/KKPD' => 'GU/KKPD',
                        'SPP SPM' => 'SPP SPM',
                    ])
                    ->required(),
                DatePicker::make('bulan_pengesahan')
                    ->label('Bulan Pengesahan')
                    ->required()
                    ->format('Y-m-d'),
                FileUpload::make('Bukti bayar')
                    ->label('Bukti bayar')
                    ->directory('uploads'),
                FileUpload::make('bukti dukung')
                    ->label('Bukti Dukung')
                    ->directory('uploads'),
                FileUpload::make('bank')
                    ->label('Bank')
                    ->directory('uploads'),
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
