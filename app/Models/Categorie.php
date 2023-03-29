<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;

    protected $table="categories";
    protected $primaryKey="id";
    protected $fillable= ["id","name"];

    public function depenses(){

        return $this->hasMany(Depenses::class, 'categorie_id');
    }
}
