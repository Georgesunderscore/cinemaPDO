<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/style.css">
    <title><?= $titre ?></title>
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
    <div id="contenu_container"><?= $contenu ?></div>
</body>

</html>