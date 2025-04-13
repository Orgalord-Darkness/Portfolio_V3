<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprentissage extends Model
{
    use HasFactory;

    /**
     * Attributs
     * @var array<int,string> 
     */
    protected $fillable = [
        'libelle',
        'description',
        'commencement',
        'fin',
        'id_vignette'
    ];

    public function projets(){
        return $this->belongsToMany(Projet::class); 
    }

    public function vignette(){
        return $this->belongsTo(Vignette::class,'id_vignette'); 
    }
}
