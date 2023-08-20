<?php

// helper functions
function view($response, $template, $data = [])
{
    $blade = app()->getContainer()->get('view');
    $response->getBody()->write($blade->make($template, $data)->render());
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

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function throw_when(bool $fails, string $message, string $exception = Exception::class)
{
    if (!$fails) return;

    throw new $exception($message);
}

// This is the default function that blade calls from the @csrf directive
// This is the easiest way to wire it into the slim/csrf package
function csrf_field()
{
    $csrf = app()->getContainer()->get('csrf');
    $csrfName = $csrf->getTokenName();
    $csrfValue = $csrf->getTokenValue();
    $csrfNameKey = $csrf->getTokenNameKey();
    $csrfValueKey = $csrf->getTokenValueKey();

    $inputs = "
        <input type=\"hidden\" name=\"{$csrfNameKey}\" value=\"{$csrfName}\"/>
        <input type=\"hidden\" name=\"{$csrfValueKey}\" value=\"{$csrfValue}\"/>
        ";
    return $inputs;
}
