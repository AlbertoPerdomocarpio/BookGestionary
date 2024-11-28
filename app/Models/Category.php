<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Campi fillable
    protected $fillable = ['name'];

    // Relazione: una categoria ha molti libri
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
