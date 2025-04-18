<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichier extends Model
{
    use HasFactory;

     /**
     * Attributs du modèle.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'chemin',
        'taille',
        'extension',
    ];
}
