<?php

namespace App\Http\Controllers\Article;

use App\Article;
use App\Http\Requests\ArticleRequest;
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

    public function store(ArticleRequest $request)
    {
        $article = auth()->user()->article()->create($request->all());
        $article->tag()->attach($request->input('tags'));

        $this->saveFile($request, $article);

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

    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());
        $this->saveFile($request, $article);
        $article->tag()->sync($request->get('tags'));

        return redirect()->back();
    }

    /**
     * @param ArticleRequest $request
     * @param $article
     */
    protected function saveFile(ArticleRequest $request, Article $article)
    {
        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                /** @var \Illuminate\Http\UploadedFile $image */
                $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $ext = $image->extension();
                $fullname = sprintf('%s_%s.%s', time(), $name, $ext);

                $path = $image->storeAs('article', $fullname);

                $article->images()->create([
                    'name' => sprintf('%s.%s', $name, $ext),
                    'path' => $path
                ]);
            }
        }
    }
}
