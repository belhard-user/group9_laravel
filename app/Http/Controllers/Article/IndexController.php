<?php

namespace App\Http\Controllers\Article;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $news = Article::populate('published_at')->paginate();
        
        return view('article.index', compact('news'));
    }
    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        auth()->user()->article()->create($request->all());

        return redirect()->back();
    }

    public function show(Article $article)
    {
        return view('article.show', ['article' => $article]);
    }

    public function edit(Article $article)
    {
        return view('article.update')->withArticle($article);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return redirect()->back();
    }
}
