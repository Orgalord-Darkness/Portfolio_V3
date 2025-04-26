<?php 


namespace App\Filament\Resources\ProjetResource\Pages; 

use Filament\Tables\Columns\TextColumn; 
use Filament\Tables\Columns\ImageColumn;
use Filament\Support\Enums\VerticalAlignment;

class ColumnProjet
{
    public static function getColumns(): array {
        return [
            TextColumn::make('id')->label('Code')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('created_at')->label('Créer à')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')->label('Modifier le')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('nom')->label('Nom')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: false),
            TextColumn::make('description')->label('description')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('chef')->label('Responsable')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('duree')->label('Durée')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('stack')->label('Stack')->searchable()->sortable()->wrap()->verticalAlignment(VerticalAlignment::Start)->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('is_github')->label('Stack')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('github')->label('Github')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true)->url(fn ($record) => $record->github)
            ->openUrlInNewTab(),
            TextColumn::make('bilan')->label('bilan')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('type')->label('type')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('ordre')->label('ordre')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('description')->label('description')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            ImageColumn::make('vignette')
            ->label('Vignette')
            ->getStateUsing(fn ($record) => asset($record->vignette->chemin)),
        ] ; 
    }
}