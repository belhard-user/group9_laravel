@if($errors->any())
    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif
<form action="" method="post">
    {{ csrf_field() }}
    <input type="text" name="name">
    <input type="text" name="age">
    <button type="submit">click</button>
</form>