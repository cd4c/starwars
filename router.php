<?php
require_once __DIR__ . '/controllers/session_controller.php';
// antes de llamar al router quito la parte de la url que no me interesa
$carpetaProyecto = '/starwars';
$request = str_replace($carpetaProyecto, '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

switch ($request) {
    case '/':
        require_once __DIR__ . '/controllers/home_controller.php';
        break;
    case '/planetas':
        require_once __DIR__ . '/controllers/planet_controller.php';
        break;
    case '/personajes':
        require_once __DIR__ . '/controllers/people_controller.php';
        break;
    case '/peliculas':
        require_once __DIR__ . '/controllers/film_controller.php';
        break;
    case '/vacaciones':
        require_once __DIR__ . '/controllers/vacations_controller.php';
        break;
    default:
        http_response_code(404);
        /* require __DIR__ . '/views/404.php'; */
        break;
}