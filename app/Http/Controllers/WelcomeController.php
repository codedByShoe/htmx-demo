<?php

namespace App\Http\Controllers;

class WelcomeController
{
    public function index($response)
    {
        return view($response, 'index.twig');
    }

    public function test($response, $name)
    {
        $templateStr = '<p> Hi, Your name is {{ name }}.</p>';
        return render_string($response, $templateStr, ['name' => $name]);
    }

    public function api($response, $name)
    {
        $data = ['name' => $name];
        $response->getBody()->write(json($data));
        return $response;
    }
}
