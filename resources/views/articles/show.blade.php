@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <main>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h1 class="card-title">{{ $article->title }}</h1>
                            <p class="card-text">{{ $article->content }}</p>
                            <div>
                                @foreach ($article->tags as $tag)
                                    <span class="badge bg-secondary">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary">Retour</a>
                                <small class="text-muted">{{ $article->created_at->diffForHumans() }}</small>
                                <div>
                                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary">Modifier</a>
                                    <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
