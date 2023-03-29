<?php

namespace App\Models;

use App\Models\Controle;
use App\Models\Carburant;
use App\Models\Nettoyage;
use App\Models\CoutAutres;
use App\Models\CoutControle;
use App\Models\Maintenances;
use App\Models\CoutCarburant;
use App\Models\CoutNettoyage;
use App\Models\CoutMaintenance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fournisseurs extends Model
{
    use HasFactory;

    protected $table="fournisseurs";
    protected $primaryKey="id";
    protected $fillable=['nom','type','email','tel'];

    public function maintenances(){

        return $this->hasMany(Maintenances::class, 'fournisseur_id','id');
    }

    public function nettoyages(){

        return $this->hasMany(Nettoyage::class, 'fournisseur_id','id');
    }

    public function controles(){

        return $this->hasMany(Controle::class, 'fournisseur_id','id');
    }

    public function depenses(){

        return $this->hasMany(Depenses::class, 'fournisseur_id');
    }

    public function carburants(){

        return $this->hasMany(Carburant::class, 'fournisseur_id','id');
    }

}
