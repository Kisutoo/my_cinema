<?php

use Controller\CinemaController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();
$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])){
    switch ($_GET["action"]) {

        default : $ctrlCinema->main(); break;
        case "listFilms" : $ctrlCinema->listFilms(); break;
        case "listActors" : $ctrlCinema->listActors(); break;
        case "detailFilm" : $ctrlCinema->detailFilm($id); break;
        case "detailActor" : $ctrlCinema->detActor($id); break;
        case "listGenre" : $ctrlCinema->listGenre(); break;
        case "detailGenre" : $ctrlCinema->detailGenre($id); break;
        case "listReal" : $ctrlCinema->listReal(); break;
        case "detailReal" : $ctrlCinema->detailReal($id); break;
        case "main" : $ctrlCinema->main(); break;
        case "addFilmForm" : $ctrlCinema->addFilmForm($id); break;
        case "addFilm" : $ctrlCinema->addFilm($id); break;
        case "addGenreForm" : $ctrlCinema->addGenreForm($id); break;
        case "addGenre" : $ctrlCinema->addGenre(); break;
        case "delGenre" : $ctrlCinema->delGenre($id); break;
        case "delFilm" : $ctrlCinema->delFilm($id); break;
    }   
}