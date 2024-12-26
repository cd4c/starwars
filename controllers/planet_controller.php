<?php

require_once __DIR__ . '/../views/layout/header.php';
if (isset($_GET['id'])) {
    showThisPlanet($baseUrl, $_GET['id']);
} else {
    showPlanets($baseUrl);
}
require_once __DIR__ . '/../views/layout/footer.php';


function showPlanets($baseUrl)
{
    $page = $_GET['page'] ?? 1;
    $url = $baseUrl . 'planets/?page=' . $page;
    $data = apiCall($url) ?? apiCall($baseUrl . 'planets/?page=1');

    require_once __DIR__ . '/../views/component/planet/planet_grid.php';
}

function showThisPlanet($baseUrl, $id)
{
    $url = $baseUrl . 'planets/' . $id;
    $planet = apiCall($url) ?? apiCall($baseUrl . 'planets/1');
    $planetDetails = getPlanetDetails($planet);

    require_once __DIR__ . '/../views/component/planet/planet.php';
}

function getPlanetDetails($planet)
{
    $residents = [];
    $films = [];

    foreach ($planet['residents'] as $residentUrl) {
        $residentId = basename(rtrim($residentUrl, '/'));
        $residentData = apiCall($residentUrl);
        if (isset($residentData['name'])) {
            $residents[] = [
                'id' => $residentId,
                'name' => $residentData['name']
            ];
        } else {
            $residents[] = [
                'id' => $residentId,
                'name' => "Desconocido"
            ];
        }
    }

    foreach ($planet['films'] as $filmUrl) {
        $filmId = basename(rtrim($filmUrl, '/'));
        $filmData = apiCall($filmUrl);
        if (isset($filmData['title'])) {
            $films[] = [
                'id' => $filmId,
                'title' => $filmData['title']
            ];
        } else {
            $films[] = [
                'id' => $filmId,
                'title' => "Título desconocido"
            ];
        }
    }

    return [
        'residents' => $residents,
        'films' => $films,
    ];
}   