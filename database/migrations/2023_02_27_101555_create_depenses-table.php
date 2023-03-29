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
        Schema::create('depenses', function (Blueprint $table) {
            $table->id();
            $table->string("date1");
            $table->string("date2");
            $table->string("number");
            $table->string("devise");
            $table->foreignId('fournisseur_id')->constrained('fournisseurs')->onDelete("cascade");
            $table->foreignId('vehicule_id')->constrained('véhicules')->onDelete("cascade");
            $table->foreignId('categorie_id')->constrained('categories')->onDelete("cascade");
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
        //
    }
};
