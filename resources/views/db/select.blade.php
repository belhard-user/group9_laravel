@extends('layouts.app')


@section('content')
    <form action="" method="post">
        {{ csrf_field() }}
        <input type="text" name="title">
        <input type="text" name="msg">
        <button>click</button>
    </form>
@stop