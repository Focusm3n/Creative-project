<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts', compact('posts'));
    }

    public function create(){
        $postsArr = [
            [
                'title' => 'title of post from phpstorm',
                'content' => 'some interesting content',
                'image' => 'imajeblabla.png',
                'likes' => 30,
                'is_published' => 1,
            ],
            [
                'title' => 'another title of post ',
                'content' => 'another interesting content',
                'image' => 'another imajeblabla.png',
                'likes' => 50,
                'is_published' => 1,
            ],
        ];

        foreach ($postsArr as $item)
        {
            dump($item);
            Post::create($item);
        }


        dd('created');
    }

    public function update(){
        $post = Post::find(10);

        $post->update([
            'title' => 'updated ',
            'content' => 'updated',
            'image' => 'updated',
            'likes' => 500,
            'is_published' => 1,
        ]);
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
