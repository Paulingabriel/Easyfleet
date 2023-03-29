<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Véhicules extends Model
{
    use HasFactory;

    protected $table= "véhicules";
    protected $primaryKey= "id";
    protected $fillable= ['id','matricule','nom','type','marque','modèle','couleur','prix','devise','image','conducteur_id'];

    public function conducteur(){
        return $this->belongsTo(Conducteurs::class);
    }

    public function maintenances(){

        return $this->hasMany(Maintenances::class, 'vehicule_id','id');
    }

    public function nettoyages(){

        return $this->hasMany(Nettoyage::class, 'vehicule_id','id');
    }

    public function controles(){

        return $this->hasMany(Controle::class, 'vehicule_id','id');
    }

    public function depenses(){

        return $this->hasMany(Depenses::class, 'vehicule_id');
    }

    public function carburants(){

        return $this->hasMany(Carburant::class, 'vehicule_id','id');
    }


}
