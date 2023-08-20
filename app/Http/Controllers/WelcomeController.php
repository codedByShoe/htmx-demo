<?php

namespace App\Http\Controllers;

use App\Libraries\Controller;
use App\Models\Post;

class WelcomeController extends Controller
{
    public $postModel;
    public function __construct()
    {
        $this->postModel = $this->model('Post');
    }

    public function index($response)
    {
        return $this->view($response, 'index');
    }

    public function test($request)
    {
        $inputs = $request->getParsedBody();
        $validator = $this->validator($inputs)->validateFields();

        if ($validator->isValid()) {
            dumpe('validated');
        } else {
            dumpe($validator->errors());
        }
    }

    public function show($response, Post $post)
    {
        $posts = $this->postModel->getPosts();
        return $this->view($response, 'partials.posts', compact('posts'));
    }

    public function api($response, $name)
    {
        $data = ['name' => $name];
        $response->getBody()->write(json($data));
        return $response;
    }
}
