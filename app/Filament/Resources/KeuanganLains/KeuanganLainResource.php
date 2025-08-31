<?php

namespace App\Filament\Resources\KeuanganLains;

use App\Filament\Resources\KeuanganLains\Pages\CreateKeuanganLain;
use App\Filament\Resources\KeuanganLains\Pages\EditKeuanganLain;
use App\Filament\Resources\KeuanganLains\Pages\ListKeuanganLains;
use App\Filament\Resources\KeuanganLains\Pages\ViewKeuanganLain;
use App\Filament\Resources\KeuanganLains\Schemas\KeuanganLainForm;
use App\Filament\Resources\KeuanganLains\Schemas\KeuanganLainInfolist;
use App\Filament\Resources\KeuanganLains\Tables\KeuanganLainsTable;
use App\Models\KeuanganLain;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KeuanganLainResource extends Resource
{
    protected static ?string $model = KeuanganLain::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::DocumentPlus;

    protected static ?string $recordTitleAttribute = 'keuangan_lain';

    public static function getPluralLabel(): string
    {
        return 'Dokumen Keuangan Lain';
    }

    public static function getLabel(): string
    {
        return 'Dokumen Keuangan Lain';
    }
    public static function form(Schema $schema): Schema
    {
        return KeuanganLainForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return KeuanganLainInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KeuanganLainsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKeuanganLains::route('/'),
            'create' => CreateKeuanganLain::route('/create'),
            'view' => ViewKeuanganLain::route('/{record}'),
            'edit' => EditKeuanganLain::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
