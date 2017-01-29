@extends('layouts.app')

@section('content')
    <div class="container">
        @can('article-update', $article)
            <div class="row">
                <a class="btn btn-warning" href="{{ route('article.edit', ['article' => $article->slug]) }}">Редактировать</a>

                @can('article-delete', $article)
                    <a class="btn btn-warning" href="#">Удалить</a>
                @endcan
            </div>
        @endcan
        <div class="row">
            <div class="col-md-7">
                <div>
                    <h2>
                        {{ $article->title }}
                        <span class="text-muted">дата: {{ $article->published_at->diffForHumans() }}</span>
                    </h2>
                    <section>{{ $article->short_description }}</section>
                </div>
                @if($article->tag->count())
                    @foreach($article->tag as $tag)
                        <span class="label label-success">{{ $tag->title }}</span>
                    @endforeach
                @endif
            </div>
            <div class="col-md-5">
                @if($article->images->count())
                    @foreach($article->images as $image)
                        <img src="/{{ $image->thpath }}" alt="">
                    @endforeach
                @endif
            </div>
        </div>

    </div>
@endsection



@section('title', $article->title)