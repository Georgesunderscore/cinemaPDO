<?php   
    use Controller\CinemaController;
    // use Model\Connect;

    spl_autoload_register(function ($class_name) {
        require_once $class_name . '.php';
    });
            //$_GET['action'] = 'listFilms';

            $ctrlCinema = new CinemaController();

            $id = (isset($_GET["id"])) ? $_GET["id"] : null;
            
            if(isset($_GET["action"])){
                switch ($_GET["action"]){
                    case "listFilms" : $ctrlCinema->listFilms();
                    unset($_GET['action']);
                    break;
                    //case "ListActeurs" : $ctrlCinema->listActeur(); break;
                }
            }
            //by default get list of films 
            else $ctrlCinema->listFilms();


    ?>
