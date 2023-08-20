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

function throw_when(bool $fails, string $message, string $exception = Exception::class)
{
    if (!$fails) return;

    throw new $exception($message);
}

function env($key, $default = false)
{
    $value = getenv($key);
    throw_when(!$value and !$default, "{$key} is not a defined .env variable and has not default value");
    return $value or $default;
}
