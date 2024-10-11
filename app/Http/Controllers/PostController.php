<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function home()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('home', ['posts' => $posts]);
    }

    public function post(Request $request)
    {
        $request->validate([
            'texto' => 'required|string',
            'ip_address' => 'required|ip'
        ]);
        Post::create([
            'texto' => $request['texto'],
            'ip_address' => $request['ip_address'],
        ]);

        return redirect()->to('/')->with('success', 'Publicación creada con éxito');
    }

    public function likePost(Post $post)
    {
        $post->likes++;
        $post->save();

        return redirect()->to('/');
    }
}
