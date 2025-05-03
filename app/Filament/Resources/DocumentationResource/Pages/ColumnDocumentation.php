<?php 


namespace App\Filament\Resources\DocumentationResource\Pages ; 

use Filament\Tables\Columns\TextColumn ; 

class ColumnDocumentation
{
    public static function getColumns(): array {
        return [
            TextColumn::make('id')->label('Code')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('created_at')->label('Créer à')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')->label('Modifier le')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('nom')->label('Nom')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: false),
            TextColumn::make('chemin')->label('Chemin')->formatStateUsing(fn ($record) => $record->chemin)
            ->url(fn ($record) => asset($record->chemin), true) // true = force le téléchargement
            ->openUrlInNewTab()->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: false),
            TextColumn::make('extension')->label('Extension')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: false),
            TextColumn::make('taille')->label('Taille')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: false),
            TextColumn::make('id_projet')->label('Projet')->getStateUsing(fn ($record) => $record->projet->nom),

        ] ; 
    }
}