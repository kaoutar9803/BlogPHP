<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::query();

        if ($request->has('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('name', $request->tag);
            });
        }

        $articles = $query->get();
        return view('articles.index', compact('articles'));
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create', compact('categories','tags'));
    }

    public function store(Request $request)
    {
        // Validation des données de l'article
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);
        $validatedData['user_id'] = Auth::id();
        $article = Article::create($validatedData);
        $article->tags()->sync($request->tags);
        return redirect()->route('articles.index');
    }


    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.edit', compact('article', 'categories', 'tags'));
    }

    public function update(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $article->update($validatedData);

        $article->tags()->sync($request->input('tags', []));

        return redirect()->route('articles.index');
    }


    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
}
