<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifica Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">
<main class="container">
    <section class="row">
        <div class="col-md-12 my-4">
            <div class="btn-group" role="group" aria-label="Navigazione">
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Libri</a>
                <a href="{{ route('authors.index') }}" class="btn btn-secondary">Autori</a>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Categorie</a>
            </div>
            <h2 class="mt-5 mb-4">Modifica Libro</h2>
        </div>
    </section>

    <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Titolo -->
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $book->title) }}">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Descrizione -->
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $book->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Numero di Pagine -->
                <div class="mb-3">
                    <label for="pages" class="form-label">Numero di Pagine</label>
                    <input type="number" class="form-control @error('pages') is-invalid @enderror" id="pages" name="pages" value="{{ old('pages', $book->pages) }}">
                    @error('pages')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Autore -->
                <div class="mb-3">
                    <label for="author_id" class="form-label">Autore</label>
                    <select class="form-select @error('author_id') is-invalid @enderror" id="author_id" name="author_id">
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                        @endforeach
                    </select>
                    @error('author_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Categoria -->
                <div class="mb-3">
                    <label for="category_id" class="form-label">Categoria</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Immagine -->
                <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                    @if ($book->image)
                        <div class="mt-2">
                            <img src="{{ asset($book->image) }}" alt="Immagine Libro" class="img-fluid" width="100">
                        </div>
                    @endif
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Bottone Salva -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Salva</button>
                </div>
            </div>
        </div>
    </form>
</main>
</body>
</html>
