
@extends('layouts.layout')

@section('title')@parent {{$title}} @endsection

@section('header')
    {{--@parent возвращает содержимое секции--}}
    @parent
@endsection
@section('content')

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1>{{ mb_strtoupper($title)}}</h1>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @foreach($posts as $post)
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">
                                {{$post->title}}</text></svg>
                        <div class="card-body">
                            <p class="card-text">{{$post->content}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">
                                    {{--{{$post->created_at}}--}}
                                {{--{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->calendar()}}--}}
                                {{$post->getPostDate()}}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{--вывод пагинации на страницу
                onEachSide(3) - показывает 3 до и 3 после страници!

                для того чтобы не использовать будстрап пагинацию нужно исп команду
                php artisan vendor:publish --tag=laravel-pagination
                и в папке vendor.pagination выбрать шаблон пагинации или создать свой
                --}}
                <div class="col col-md-12">
                    {{$posts->onEachSide(1)->links('vendor.pagination.bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>

@endsection('content)
