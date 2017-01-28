@if(session()->has('notify'))
    <p id="message-box" class="alert alert-{{ session('notify.type') }}">{{ session('notify.message') }}</p>

    <script>
        var messageBox = document.getElementById('message-box');

        setTimeout(function(){
            messageBox.remove();
        }, 3000)

    </script>
@endif