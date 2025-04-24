<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentationResource\Pages;
use App\Filament\Resources\DocumentationResource\Pages\FieldDocumentation;
use App\Filament\Resources\DocumentationResource\Pages\ColumnDocumentation;
use App\Filament\Resources\DocumentationResource\RelationManagers;
use App\Models\Documentation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocumentationResource extends Resource
{
    protected static ?string $model = Documentation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup ='Administration';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FieldDocumentation::getFields()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(ColumnDocumentation::getColumns())
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
            'index' => Pages\ListDocumentations::route('/'),
            'create' => Pages\CreateDocumentation::route('/create'),
            'edit' => Pages\EditDocumentation::route('/{record}/edit'),
        ];
    }
}
