@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Créer un Nouvel Utilisateur</h2>
                <p class="lead">Remplissez les informations nécessaires pour créer un nouvel utilisateur.</p>
            </div>

            <div class="row g-5">
                <div class="col-md-12">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="invalid-feedback">
                                Le nom est requis.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <div class="invalid-feedback">
                                L'adresse email est requise.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="invalid-feedback">
                                Un mot de passe est requis.
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Créer l'utilisateur</button>
                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
