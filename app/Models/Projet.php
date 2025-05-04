<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        'is_github',
        'github',
        'bilan',
        'type',
        'ordre',
        'id_vignette',
        'id_apprentissage',
        'id_certification',
    ];

    /**
     * Clé étrangère 
     */
    public function vignette(){
        return $this->belongsTo(Vignette::class,'id_vignette');
    }

    public function apprentissages(){
        return $this->belongsToMany(Apprentissage::class,'projets_has_apprentissages', 'projet_id','apprentissage_id');
    }

    /**
     * Méthode SQL
     */
    
     public static function getProjetWithApprentissage(){
        $projets = DB::table('projets')
        ->join('projets_has_apprentissages', 'projets.id', '=', 'projets_has_apprentissages.id_projet')
        ->join('apprentissages', 'projets_has_apprentissages.id_apprentissage', '=', 'apprentissages.id')
        ->join('vignettes', 'apprentissages.id_vignette', '=', 'vignettes.id')
        ->select('*')
        ->get();
        return $projets;
     }
}
