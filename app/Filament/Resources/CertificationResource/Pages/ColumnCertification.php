<?php 


namespace App\Filament\Resources\CertificationResource\Pages ; 

use Filament\Tables\Columns\TextColumn ; 
use Filament\Tables\Columns\ImageColumn ;

class ColumnCertification
{
    public static function getColumns(): array {
        return [
            TextColumn::make('id')->label('Code')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('created_at')->label('Créer à')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')->label('Modifier le')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('libelle')->label('Libellé')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: false),
            TextColumn::make('source')->label('Source')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: false),
            TextColumn::make('description')->label('description')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('commencement')->label('Début')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('fin')->label('Fin')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            ImageColumn::make('vignette')
            ->label('Vignette')
            ->getStateUsing(fn ($record) => asset($record->fichier->chemin)),
            TextColumn::make('fichier')->label('fichier')->formatStateUsing(fn (string $state) => 'Télécharger')
            ->url(fn ($record) => asset($record->fichier->chemin), true) // true = force le téléchargement
            ->openUrlInNewTab()->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: false),
        ] ; 
    }
}