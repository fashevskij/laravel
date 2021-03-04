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
<h1>Cписок постов</h1>
<ul>
    <li>
        <a href="{{route('posts.show',['id'=>1])}}">post 1</a> |
        <a href="{{route('posts.edit',['id'=>1])}}">Edit 1</a> |
        <form action="{{route('posts.destroy',['id'=>1])}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">delete</button>
        </form>
    </li>
    <li>
        <a href="{{route('posts.show',['id'=>2])}}">post 2</a> |
        <a href="{{route('posts.edit',['id'=>2])}}">Edit 2</a> |
        <form action="{{route('posts.destroy',['id'=>2])}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">delete</button>
        </form>
    </li>
    <li>
        <a href="{{route('posts.show',['id'=>3])}}">post 3</a> |
        <a href="{{route('posts.edit',['id'=>3])}}">Edit 3</a> |
        <form action="{{route('posts.destroy',['id'=>3])}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">delete</button>
        </form>
    </li>
</ul>
</body>
</html>
