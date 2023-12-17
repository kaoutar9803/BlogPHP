@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Modifier l'Utilisateur</h2>
                <p class="lead">Modifiez les informations de l'utilisateur ci-dessous.</p>
            </div>

            <div class="row g-5">
                <div class="col-md-12">
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                        </div>

                        <div class="mb-3">

                            <label for="password" class="form-label">Nouveau mot de passe (laisser vide si inchangé)</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection
