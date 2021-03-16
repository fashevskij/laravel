
@extends('layouts.layout')

@section('title')@parent {{$title}} @endsection

@section('header')
    {{--@parent возвращает содержимое секции--}}
    @parent
@endsection
@section('content')



    <div class="container mt-4">

        @include('layouts.errors')

    <form method="post" action="{{ route('posts.store') }}">
        @csrf
        <div class="form-group mt-3">
            <label for="title">title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
        </div>
        <div class="form-group mt-3">
            <label for="rubric_id">rubric</label>
            <select class="form-control" id="rubric_id" name="rubric_id" >
                <option>select rubric</option>
                @foreach($rubrics as $key => $value)
                    <option value="{{$key}}"

                            @if(old('rubric_id') == $key)
                                selected
                                @endif

                    >{{$value}}</option>
                @endforeach

            </select>
        </div>

        <div class="form-group mt-3">
            <label for="content">content</label>
            <textarea class="form-control" id="content" rows="3" name="content" ></textarea>
        </div>
        <button type="submit" class="btn btn-dark mt-3">send</button>
    </form>
    </div>
@endsection
