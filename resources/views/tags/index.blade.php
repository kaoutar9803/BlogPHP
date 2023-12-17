@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Liste des Tags</h2>
                <p class="lead">Ci-dessous se trouve la liste de tous les tags.</p>
                <a href="{{ route('tags.create') }}" class="btn btn-primary">Créer un nouveau tag</a>
            </div>

            <div class="row g-5">
                <div class="col-md-12">
                    <h4 class="mb-3">Tags</h4>
                    <ul class="list-group mb-3">
                        @foreach ($tags as $tag)
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">{{ $tag->name }}</h6>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('tags.edit', $tag) }}" class="btn btn-sm btn-outline-secondary">Éditer</a>
                                    <form action="{{ route('tags.destroy', $tag) }}" method="POST">
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
