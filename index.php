<?php   
    use Controller\CinemaController;

    spl_autoload_register(function ($class_name) {
        require_once $class_name . '.php';
});
?>
<!-- <!DOCTYPE html> -->
<!doctype html>
<html lang="en">

<head>
    <title> Intro PDO Cinema inex</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- for mobile first -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./public/css/style.css">
</head>
<body>
<!-- <header>
        <div>
            <a href="index.php?action=listFilms">
                <h1>CINEMA index page</h1>
            </a>
        </div>
        
    <ul>
        <li><a class="nav_link" href="index.php?action=listFilms">Films</a></li>
    </ul>

    </header> -->

    <?php   
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
<!-- mettre le template dans index  -->

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>