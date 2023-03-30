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
        Schema::table('itineraires', function (Blueprint $table) {
            $table->integer('distance');
            $table->integer('tarif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('itineraires', function (Blueprint $table) {
            $table->dropColumn('distance');
            $table->dropColumn('tarif');
        });
    }
};
