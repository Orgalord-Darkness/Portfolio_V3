<?php 


namespace App\Filament\Resources\VignetteResource\Pages ; 

use Filament\Tables\Columns\TextColumn ; 
use Filament\Tables\Columns\ImageColumn ;

class ColumnVignette
{
    public static function getColumns(): array {
        return [
            TextColumn::make('id')->label('Code')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('created_at')->label('Créer à')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')->label('Modifier le')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('nom')->label('Nom')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: false),
            // TextColumn::make('chemin')->label('Chemin')->formatStateUsing(fn (string $state) => 'Télécharger')
            // ->url(fn ($record) => asset($record->chemin), true) // true = force le téléchargement
            // ->openUrlInNewTab()->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: false),
            // ImageColumn::make('chemin')->label('image')->searchable()->sortable()->wrap()
            // //->defaultImageUrl(url(fn ($record)=> asset('/storage/vignettes/'.$record->nom.'.'.$record->extension), true))
            // ->defaultImageUrl(url('/storage/vignettes/htmlcss.jpg'))

            ImageColumn::make('chemin')
            ->label('Aperçu')
            ->getStateUsing(fn ($record) => asset($record->chemin))


            ,
            TextColumn::make('extension')->label('Extension')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: false),
            TextColumn::make('taille')->label('Taille')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: false),

            // TextColumn::make('attachment')
            //     ->label('Voir')
            //     ->formatStateUsing(fn (string $state) => 'Voir le fichier')
            //     ->url(fn ($record) => asset('storage/fichiers/' . $record->attachment))
            //     ->openUrlInNewTab()
            //     ->icon('heroicon-m-eye'),
                

        
        
        ] ; 
    }
}