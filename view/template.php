<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $titre ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- for mobile first -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/sass/style2.css">

</head>


<body>




    <header>
        <div>
            <h1>Intro PDO CINEMA</h1>
            <a href="index.php?action=listFilms"></a>
        </div>


        <div class="topnav">
            <a href="index.php?action=listFilms">List des Films</a>
            <a href="index.php?action=listActeurs">List des Acteurs</a>
            <a href="index.php?action=listRealisateurs">List des Realisateurs</a>
            <a href="index.php?action=listGenres">List des Genres</a>
            <a href="index.php?action=listRoles">List des Roles</a>
        </div>

    </header>



    <div class="topnavadmin">
        <a href="index.php?action=formAjouteActeur">+ Acteur</a>
        <a href="index.php?action=formAjouteRealisateur">+ Realisateur</a>
        <a href="index.php?action=formAjouteFilm">+ Film</a>
        <a href="index.php?action=formAjouteCasting">+ Casting</a>
        <a href="index.php?action=formAjouteGenre">+ Genre</a>
        <a href="index.php?action=formAjouteRole">+ Role</a>
    </div>



    <!-- pour faire visioner le continu de la page listfilm passer en parameter avec required en template  -->
    <div id="maincontainer">
        <h2><?= $titre_secondaire ?></h2>
        <?= $contenu ?>

        <span class='trans   <?= $class ?>'><?= $message ?> </span>
    </div>

    <script type="text/javascript" src="./public/js/main.js"></script>


</body>

</html>