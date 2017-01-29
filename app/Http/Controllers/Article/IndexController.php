<?php

namespace App\Http\Controllers\Article;

use Image as II;
use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $news = Article::populate('published_at')->paginate();
        // event(new \App\Events\XxxEvent($news));

        return view('article.index', compact('news'));
    }
    public function create()
    {
        return view('article.create');
    }

    public function store(ArticleRequest $request)
    {
        event('beforeSaveArticle', $request);
        $article = auth()->user()->article()->create($request->all());
        $article->tag()->attach($request->input('tags'));

        $this->saveFile($request, $article);

        flash("Новость {$article->title} создана");

        return redirect()->route('article.index');
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
        
        flash("Новость {$article->title} обновлена")->important();

        return redirect()->route('article.index');
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

                $path = $image->storeAs('article', $fullname, 'article');

                $ii = II::make(public_path($path));

                $thpath = $ii
                    ->fit(200)
                    ->text('Blog', 20, 20)
                    ->save(public_path('article') . '/th-' . $fullname);

                $article->images()->create([
                    'name' => sprintf('%s.%s', $name, $ext),
                    'path' => $path,
                    'thpath' => 'article/' . $thpath->basename
                ]);
            }
        }
    }

    public function deleteImage(\App\Image $image)
    {
        \Storage::disk('article')->delete([$image->path, $image->thpath]);

        $image->delete();

        flash()->info('Картинка удалена');
        
        return redirect()->back();
    }
}
