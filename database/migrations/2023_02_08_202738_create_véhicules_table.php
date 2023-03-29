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
        Schema::create('véhicules', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("matricule");
            $table->string("nom");
            $table->string("type");
            $table->string("marque");
            $table->string("modèle");
            $table->string("couleur");
            $table->integer("prix");
            $table->string("devise");
            $table->string("image")->default("image6.png")->nullable();
            $table->foreignId('conducteur_id')->constrained('conducteurs')->onDelete("cascade");
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('véhicules', function(Blueprint $table){
            $table->dropForeign("conducteur_id");
        });
        Schema::dropIfExists('véhicules');
    }
};
