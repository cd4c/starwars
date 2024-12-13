<?php
function showPlanets()
{
    $baseUrl = 'https://swapi.dev/api/';
    $page = $_GET['page'] ?? 1;
    $url = $baseUrl . 'planets/?page=' . $page;
    $data = @file_get_contents($url) ?: file_get_contents($baseUrl . 'planets/?page=1');
    $planets = json_decode($data, true);

    require_once __DIR__ . '/../views/layout/header.php';
    require_once __DIR__ . '/../views/planet/planet_view.php';
    require_once __DIR__ . '/../views/layout/footer.php';
}

showPlanets();