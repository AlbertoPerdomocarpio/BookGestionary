<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $book->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">
<main class="container">
    <section class="row">
        <div class="col-md-12 my-4">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Libri</a>
                <a href="{{ route('authors.index') }}" class="btn btn-secondary">Autori</a>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Categorie</a>
            </div>
            <a href="{{ route('books.edit', $book) }}" class="btn btn-primary mt-3">
                <i class="bi bi-pencil"></i> Modifica Libro
            </a>
            <h2 class="mt-5 mb-4">{{ $book->title }}</h2>
        </div>
    </section>

    <section class="row">
        <div class="col-md-4">
            <figure>
                @if ($book->image)
                    <img src="{{ asset($book->image) }}" alt="Immagine Libro" class="img-thumbnail mt-2" style="max-width: 100%; height: auto;">
                @else
                    <img src="{{ asset('img/no-cover.webp') }}" class="rounded" alt="Copertina non disponibile" class="img-thumbnail" style="max-width: 100%; height: auto;">
                @endif
            </figure>
        </div>
        <div class="col-md-8">
            <div class="mb-4">
                <h4>Descrizione</h4>
                <p>{{ $book->description ?: 'Descrizione non disponibile.' }}</p>
            </div>
            <div class="border-top mt-2 pt-3">
                <h5>Dettagli</h5>
                <span class="badge text-bg-secondary">{{ $book->author->name }}</span>
                <span class="badge text-bg-secondary">{{ $book->category->name }}</span>
                <span class="badge text-bg-secondary">{{ $book->pages }} pagine</span>
            </div>
            <div class="mt-3">
                <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo libro?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash3"></i> Elimina Libro
                    </button>
                </form>
            </div>
        </div>
    </section>
</main>
</body>

</html>
