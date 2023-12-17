@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Créer un Nouveau Tag</h2>
                <p class="lead">Remplissez les détails du nouveau tag ci-dessous.</p>
            </div>

            <div class="row g-5">
                <div class="col-md-12">
                    <form action="{{ route('tags.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nom du Tag</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nom du tag" required>
                            <div class="invalid-feedback">
                                Un nom pour le tag est requis.
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Créer le tag</button>
                        <a href="{{ route('tags.index') }}" class="btn btn-outline-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
