<?php 
namespace App\Filament\Resources\DocumentationResource\Pages;

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

class FieldDocumentation
{
    public static function getFields()
    {
        return Fieldset::make('DOCUMENTATIONS')->schema([
            Forms\Components\FileUpload::make('attachment')
            ->getUploadedFileNameForStorageUsing(
                fn (TemporaryUploadedFile $file): string => $file->getClientOriginalName()
            )
            ->afterStateUpdated(function (TemporaryUploadedFile $state, callable $set) {
                if ($state) {
                    $set('nom', $state->getClientOriginalName());
                    $set('extension', $state->getClientOriginalExtension());
                    $set('taille', $state->getSize());
                    $set('chemin', 'storage/documentations/'.$state->getClientOriginalName());
                }
            })
            ->disk('public')
            ->directory('documentations') 
            ->visibility('public')
            ->required(),
            
            Forms\Components\TextInput::make('nom')->required(), 
            Forms\Components\TextInput::make('chemin')->required(),
            Forms\Components\TextInput::make('extension')->required(), 
            Forms\Components\TextInput::make('taille')->integer()->required(),
            Select::make('id_projet')
            ->relationship('projet', 'nom')
            ->label('Projet')
            ->columnSpan(2),
        ]);
    }
}