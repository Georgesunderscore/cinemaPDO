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
    </head>


<body>
    <header>
        <div>
            <a href="index.php?action=listFilms">
                <h1>Intro PDO CINEMA templatephp</h1>
            </a>
        </div>
        
    <ul>
        <li><a class="nav_link" href="index.php?action=listFilms">Films</a></li>
    </ul>

    </header>
   
    <h2>titre secondaire:<?= $titre_secondaire ?></h2>
    <!-- pour faire visioner le continu de la page listfilm passer en parameter avec required en template  -->
    <div id="maincontainer"><?= $contenu ?></div>
</body>

</html>