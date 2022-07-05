<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
//        $category = Category::find(1);
//        $post = Post::find(1);
        $post = Post::find(1);
        $tag = Tag::find(1);
        dd($tag->posts);
//        dd($category->posts);

//        return view('post.index', compact('posts'));
    }

    public function create(){
       return view('post.create');
    }

    public function store() {
        $data = \request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post) {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post) {
        return view('post.edit', compact('post'));
    }
    public function update(Post $post){
        $data = \request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function delete(){
        for ($i = 1; $i < 10; $i++) {
            $post = Post::find($i);
            $post->delete();
        }
            dd('deleted');
    }

    public function firstOrCreate(){
        $anotherPost = [
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'some updated',
            'likes' => 5000,
            'is_published' => 1,
        ];

        $post = Post::firstOrCreate([
            'title' => ''
        ],[
            'title' => 'another',
            'content' => 'some content',
            'image' => 'some updated',
            'likes' => 50,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('finished');
    }
}
