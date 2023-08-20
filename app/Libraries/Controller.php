<?php

namespace App\Libraries;

class Controller
{
    public function model($model)
    {
        $namespace = '\\App\\Models\\';
        $class = $namespace . $model;
        // dumpe($class);
        return new $class();
    }

    public function view($response, $template, $data = [])
    {
        $blade = app()->getContainer()->get('view');
        $response->getBody()->write($blade->make($template, $data)->render());
        return $response;
    }

    public function validator($data)
    {
        return new \App\Libraries\Validation($data);
    }
}
