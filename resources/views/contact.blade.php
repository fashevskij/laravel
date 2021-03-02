<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('contacts')}}" method="post">{{--//name - именнованый маршрут при указании на него независимо от значения url будет переход--}}
{{--  защита црф от подделок формы {{ csrf_field() }}--}}
@csrf{{-- @csrf тоже самое что и выше только короче   --}}
    @method('PUT'){{--  @method('PUT')  подмена метода c post на put --}}
    <input type="text" name="name">
    <input type="email" name="email">
    <button type="submit">send</button>
</form>

</body>
</html>
