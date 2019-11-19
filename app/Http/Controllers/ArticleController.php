<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleValidate;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        $articles = $q ? Article::where('name', 'like', "%{$q}%")->paginate() : Article::paginate();

        return view('article.index', compact('articles', 'q'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function store(ArticleValidate $request)
    {
        $validated = $request->validated();
        $article = new Article();
        $article->fill($request->all());
        $article->save();
        $request->session()->flash('status', 'Task was successful!');
        return redirect()->route('articles.index');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    public function update(ArticleValidate $request, $id)
    {
        $article = Article::findOrFail($id);
        $validated = $request->validated();
        $article->fill($request->all());
        $article->save();
        $request->session()->flash('status', 'Task was successful!');
        return redirect()
            ->route('articles.index');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
        }
        return redirect()->route('articles.index');
    }
}
