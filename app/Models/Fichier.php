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

    protected static function booted()
        {
            static::saving(function ($model) {
                if ($model->file) {
                    $model->nom = $model->file->getClientOriginalName();
                    $model->chemin = $model->file->store('uploads', 'public');
                    $model->taille = $model->file->getSize();
                    $model->extension = $model->file->getClientOriginalExtension();
                }
            });
        }


}
