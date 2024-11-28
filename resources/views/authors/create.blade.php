<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aggiungi un Autore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">
<main class="container">
    <section class="row">
        <div class="col-md-12 my-4">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ route('authors.index') }}" class="btn btn-secondary">Autori</a>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Libri</a>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Categorie</a>
            </div>
            <h2 class="mt-5 mb-4">Aggiungi un Autore</h2>
        </div>
    </section>

    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <!-- Nome dell'Autore -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Data di Nascita -->
                <div class="mb-3">
                    <label for="birthday" class="form-label">Data di Nascita</label>
                    <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" value="{{ old('birthday') }}">
                    @error('birthday')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Salva</button>
            </div>
        </div>
    </form>
</main>
</body>

</html>
