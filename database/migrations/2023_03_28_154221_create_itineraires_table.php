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
        Schema::create('itineraires', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('depart_id');
            $table->unsignedBigInteger('arrivee_id');
            $table->foreign('depart_id')->references('id')->on('positions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('arrivee_id')->references('id')->on('positions')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itineraires');
    }
};
