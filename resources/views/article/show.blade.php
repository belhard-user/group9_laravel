@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h2>
                {{ $article->title }}
                <span class="text-muted">дата: {{ $article->published_at->diffForHumans() }}</span>
            </h2>
            <section>{{ $article->short_description }}</section>
        </div>
    </div>

    @if($article->tag->count())
        @foreach($article->tag as $tag)
            <span class="label label-success">{{ $tag->title }}</span>
        @endforeach
    @endif
@endsection



@section('title', $article->title)