<?php

namespace App\Filament\Resources\ContactResource\Pages;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use App\Repositories\CommuneRepository;
use Filament\Forms\Components\Fieldset;
use Carbon\Carbon;
use Filament\Forms\Components\Textarea;
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

class FieldContact
{
    public static function getFields()
    {
        return Fieldset::make('CONTACTS')->schema([
            Forms\Components\TextInput::make('nom')->required(), 
            Forms\Components\TextInput::make('prenom')->required(),
            Forms\Components\TextInput::make('societe')->required(), 
            Forms\Components\TextInput::make('email')->email()->required(),
            Forms\Components\TextArea::make('message')->required(),
        ]);
    }
}