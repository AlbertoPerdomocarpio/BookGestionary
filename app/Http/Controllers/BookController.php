<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'category'])->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.create', compact('authors', 'categories'));
    }

    public function store(StoreBookRequest $request)
    {
        $validated = $request->validated();

        // Gestione immagine (se presente)
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $imageName);
            $imagePath = 'img/' . $imageName;
        }

        // Creazione del libro
        Book::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'pages' => $validated['pages'],
            'author_id' => $validated['author_id'],
            'category_id' => $validated['category_id'],
            'image' => $imagePath,
        ]);

        return redirect()->route('books.index')->with('success', 'Libro creato con successo!');
    }


    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $validated = $request->validated();

        // Gestione immagine (se presente)
        $imagePath = $book->image; // Mantieni l'immagine esistente se non viene caricata una nuova
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $imageName);
            $imagePath = 'img/' . $imageName;
        }

        // Aggiorna il libro
        $book->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'pages' => $validated['pages'],
            'author_id' => $validated['author_id'],
            'category_id' => $validated['category_id'],
            'image' => $imagePath,
        ]);

        return redirect()->route('books.index')->with('success', 'Libro aggiornato con successo!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Libro eliminato con successo!');
    }
}
