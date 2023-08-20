<?php

// helper functions
function view($response, $template, $data = [])
{
    return app()->getContainer()->get('view')->render($response, $template, $data);
}

function render_string($response, $string, $data = [])
{
    $str = app()->getContainer()->get('view')->fetchFromString($string, $data);
    $response->getBody()->write($str);
    return $response;
}

function json($data)
{
    return '<pre>' . json_encode($data, JSON_PRETTY_PRINT) . '</pre>';
}

function base_path($path = '')
{
    return  __DIR__ . "/../{$path}";
}
