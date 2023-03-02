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
    try {
        $db = new PDO(
            'mysql:host=localhost;dbname=cinemageorges;charset=utf8',
            'root',
            '',
            //pour activer les erreurs
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    try {
        //get list des film requet utilisant PDO
        $cinemaStatement = $db->query("SELECT id_film, titre , YEAR(DATE) as year ,  concat(p.nom,' ',p.prenom) AS realisateur , TIME_FORMAT(SEC_TO_TIME(f.duree*60),'%h:%i') as dtime FROM  film f
                                                                                INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur 
                                                                                INNER JOIN personne p ON p.id_personne = r.id_personne");
        $cinemaStatement->execute();
        $cinemaList = $cinemaStatement->fetchAll();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }





    if (!isset($cinemaList) || empty($cinemaList)) {
    ?>
        <div class='divclass'>
            <h1>Empty list ...</h1>
        </div>

    <?php
    } else {

    ?>

        <div class='divclass'>
            <table class='table table-bordered table-striped table-hover'>
                <thead class=thead-dark'>
                    <tr calss='bg-info'>
                        <td class='table-danger' colspan=4>Intro PDO Cinema</td>
                    <tr>
                        <th scope='col'>Titre</th>
                        <th scope='col'>Année Sortie</th>
                        <th scope='col'>Realisateur</th>
                        <th scope='col'>Durée</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($cinemaList as $index => $film) {
                    ?>
                        <tr>
                            <td><a href="detailFilm.php?id=<?= $film["id_film"] ?>"><?= $film["titre"] ?>
                                    <i class="fa-solid fa-circle-info"></i>
                                </a>

                            </td>
                            <td class='tdclass'> <?= $film['year'] ?> </td>
                            <td class='tdclass'> <?= $film['realisateur'] ?> </td>
                            <td class='tdclass'> <?= $film['dtime'] ?> </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>