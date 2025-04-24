<?php 
namespace App\Filament\Resources\CertificationResource\Pages;

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

class FieldCertification
{
    public static function getFields()
    {
        return Fieldset::make('APPRENTISSAGES')->schema([
                TextInput::make('libelle')
                    ->label('Libellé')
                    ->required()
                    ->columnSpan(1),

                TextInput::make('source')
                    ->label('Source')
                    ->required()
                    ->columnSpan(1),

                Textarea::make('description')
                    ->label('Description')
                    ->rows(3)
                    ->columnSpan(2),

                DatePicker::make('commencement')
                    ->label('Début')
                    ->columnSpan(1),

                DatePicker::make('fin')
                    ->label('Fin')
                    ->columnSpan(1),

                Select::make('id_vignette')
                    ->relationship('vignette', 'nom')
                    ->label('Vignette')
                    ->columnSpan(2),

                Select::make('id_fichier')
                ->relationship('fichier', 'nom')
                ->label('Fichier')
                ->columnSpan(2),
        ]);
    }
}