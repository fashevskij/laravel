@extends('layouts.layout')

@section('title')@parent {{$title}} @endsection

@section('header')
    {{--@parent возвращает содержимое секции--}}
    @parent
@endsection
@section('content')
    @if(session('error'))
    <div class="alert">
        {{session('error')}}
    </div>
    @endif
    <div class="container">
        <p>Авторизация</p>
        <form method="post" action="{{route('login.store')}}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-dark">Send</button>
        </form>
    </div>

@endsection
