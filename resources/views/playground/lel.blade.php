<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('/playgrounds') }}" method="POST">
        @csrf
        <input type="text" name="field1" id="">
        <input type="text" name="field2" id="">
        <button type="submit" class="btn btn-primary">OK</button>
    </form>
</body>
</html>