
<?php

use Controller\CinemaController;

//autocharge les classes du projet 
spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});
//$_GET['action'] = 'listFilms';

$ctrlCinema = new CinemaController();


$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if (isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "listFilms":
            $ctrlCinema->listFilms();
            unset($_GET['action']);
            break;

        case "detailFilm":
            $ctrlCinema->detailFilm($id);
            unset($_GET['action']);
            break;

        case "listActeurs":
            $ctrlCinema->listActeurs();
            break;

        case "detailActeur":
            $ctrlCinema->detailActeur($id);
            unset($_GET['action']);
            break;

        case "listRealisateurs":
            $ctrlCinema->listRealisateur();
            break;

        case "detailRealisateur":
            $ctrlCinema->detailRealisateur($id);
            unset($_GET['action']);
            break;
    }
}
//index page par default get list of films 
else $ctrlCinema->listFilms();
