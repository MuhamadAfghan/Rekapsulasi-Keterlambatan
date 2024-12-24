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
        Schema::create('students', function (Blueprint $table) {
            // $table->char('id', 36)->primary();
            $table->id();
            $table->string('nis');
            $table->string('name');
            $table->foreignId('rombel_id')->constrained('rombels')->onDelete('cascade'); // foreign key to rombels
            $table->foreignId('rayon_id')->constrained('rayons')->onDelete('cascade'); // foreign key to rayons
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};