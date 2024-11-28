<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(StoreAuthorRequest $request)
    {
        // I dati validati sono accessibili tramite $request
        $validated = $request->validated();

        // Creazione dell'autore
        Author::create([
            'name' => $validated['name'],
            'birthday' => $validated['birthday'], // Può essere null
        ]);

        return redirect()->route('authors.index')->with('success', 'Autore creato con successo!');
    }

    public function show($id)
    {
        $author = Author::findOrFail($id);

        if ($author->birthday) {
            $author->birthday = Carbon::parse($author->birthday); // Converte la data in un oggetto Carbon
        }

        return view('authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(UpdateAuthorRequest $request, Author $author)
    {
        // I dati validati sono accessibili tramite $request->validated()
        $validated = $request->validated();

        // Aggiorna l'autore
        $author->update([
            'name' => $validated['name'],
            'birthday' => $validated['birthday'], // Può essere null
        ]);

        // Reindirizza con un messaggio di successo
        return redirect()->route('authors.index')->with('success', 'Autore aggiornato con successo!');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Autore eliminato con successo!');
    }
}
