<?php   
    use Controller\CinemaController;
    use Model\Connect;

    spl_autoload_register(function ($class_name) {
        require_once $class_name . '.php';
    });
            $_GET['action'] = 'listFilms';

            $ctrlCinema = new CinemaController();

            $id = (isset($_GET["id"])) ? $_GET["id"] : null;

            if(isset($_GET["action"])){
                switch ($_GET["action"]){
                    case "listFilms" : $ctrlCinema->listFilms();break;
                    //case "ListActeurs" : $ctrlCinema->listActeur(); break;
                }
            }

    ?>
