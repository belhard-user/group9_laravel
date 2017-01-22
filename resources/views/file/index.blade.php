<form action="" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="tumba[]" multiple>
    <button>click</button>
</form>