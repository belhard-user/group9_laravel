<?php

namespace App\Http\Requests;

use App\Article;
use App\Tag;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $tagsId = Tag::pluck('id')->toArray();
        $routeName = array_get($this->route()->getAction(), 'as');

        $rule =  [
            'title' => 'required|max:100|unique:articles',
            'short_description' => 'required|max:255',
            'body' => 'required',
            'published_at' => 'required|date',
            'tags.*' => 'in:' . implode(',', $tagsId)
        ];

        if($routeName == 'article.update'){
            $rule['title'] = 'required|max:100|unique:articles,title,' . $this->route('article')->id;
        }

        return $rule;
    }
}
