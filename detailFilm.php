<!-- <!DOCTYPE html> -->
<!doctype html>
<html lang="en">

<head>
    <title> Intro PDO Cinema </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- for mobile first -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <?php
    //importer tous les classes 
    spl_autoload_register(function ($class_name) {
        require_once $class_name . '.php';
    });
    //get connection 
    $cn = new Connection();
    $db = $cn->getDb();

    $id = isset($_GET["id"]) ? $_GET["id"] : "";

    try {
        //get list des film requet utilisant PDO
        $filmStatement = $db->prepare("SELECT titre , YEAR(DATE) as year , note ,  concat(p.nom,' ',p.prenom) AS realisateur , TIME_FORMAT(SEC_TO_TIME(f.duree*60),'%h:%i') as dtime FROM  film f
                                                                                INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur 
                                                                                INNER JOIN personne p ON p.id_personne = r.id_personne
                                                                                where id_film = :id");
        $filmStatement->execute(["id" => $id]);
        $film = $filmStatement->fetch();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    if (!isset($film) || empty($film)) {
    ?>
        <h1>Film Details Not Found! ...</h1>


    <?php
    } else {

    ?>

        <div class='divclass'>
            <h1> Intro PDO Cinema</h1>
            <div class='divclass'>

                <div class="card">
                    <div class="card-header">
                        <div class="coeur">
                            <a href="http://">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-text">
                        <h1>Article 1</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem blanditiis quibusdam possimus! Porro, nulla voluptatem?</p>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>