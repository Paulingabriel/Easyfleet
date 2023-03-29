<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fournisseurs;
use App\Models\Véhicules;

class Maintenances extends Model
{
    use HasFactory;

    protected $table="maintenances";
    protected $primaryKey="id";
    protected $fillable= ["id","date","description","image","fournisseur_id", "vehicule_id"];


    public function fournisseur(){
        return $this->belongsTo(Fournisseurs::class);
    }

    public function vehicule(){
        return $this->belongsTo(Véhicules::class);
    }
}
