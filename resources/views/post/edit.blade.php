@extends('layouts.main')

@section('title', 'Объявления')

@section('content')
    <div>
        <form action="{{ route('post.update', $post->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content" placeholder="Content">{{ $post->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">image</label>
                <input type="text" class="form-control" name="image" id="image" placeholder="image" value="{{ $post->image }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
