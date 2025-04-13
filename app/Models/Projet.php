<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    /**
     * Attributs du modèle
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'description',
        'chef',
        'duree',
        'stack',
        'bilan',
        'type',
        'ordre',
        'id_vignette'
    ];

    /**
     * Clé étrangère 
     */
    public function vignette(){
        return $this->belongsTo(Vignette::class,'id_vignette');
    }
}
