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

    public function test($response, $request)
    {
        $inputs = $request->getParsedBody();
        $validator = $this->validator($inputs)->validateFields();

        if (!$validator->isValid()) {
            $errors = $validator->errors();
            $nameFieldError = $errors['name'][0];
            $emailFieldError = $errors['email'][0];
            return $this->view($response, 'partials.form-errors', [
                'name' => $nameFieldError,
                'email' => $emailFieldError
            ]);
        }
        return $response->withHeader('HX-Redirect', '/')->withStatus(200);
    }

    public function show($response)
    {
        $posts = $this->postModel->getPosts();
        return $this->view($response, 'partials.posts', compact('posts'));
    }

    public function search($response, $request)
    {
        $inputs = $request->getParsedBody();
        $search = $inputs['search'];
        $posts = $this->postModel->searchByAuthor($search);
        return $this->view($response, 'partials.posts', compact('posts'));
    }

    public function api($response, $name)
    {
        $data = ['name' => $name];
        $response->getBody()->write(json($data));
        return $response;
    }
}
