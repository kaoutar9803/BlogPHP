@extends('layouts.app')

@section('content')
    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Album example</h1>
                    <p class="lead text-body-secondary">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                    <p>
                        <a href="{{ route('articles.create') }}" class="btn btn-primary my-2">Créer un nouvel article</a>
                    </p>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($articles as $article)
                        <div class="col">
                            <div class="card shadow-sm">
                                {{-- Illustration de l'article --}}
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>{{ $article->title }}</title>
                                    <rect width="100%" height="100%" fill="#55595c"/>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $article->title }}</text>
                                </svg>
                                <div class="card-body">
                                    <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                                    <div>
                                        @foreach ($article->tags as $tag)
                                            <span class="badge bg-secondary">{{ $tag->name }}</span>
                                        @endforeach
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('articles.show', $article) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                            <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                            <form action="{{ route('articles.destroy', $article) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        </div>
                                        <small class="text-body-secondary">{{ $article->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
