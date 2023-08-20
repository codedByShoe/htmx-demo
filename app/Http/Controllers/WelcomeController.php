<?php

namespace App\Http\Controllers;

use App\Models\Post;

class WelcomeController
{
    public function index($response)
    {
        return view($response, 'index');
    }
    public function show($response, Post $post)
    {
        $posts = Post::get();
        return view($response, 'partials.posts', compact('posts'));
    }

    public function api($response, $name)
    {
        $data = ['name' => $name];
        $response->getBody()->write(json($data));
        return $response;
    }
}
