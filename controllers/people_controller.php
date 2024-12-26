<?php

require_once __DIR__ . '/../views/layout/header.php';
if (isset($_GET['id'])) {
    showThisPerson($baseUrl, $_GET['id']);
} else {
    showPeople($baseUrl);
}
require_once __DIR__ . '/../views/layout/footer.php';

function showPeople($baseUrl) {
    $page = $_GET['page'] ?? 1;
    $url = $baseUrl . 'people/?page=' . $page;
    $data = apiCall($url) ?? apiCall($baseUrl . 'people/?page=1');
    
    require_once __DIR__ . '/../views/component/people/people_grid.php';
}

function showThisPerson($baseUrl, $id)
{
    $url = $baseUrl . 'people/' . $id;
    
    if(isset($_GET['wokie'])){
        $people = apiCall($url . '?format=wookiee') ?? apiCall($baseUrl . 'people/1/?format=wookiee');
        $people = traducirDelWoke('people', $people);
    } else{
        $people = apiCall($url) ?? apiCall($baseUrl . 'people/1');
    }
    $person = getPersonDetails($people);

    require_once __DIR__ . '/../views/component/people/people.php';
}

function getPersonDetails($people){
    $films = [];
    $species = [];
    $vehicles = [];
    $starships = [];
    if(isset($_GET['wokie'])){
        $homeworldId = basename(rtrim($people['homeworld'], '/'));
        $homeworld = 'Algo en wookiee';
    }else {
        $homeworldData = apiCall($people['homeworld']);
        $homeworldId = basename(rtrim($people['homeworld'], '/'));
        $homeworld = $homeworldData['name'];
    }
    foreach ($people['films'] as $filmUrl) {
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

    foreach ($people['species'] as $specieUrl) {
        $specieId = basename(rtrim($specieUrl, '/'));
        $specieData = apiCall($specieUrl);
        if (isset($specieData['name'])) {
            $species[] = [
                'id' => $specieId,
                'name' => $specieData['name'],
                'classification' => $specieData['classification'],
                'average_lifespan' => $specieData['average_lifespan']
            ];
        } else {
            $species[] = [
                'id' => $specieId,
                'name' => "Nombre desconocido",
                'classificaation' => 'algo será...',
                'average_lifespan' => '???',
            ];
        }
    }

    foreach ($people['vehicles'] as $vehicleUrl) {
        $vehicleId = basename(rtrim($vehicleUrl, '/'));
        $vehicleData = apiCall($vehicleUrl);
        if (isset($vehicleData['name'])) {
            $vehicles[] = [
                'id' => $vehicleId,
                'name' => $vehicleData['name'],
                'model' => $vehicleData['model'],
                'vehicle_class' => $vehicleData['vehicle_class']
            ];
        } else {
            $vehicles[] = [
                'id' => $vehicleId,
                'name' => "Nombre desconocido",
                'model' => 'algo será...',
                'vehicle_class' => '???',
            ];
        }
    }

    foreach ($people['starships'] as $starshipUrl) {
        $starshipId = basename(rtrim($starshipUrl, '/'));
        $starshipData = apiCall($starshipUrl);
        if (isset($starshipData['name'])) {
            $starships[] = [
                'id' => $starshipId,
                'name' => $starshipData['name'],
                'model' => $starshipData['model'],
                'starship_class' => $starshipData['starship_class']
            ];
        } else {
            $starships[] = [
                'id' => $starshipId,
                'name' => "Nombre desconocido",
                'model' => 'algo será...',
                'starship_class' => '???',
            ];
        }
    }

    return [
        'films' => $films,
        'species' => $species,
        'vehicles'=> $vehicles,
        'starships'=> $starships,
        'homeworld' => $homeworld,
        'homeworldId' => $homeworldId,
    ];
}