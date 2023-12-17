@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="py-5 text-center">
                        <h2>Créer une Catégorie</h2>
                        <p class="lead">Remplissez le formulaire ci-dessous pour ajouter une nouvelle catégorie.</p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('categories.store') }}" method="POST" class="needs-validation" novalidate="">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nom de la Catégorie</label>
                                    <input type="text" class="form-control" id="name" name="name" required="">
                                    <div class="invalid-feedback">
                                        Le nom de la catégorie est requis.
                                    </div>
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
