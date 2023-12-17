@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="py-5 text-center">
                        <h2>Créer un Article</h2>
                        <p class="lead">Remplissez les détails de l'article ci-dessous.</p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('articles.store') }}" method="POST" class="needs-validation" novalidate="">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Titre</label>
                                    <input type="text" class="form-control" id="title" name="title" required="">
                                    <div class="invalid-feedback">
                                        Un titre est requis.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="content" class="form-label">Contenu</label>
                                    <textarea class="form-control" id="content" name="content" required=""></textarea>
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
                                        <option value="">Choisissez...</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Veuillez sélectionner une catégorie valide.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="tags" class="form-label">Tags</label>
                                    @foreach ($tags as $tag)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag_{{ $tag->id }}">
                                            <label class="form-check-label" for="tag_{{ $tag->id }}">
                                                {{ $tag->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                <button class="w-100 btn btn-primary btn-lg" type="submit">Créer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection





