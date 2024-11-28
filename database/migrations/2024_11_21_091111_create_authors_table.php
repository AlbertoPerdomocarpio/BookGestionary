<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id(); // ID univoco
            $table->string('name'); // Nome completo
            $table->date('birthday')->nullable(); // Data di nascita (opzionale)
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('authors');
    }
};
