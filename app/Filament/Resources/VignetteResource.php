<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VignetteResource\Pages;
use App\Filament\Resources\VignetteResource\Pages\ColumnVignette; 
use App\Filament\Resources\VignetteResource\Pages\FieldVignette;
use App\Filament\Resources\VignetteResource\RelationManagers;
use App\Models\Vignette;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VignetteResource extends Resource
{
    protected static ?string $model = Vignette::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FieldVignette::getFields()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(
                //
                ColumnVignette::getColumns()
            )
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
            'index' => Pages\ListVignettes::route('/'),
            'create' => Pages\CreateVignette::route('/create'),
            'edit' => Pages\EditVignette::route('/{record}/edit'),
        ];
    }
}
