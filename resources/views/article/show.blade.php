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
@endsection

@section('title', $article->title)