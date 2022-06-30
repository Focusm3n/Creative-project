@extends('layouts.main')

@section('title', 'Объявления')

@section('content')
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Содержание</th>
            <th scope="col">Кол-во лайков</th>
            <th scope="col">image</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->likes }}</td>
                <td>{{ $post->image }}</td>
            </tr>
        </tbody>
    </table>
    <div>
        <a href="{{ route('post.index') }}">Back</a>
    </div>
    <div>
        <a href="{{ route('post.edit', $post->id) }}">Edit</a>
    </div>
    <div>
        <form action="{{ route('post.destroy', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Delete" class="btn btn-danger">
        </form>
    </div>
@endsection
