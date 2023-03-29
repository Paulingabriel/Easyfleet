<?php

namespace App\Models;

use App\Models\Fournisseurs;
use App\Models\Véhicules;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Controle extends Model
{
    use HasFactory;

    protected $table="controles";
    protected $primaryKey="id";
    protected $fillable= ["id","number","rappel","fournisseur_id", "vehicule_id"];

    public function fournisseur(){
        return $this->belongsTo(Fournisseurs::class);
    }

    public function vehicule(){
        return $this->belongsTo(Véhicules::class);
    }
}
