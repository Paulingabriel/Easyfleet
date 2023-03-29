<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Véhicules;

class Conducteurs extends Model
{
    use HasFactory;

    protected $table="conducteurs";
    protected $primaryKey="id";
    protected $fillable=['id','nom','prenom','lieu','naissance','nationalite','ville','pays','embauche','permis','adresse','email','tel1','tel2','image','piece','noPiece','sexe'];

    public function véhicules(){

        return $this->hasMany(Véhicules::class, 'conducteur_id','id');
    }

}

