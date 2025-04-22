<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FichierResource\Pages;
use App\Filament\Resources\FichierResource\Pages\ColumnFichier;
use App\Filament\Resources\FichierResource\Pages\FieldFichier;
use App\Filament\Resources\FichierResource\RelationManagers;
use App\Models\Fichier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FichierResource extends Resource
{
    protected static ?string $model = Fichier::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([FieldFichier::getFields()]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(ColumnFichier::getColumns())
            ->filters([])
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
            'index' => Pages\ListFichiers::route('/'),
            'create' => Pages\CreateFichier::route('/create'),
            'edit' => Pages\EditFichier::route('/{record}/edit'),
        ];
    }
}
