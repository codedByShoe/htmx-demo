<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class WelcomeController
{
    public function index(Request $req, Response $res, $args)
    {
        return view($res, 'index.twig');
    }

    public function test(Request $req, Response $res, $args)
    {
        $name = $args['name'];
        $templateStr = '<p> Hi, Your name is {{ name }}.</p>';
        return render_string($res, $templateStr, ['name' => $name]);
    }

    public function api(Request $req, Response $res, $args)
    {
        $name = $args['name'];
        $data = ['name' => $name];
        $res->getBody()->write(json($data));
        return $res;
    }
}
