<?php 

namespace App\Filament\Resources\UserResource\Pages ; 

use App\Enums\SignalementEtatEnum ; 
use Filament\Tables\Columns\TextColumn ; 

class ColumnUser 
{
    public static function getColumns(): array {
        return [
            TextColumn::make('id')->label('Code')->searchable()->sortable()->wrap()->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('name')->label('Name')->searchable()->sortable()->wrap(),
            TextColumn::make('email')->label('Email')->searchable()->sortable()->wrap(),
        ] ; 
    }
}