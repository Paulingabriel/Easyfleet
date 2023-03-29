<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Depenses extends Model
{
    use HasFactory;
    protected $table="depenses";
    protected $primaryKey="id";
    protected $fillable= ["id","date1","date2","number","devise","fournisseur_id", "vehicule_id", "categorie_id"];

    public function fournisseur(){
        return $this->belongsTo(Fournisseurs::class);
    }

    public function vehicule(){
        return $this->belongsTo(Véhicules::class);
    }
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
