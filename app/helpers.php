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

function flash()
{
    echo 'flash';
}

// This is the default function that blade calls from the @csrf directive
// This is the easiest way to wire it into the slim/csrf package
function csrf_field()
{
    $csrf = app()->getContainer()->get('csrf');
    $csrfNameKey = $csrf->getTokenNameKey();
    $csrfValueKey = $csrf->getTokenValueKey();
    $csrfName = $csrf->getTokenName();
    $csrfValue = $csrf->getTokenValue();

    $inputs = "
        <input type=\"hidden\" name=\"{$csrfNameKey}\" value=\"{$csrfName}\"/>
        <input type=\"hidden\" name=\"{$csrfValueKey}\" value=\"{$csrfValue}\"/>
        ";
    return $inputs;
}
