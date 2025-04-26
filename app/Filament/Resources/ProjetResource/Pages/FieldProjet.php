<?php 
namespace App\Filament\Resources\ProjetResource\Pages;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use App\Repositories\CommuneRepository;
use Filament\Forms\Components\Fieldset;
use Carbon\Carbon;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\BelongsToSelect;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SignalementResource\Pages;
use App\Filament\Resources\SignalementResource\RelationManagers;
use App\Models\Signalement;
use Filament\Forms;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Checkboxlist;
use Illuminate\Support\Facades\Hash;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class FieldProjet
{
    public static function getFields()
    {
        return Fieldset::make('PROJETS')->schema([
            TextInput::make('nom')
                    ->label('Nom')
                    ->required()
                    ->columnSpan(2),

                Textarea::make('description')
                    ->label('Description')
                    ->rows(3)
                    ->columnSpan(2),

                TextInput::make('chef')
                    ->label('Responsable')
                    ->columnSpan(2),

                TextInput::make('duree')
                    ->label('Durée')
                    ->columnSpan(1),

                TextInput::make('stack')
                    ->label('Stack')
                    ->columnSpan(1),

                CheckBox::make('is_github')
                    ->label('Est-ce hébergé sur github ?')
                    ->reactive(),
                    // ->columnSpace(1),

                TextInput::make('github')
                    ->label('Github')
                    ->visible(fn ($get) => $get('is_github') === true )
                    ->columnSpan(1),

                Textarea::make('bilan')
                    ->label('Bilan')
                    ->rows(3)
                    ->columnSpan(2),

                Select::make('type')
                    ->label('Type')
                    ->options([
                        'PPE' => 'Projet Personnel Encadré',
                        'MS' => 'Mission de Stage',
                        'PP' => 'Projet Personnel',
                    ])
                    ->columnSpan(1),

                TextInput::make('ordre')
                    ->label('Ordre')
                    ->numeric()
                    ->columnSpan(1),

                Select::make('id_vignette')
                    ->relationship('vignette', 'chemin')
                    ->label('Vignette')
                    ->columnSpan(2),
        ]);
    }
}