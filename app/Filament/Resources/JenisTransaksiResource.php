<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisTransaksiResource\Pages;
use App\Filament\Resources\JenisTransaksiResource\RelationManagers;
use App\Models\JenisTransaksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JenisTransaksiResource extends Resource
{
    protected static ?string $model = JenisTransaksi::class;

    protected static ?string $navigationIcon = 'heroicon-c-list-bullet';

    protected static ?string $label = 'Jenis Transaksi';
    protected static ?string $pluralLabel = 'Jenis Transaksi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_jenis_transaksi')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_jenis_transaksi')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_jenis_transaksi')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListJenisTransaksis::route('/'),
            'create' => Pages\CreateJenisTransaksi::route('/create'),
            'edit' => Pages\EditJenisTransaksi::route('/{record}/edit'),
        ];
    }
}
