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
        Schema::create('carburants', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("type");
            $table->string("date");
            $table->string("number");
            $table->string("devise");
            $table->string("quantite");
            $table->string("debut");
            $table->string("fin");
            $table->foreignId('fournisseur_id')->constrained('fournisseurs')->onDelete("cascade");
            $table->foreignId('vehicule_id')->constrained('véhicules')->onDelete("cascade");
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
        Schema::dropIfExists('carburants');
    }
};
