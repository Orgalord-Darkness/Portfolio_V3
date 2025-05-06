<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    
    /**
     * Méthodes requêtes SQL
     */
    public static function getAvatar(){
        $fichier = DB::table('fichiers')
        ->where('fichiers.nom', '=', 'Avatar')
        ->select('fichiers.chemin')
        ->first();

        return $fichier->chemin; 
     }


}
