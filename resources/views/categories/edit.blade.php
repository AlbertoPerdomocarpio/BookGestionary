<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifica Categoria</title>
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
            <h2 class="mt-5 mb-4">Modifica Categoria</h2>
        </div>
    </section>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <!-- Nome della Categoria -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nome della Categoria</label>
                    <input type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           id="name"
                           name="name"
                           value="{{ old('name', $category->name) }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Bottone Salva -->
                <div class="d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary">Salva</button>
                </div>
            </div>
        </div>
    </form>
</main>
</body>

</html>
