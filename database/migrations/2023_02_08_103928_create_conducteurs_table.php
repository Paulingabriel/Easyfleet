<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conducteurs', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("nom");
            $table->string("prenom");
            $table->string("lieu");
            $table->date("naissance");
            $table->string("nationalite");
            $table->string("ville");
            $table->string("pays");
            $table->string("adresse");
            $table->date("embauche");
            $table->string("permis");
            $table->string("email");
            $table->string("tel1");
            $table->string("tel2")->nullable();
            $table->string("image")->default("images.png")->nullable();
            $table->string("piece");
            $table->string("noPiece");
            $table->char("sexe");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conducteurs');
    }
};
