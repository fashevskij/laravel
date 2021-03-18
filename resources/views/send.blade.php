@extends('layouts.layout')

@section('title')@parent {{$title}} @endsection

@section('header')
    {{--@parent возвращает содержимое секции--}}
    @parent
@endsection
@section('content')

    <div class="container">
        <p>Форма отправки сообщений на имейл</p>
        <form method="post" action="{{route('send')}}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="text">Text</label>
                <textarea class="form-control" id="text" rows="3" name="text"></textarea>
            </div>
            <button type="submit" class="btn btn-dark">send</button>
        </form>
    </div>

@endsection
