@extends('layouts.app')
@section('title', 'Статьи')
@section('content')
    @foreach($articles as $article)
        <h3>{{ $article->name }}</h3>
        <p>{{ $article->body }}</p>
    @endforeach
    <p>Тут будут статьи</p>
    <a href="/about">About</a>
    <a href="/articles">Articles</a>
@endsection

