<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // ID univoco
            $table->string('name'); // Nome categoria
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
};

