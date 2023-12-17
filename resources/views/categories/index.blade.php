@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Liste des Catégories</h2>
                <p class="lead">Ci-dessous se trouve la liste de toutes les catégories.</p>
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Créer une nouvelle catégorie</a>
            </div>

            <div class="row g-5">
                <div class="col-md-12">
                    <h4 class="mb-3">Catégories</h4>
                    <ul class="list-group mb-3">
                        @foreach ($categories as $category)
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">{{ $category->name }}</h6>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-secondary">Éditer</a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
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
