@extends('layouts.app')


@section('content')

    @foreach($users as $user)
        <li><a href="{{ action('DBController@relationUser', ['user' => $user->id]) }}">{{ $user->email }}</a></li>
    @endforeach
@stop