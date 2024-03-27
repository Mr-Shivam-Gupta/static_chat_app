<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat App</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div id="start_chat">
        <form  id="save-name">
            <input name="name" id="name" placeholder="Enter Your Name"></input>
            <input type="submit" value="Let's Chat">
        </form>
    </div>
    <div id="chat_part">
        <form id="chat-form">
            @csrf
            <input type="hidden" name="user" id="user">
            <input type="text" name="message" id="message" placeholder="Enter Message " required>
            <input type="submit" value="Send">
        </form>
        <div id="chat_container">

        </div>
    </div>
</body>
<script src="{{asset('js/app.js')}}"></script>
<script>
    $('#chat_part').hide();
    $('#save-name').submit(function(e){
    e.preventDefault();
    $('#user').val($('#name').val());
    $('#start_chat').hide();
    $('#chat_part').show();
    });
    $('#chat-form').submit(function(e){
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: "{{ route('messages') }}",
            type: 'POST',
            data:formData,
        });
        $('#message').val('');
    });

    Echo.channel('messages').listen('MessageEvent', (e) => {
      
        let html = `<br>
        <b>`+e.user+` : </b>
        <span>`+e.message+`</span>`;
        $('#chat_container').append(html);
    })
</script>
</html>