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
        Schema::create('fasions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('kakaku');
            $table->integer('bunrui');
            $table->integer('color');
            $table->integer('brand');
            // $table->string('file_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasions');
    }
};
