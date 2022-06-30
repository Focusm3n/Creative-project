@extends('layouts.main')

@section('title', 'Объявления')

@section('content')
    <div>
        <a href="{{ route('post.create') }}" class="btn btn-primary mb-3">Add one</a>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Содержание</th>
            <th scope="col">Кол-во лайков</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->likes }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
