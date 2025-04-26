<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
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
        'id_projet'
    ];

    /**
     *Clé étrangère
    */   
    public function projet(){
        return $this->belongsTo(Projet::class, 'id_projet'); 
    }

}
