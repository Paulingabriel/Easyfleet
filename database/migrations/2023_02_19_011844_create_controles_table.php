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
        Schema::create('controles', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string("number");
            $table->string("rappel");
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
        Schema::dropIfExists('controles');
    }
};
