<?php

use Controller\CinemaController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();
$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])){
    switch ($_GET["action"]) {

        case "listFilms" : $ctrlCinema->listFilms(); break;
        case "listActors" : $ctrlCinema->listActors(); break;
        case "detailFilm" : $ctrlCinema->detailFilm($id); break;
        case "detailActor" : $ctrlCinema->detActor($id); break;
        case "listGenre" : $ctrlCinema->listGenre(); break;
        case "detailGenre" : $ctrlCinema->detailGenre($id); break;
        case "listReal" : $ctrlCinema->listReal(); break;
        case "detailReal" : $ctrlCinema->detailReal($id); break;
        case "main" : $ctrlCinema->main(); break;
    }
}