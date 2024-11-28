<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'birthday'];

    // Assicurati che 'birthday' venga trattato come un oggetto Carbon
    protected $dates = ['birthday'];

    // Relazione: un autore ha molti libri
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
