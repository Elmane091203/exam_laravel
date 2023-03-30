<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('itineraire_chauffeurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('itineraire_id');
            $table->unsignedBigInteger('chauffeur_id');
            $table->unsignedBigInteger('client_id');
            $table->foreign('itineraire_id')->references('id')->on('itineraires')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('chauffeur_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('fait')->default(0);
            $table->integer('tarif');
            $table->integer('etat')->default(0);
            $table->integer('choisi')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itineraire_chauffeurs');
    }
};
