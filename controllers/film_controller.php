<?php

require_once __DIR__ . '/../views/layout/header.php';
if (isset($_GET['id'])) {
    showThisFilm($baseUrl, $_GET['id']);
} else {
    showFilms($baseUrl);
}
require_once __DIR__ . '/../views/layout/footer.php';

function showThisFilm($baseUrl, $id){
    
}
function showFilms($baseUrl) {

}
