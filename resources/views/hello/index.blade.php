@extends('layouts.master')

@section('content')
    @if(count($names))
        <ul class="list-group">
            @foreach($names as $name)
                <li class="list-group-item">
                    <a target="_blank" href="{{ route('show.user.name', ['name' => $name]) }}">{{ $name }}</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>Извините никого нету дома</p>
    @endif
@endsection

@section('page-title', 'Люди которые мне нравятся')
@section('menu')
    <li>Link in people</li>
@endsection

@section('title', 'Люди')

@section('footer')
    <p>Lorem ipsum dolor sit.</p>
@endsection
