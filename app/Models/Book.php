<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Campi fillable
    protected $fillable = ['title', 'description', 'pages', 'author_id', 'category_id', 'image'];

    // Relazione: un libro appartiene a un autore
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // Relazione: un libro appartiene a una categoria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
