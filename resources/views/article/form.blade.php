<div class="form-group">
    {!! Form::label('title') !!}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {!! Form::label('short description') !!}
    {{ Form::textarea('short_description', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {!! Form::label('body') !!}
    {{ Form::textarea('body', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {!! Form::label('Когда покозать') !!}
    {{ Form::date('published_at', $article->published_at , ['class' => 'form-control']) }}
</div>

<div class="form-group">
    <input type="submit" class="btn btn-primary" value="{{ $btn }}">
</div>