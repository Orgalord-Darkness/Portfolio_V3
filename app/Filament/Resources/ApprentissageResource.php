<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApprentissageResource\Pages;
use App\Filament\Resources\ApprentissageResource\Pages\ColumnApprentissage;
use App\Filament\Resources\ApprentissageResource\Pages\FieldApprentissage;
use App\Filament\Resources\ApprentissageResource\RelationManagers;
use App\Models\Apprentissage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ApprentissageResource extends Resource
{
    protected static ?string $model = Apprentissage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administration';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FieldApprentissage::getFields()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(ColumnApprentissage::getColumns())
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
            'index' => Pages\ListApprentissages::route('/'),
            'create' => Pages\CreateApprentissage::route('/create'),
            'edit' => Pages\EditApprentissage::route('/{record}/edit'),
        ];
    }
}
