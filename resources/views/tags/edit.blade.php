@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Modifier le Tag</h2>
                <p class="lead">Modifiez les détails du tag ci-dessous.</p>
            </div>

            <div class="row g-5">
                <div class="col-md-12">
                    <form action="{{ route('tags.update', $tag) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nom du Tag</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $tag->name }}" required>
                            <div class="invalid-feedback">
                                Un nom est requis.
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                        <a href="{{ route('tags.index') }}" class="btn btn-outline-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
