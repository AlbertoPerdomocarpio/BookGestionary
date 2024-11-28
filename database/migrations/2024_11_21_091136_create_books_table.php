<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // ID univoco
            $table->string('title'); // Titolo del libro
            $table->text('description')->nullable(); // Descrizione (opzionale, max 800 caratteri)
            $table->integer('pages')->nullable(); // Numero di pagine (opzionale)
            $table->foreignId('author_id')->constrained('authors')->onDelete('cascade'); // Relazione con authors
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Relazione con categories
            $table->string('image')->nullable(); // Percorso immagine (opzionale)
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
};
