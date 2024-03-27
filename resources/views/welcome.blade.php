<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>trade</title>
    <script src="{{ mix('js/app.js') }}"></script>
<link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<p><b>Trade data:</b> <span id="trade-data"></span></p>
</body>


<script>
Echo.channel('trade').listen('NewTrade', (e) => {
    console.log(e.trade);
    document.getElementById('trade-data').innerHTML = e.trade;
});
</script>
</html>
