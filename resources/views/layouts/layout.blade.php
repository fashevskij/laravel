<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>@section('title') Page: @show</title>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="{{@asset('js/scripts.js')}}" ></script>



    <!-- Bootstrap core CSS -->
    <link href="{{@asset('css/styles.css')}}" rel="stylesheet" >
    <meta name="theme-color" content="#7952b3">




</head>
<body>

<header>
    @section('header')
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">Menu</h4>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contact</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{route('home')}}" class="text-white">home</a></li>
                        <li><a href="{{route('page.about')}}" class="text-white">about</a></li>
                        <li><a href="{{route('posts.create')}}" class="text-white">create</a></li>
                        <li><a href="{{route('send')}}" class="text-white">send mail</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container-fluid">
            <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                <strong>Album</strong>@php dump(\Illuminate\Support\Facades\Auth::check()) @endphp
                {{--@php dump(\Illuminate\Support\Facades\Auth::check()) @endphp - проверка через фасадсущиствует ли авторизация на сайте--}}
            </a>
           {{-- если не авторизован
            @if (!auth()->check())
                <a href="{{route('registration')}}" class="text-white">registration</a>
                <a href="{{route('login.form')}}" class="text-white">login</a>
            @else если авторизован
                <a href="#" class="text-white">{{auth()->user()->name}}</a>
                <a href="{{route('logout')}}" class="text-white">logout</a>
            @endif--}}

            @auth
                <a href="#" class="text-white">{{auth()->user()->name}}</a>
                @if(auth()->user()->avatar)
                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="" height="40px">
                @endif
                <a href="{{route('logout')}}" class="text-white">logout</a>
            @endauth

            @guest
                <a href="{{route('registration')}}" class="text-white">registration</a>
                <a href="{{route('login.form')}}" class="text-white">login</a>
            @endguest
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
    @show
</header>

<main>
    @include('layouts.errors')
    @yield('content')

</main>

@include('layouts.footer')

</body>
</html>
