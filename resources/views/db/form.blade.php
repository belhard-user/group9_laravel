<div class="form-group">
    {!! Form::label('username') !!}
    {{ Form::text('username', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {!! Form::label('email') !!}
    {{ Form::text('email', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {!! Form::label('age') !!}
    {{ Form::text('age', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    <button class="btn">{{ $btnName }}</button>
</div>