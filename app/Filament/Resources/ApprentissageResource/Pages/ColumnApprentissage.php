<?php 


namespace App\Filament\Resources\ApprentissageResource\Pages ; 

use Filament\Tables\Columns\TextColumn ; 
use Filament\Tables\Columns\ImageColumn ;

class ColumnApprentissage
{
    public static function getColumns(): array {
        return [
            TextColumn::make('id')->label('Code')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('created_at')->label('Créer à')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')->label('Modifier le')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('libelle')->label('Libellé')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: false),
            TextColumn::make('description')->label('description')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('commencement')->label('Début')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('fin')->label('Fin')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            ImageColumn::make('vignette')
            ->label('Vignette')
            ->getStateUsing(fn ($record) => asset($record->vignette->chemin)),
        ] ; 
    }
}