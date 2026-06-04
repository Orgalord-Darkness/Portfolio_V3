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
use Illuminate\Support\Str;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class FieldDocumentation
{
    private static array $allowedExtensions = ['pdf'];

    public static function getFields()
    {
        return Fieldset::make('DOCUMENTATIONS')->schema([
            Forms\Components\FileUpload::make('attachment')
            ->getUploadedFileNameForStorageUsing(
                function (TemporaryUploadedFile $file, Get $get): string {
                    $ext = strtolower($file->getClientOriginalExtension());
                    if (!in_array($ext, self::$allowedExtensions)) {
                        abort(422, 'Extension de fichier non autorisée.');
                    }
                    return ($get('_file_uuid') ?: (string) Str::uuid()) . '.' . $ext;
                }
            )
            ->afterStateUpdated(function (TemporaryUploadedFile $state, Set $set) {
                if ($state) {
                    $ext = strtolower($state->getClientOriginalExtension());
                    if (!in_array($ext, self::$allowedExtensions)) {
                        abort(422, 'Extension de fichier non autorisée.');
                    }
                    $uuid = (string) Str::uuid();
                    $set('_file_uuid', $uuid);
                    $set('nom', $state->getClientOriginalName());
                    $set('extension', $ext);
                    $set('taille', $state->getSize());
                    $set('chemin', 'storage/documentations/' . $uuid . '.' . $ext);
                }
            })
            ->disk('public')
            ->directory('documentations')
            ->visibility('public')
            ->required(),
            Forms\Components\Hidden::make('_file_uuid'),
            
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