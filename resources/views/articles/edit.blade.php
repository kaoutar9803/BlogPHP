@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title">Modifier l'Article</h2>
                            <form action="{{ route('articles.update', $article) }}" method="POST" class="needs-validation" novalidate="">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="title" class="form-label">Titre</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}" required="">
                                    <div class="invalid-feedback">
                                        Un titre est requis.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="content" class="form-label">Contenu</label>
                                    <textarea class="form-control" id="content" name="content" required="">{{ $article->content }}</textarea>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#content'))
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    </script>
                                    <div class="invalid-feedback">
                                        Le contenu de l'article est requis.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Catégorie</label>
                                    <select class="form-select" id="category_id" name="category_id" required="">
                                        <option value="">Choisissez une catégorie</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="tags" class="form-label">Tags</label>
                                    @foreach ($tags as $tag)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag_{{ $tag->id }}"
                                                {{ in_array($tag->id, $article->tags->pluck('id')->toArray()) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="tag_{{ $tag->id }}">
                                                {{ $tag->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                <button class="btn btn-primary" type="submit">Enregistrer les modifications</button>
                                <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary">Annuler</a>
                            </form>

                            <form action="{{ route('articles.destroy', $article) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer l'article</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
