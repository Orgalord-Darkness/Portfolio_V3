<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
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
     *Clé étrangère pointant vers projet  
    */   
    public function project(){
        return $this->belongsTo(Projet::class, 'id_projet'); 
    }

}
