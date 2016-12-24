@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        @foreach($names as $name)
            <button
                    type="button"
                    class="btn btn-warning ribbon"
                    onclick="location.href='{{ action('HomeController@show', ['name' => $name]) }}'"
            >{{ $name }}</button>
        @endforeach
    </div>
</div>
</div>
@endsection
