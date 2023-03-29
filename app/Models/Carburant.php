<?php

namespace App\Models;

use App\Models\Véhicules;
use App\Models\Fournisseurs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carburant extends Model
{
    use HasFactory;

    protected $table="carburants";
    protected $primaryKey="id";
    protected $fillable= ["id","type","date","number","devise","quantite","debut","fin","fournisseur_id", "vehicule_id"];

    public function fournisseur(){
        return $this->belongsTo(Fournisseurs::class);
    }

    public function vehicule(){
        return $this->belongsTo(Véhicules::class);
    }
}
