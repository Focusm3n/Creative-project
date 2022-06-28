@extends('layouts.main')

@section('title', 'Объявления')

@section('content')
    @foreach($posts as $post)

        <div>{{ $post->title }}</div>
        <div>{{ $post->content }}</div>
        <div>{{ $post->likes }}</div>
        <br>
    @endforeach
@endsection
