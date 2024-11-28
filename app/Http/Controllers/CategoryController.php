<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request) : RedirectResponse
    {
        $validated = $request->validated();

        Category::query()->create($validated);
        return redirect()->route('categories.index')->with('success', 'Categoria creata con successo!');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // Dati validati
        $validated = $request->validated();

        // Aggiorna la categoria
        $category->update([
            'name' => $validated['name'],
        ]);

        return redirect()->route('categories.index')->with('success', 'Categoria aggiornata con successo!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Categoria eliminata con successo!.');
    }
}
