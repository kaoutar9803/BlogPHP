@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Liste des Utilisateurs</h2>
                <p class="lead">Ci-dessous se trouve la liste de tous les utilisateurs.</p>
                <a href="{{ route('users.create') }}" class="btn btn-primary">Créer un nouvel utilisateur</a>
            </div>

            <div class="row g-5">
                <div class="col-md-12">
                    <h4 class="mb-3">Utilisateurs</h4>
                    <ul class="list-group mb-3">
                        @foreach ($users as $user)
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">{{ $user->name }}</h6>
                                    <small class="text-body-secondary">{{ $user->email }}</small>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-outline-secondary">Éditer</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </main>
    </div>
@endsection
