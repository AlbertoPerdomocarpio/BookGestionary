<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>I miei Libri</title>
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
            <a href="{{ route('books.create') }}" class="btn btn-primary mt-3">
                <i class="bi bi-plus-circle"></i> Aggiungi un Libro
            </a>
            <h2 class="mt-5 mb-4">I miei Libri</h2>
        </div>
    </section>

    <!-- Mostra il messaggio di successo se presente -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <section class="row">
        <div class="col-md-12">
            <div class="list-book">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Titolo</th>
                        <th scope="col">Autore</th>
                        <th scope="col">Categoria</th>
                        <th scope="col" class="text-end">Azioni</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td class="align-middle">{{ $book->title }}</td>
                            <td class="align-middle">{{ $book->author->name }}</td>
                            <td class="align-middle">{{ $book->category->name }}</td>
                            <td class="text-end">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('books.show', $book) }}" class="btn btn-light">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('books.edit', $book) }}" class="btn btn-light">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('books.destroy', $book) }}" method="POST"
                                          onsubmit="return confirm('Sei sicuro di voler eliminare questo libro?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-light">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
</body>

</html>
