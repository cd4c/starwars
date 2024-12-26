<?php
$baseUrl = 'https://swapi.py4e.com/api/'; // original = https://swapi.dev/api/

function apiCall($url)
{
    $response = @file_get_contents($url);
    return json_decode(
        $response,
        true
    );
}
