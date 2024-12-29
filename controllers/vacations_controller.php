<?php

require_once __DIR__ . '/../views/layout/header.php';
searchEngine($baseUrl);
require_once __DIR__ . '/../views/layout/footer.php';

function fetchAllPlanets($baseUrl)
{
    $allPlanets = [];
    $page = 1;
    do {
        $url = $baseUrl . 'planets/?page=' . $page;
        $data = apiCall($url);

        if ($data && isset($data['results'])) {
            $allPlanets = array_merge($allPlanets, $data['results']);
            $page++;
        } else {
            $data = null;
        }
    } while (isset($data['next']));

    return $allPlanets;
}

function filterPlanets($planets, $filters)
{
    return array_filter($planets, function ($planet) use ($filters) {
        $matchesClimate = true;
        $matchesTerrain = true;
        $matchesPopulation = true;

        if (isset($filters['clima'])) {
            $planetClimates = explode(',', $planet['climate']);
            $matchesClimate = !empty(array_intersect($filters['clima'], $planetClimates));
        }

        if (isset($filters['terreno'])) {
            $planetTerrains = explode(',', $planet['terrain']);
            $matchesTerrain = !empty(array_intersect($filters['terreno'], $planetTerrains));
        }

        if (isset($filters['poblacion_min'])) {
            $population = is_numeric($planet['population']) ? (int) $planet['population'] : 0;
            $matchesPopulation = $matchesPopulation && $population >= $filters['poblacion_min'];
        }

        if (isset($filters['poblacion_max'])) {
            $population = is_numeric($planet['population']) ? (int) $planet['population'] : PHP_INT_MAX;
            $matchesPopulation = $matchesPopulation && $population <= $filters['poblacion_max'];
        }

        return $matchesClimate && $matchesTerrain && $matchesPopulation;
    });
}

// recorro todos los planetas saco sus climas y terrenos individualmente
// aplico los filtros y llamo a la funcion de filtrar planetas
// filtro los planetas con los filtros seleccionados y devuelvo solo aquellos que cumplen con las condiciones
function searchEngine($baseUrl)
{
    $planets = fetchAllPlanets($baseUrl);
    $uniqueClimates = [];
    $uniqueTerrains = [];

    foreach ($planets as $planet) {
        $climates = array_map('trim', explode(',', $planet['climate']));
        $uniqueClimates = array_merge($uniqueClimates, $climates);

        $terrains = array_map('trim', explode(',', $planet['terrain']));
        $uniqueTerrains = array_merge($uniqueTerrains, $terrains);
    }

    $uniqueClimates = array_unique($uniqueClimates);
    $uniqueTerrains = array_unique($uniqueTerrains);

    $filters = [];
    if (!empty($_GET['clima'])) {
        $filters['clima'] = array_filter($_GET['clima'], fn($climate) => !empty($climate));
    }
    if (!empty($_GET['terreno'])) {
        $filters['terreno'] = array_filter($_GET['terreno'], fn($terrain) => !empty($terrain));
    }
    if (!empty($_GET['poblacion_min']) && is_numeric($_GET['poblacion_min'])) {
        $filters['poblacion_min'] = (int) $_GET['poblacion_min'];
    }
    if (!empty($_GET['poblacion_max']) && is_numeric($_GET['poblacion_max'])) {
        $filters['poblacion_max'] = (int) $_GET['poblacion_max'];
    }

    $filteredPlanets = filterPlanets($planets, $filters);

    require_once __DIR__ . '/../views/component/vacation/vacation_search.php';
}

