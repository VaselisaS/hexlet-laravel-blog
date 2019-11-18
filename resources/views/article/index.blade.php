@extends('layouts.app')

@section('content')
    <h1>Список статей</h1>
    {{Form::open(['url' => route('articles.index'), 'method' => 'GET'])}}
        {{Form::text('q', $q)}}
        {{Form::submit('Поиск')}}
    {{Form::close()}}
    @foreach($articles as $article)
        <h2><a href="{{route('articles.show', $article)}}">{{$article->name}}</a></h2>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
@endsection

