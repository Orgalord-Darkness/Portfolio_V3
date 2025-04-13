<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

     /**
     * Attributs
     * @var array<int,string> 
     */
    protected $fillable = [
        'libelle',
        'description',
        'source',
        'commencement',
        'fin',
        'id_vignette',
        'id_fichier'
    ];

    public function projets(){
        return $this->belongsToMany(Projet::class); 
    }

    public function vignette(){
        return $this->belongsTo(Vignette::class,'id_vignette'); 
    }

    public function fichier(){
        return $this->belongsTo(Fichier::class,'id_fichier'); 
    }
}
