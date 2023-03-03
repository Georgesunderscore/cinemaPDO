


<?php ob_start(); ?>

<p class="uk-label">Il y a <?= $cinemaStatement->rowCount() ?> films</p>


<div class='divclass'>
            <table class='table table-bordered table-striped table-hover'>
                <thead class=thead-dark'>
                    <tr calss='bg-info'>
                        <td class='table-danger' colspan=4>Intro PDO Cinema listFilmphp page</td>
                    <tr>
                        <th scope='col'>Titre</th>
                        <th scope='col'>Année Sortie</th>
                        <th scope='col'>Realisateur</th>
                        <th scope='col'>Durée</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // or utiliser $cinemaStatement->fetchAll() as $film
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
            $titre = "liste des films";
            $titre_secondaire = "Intro PDO Cinema";
            //end par , ob_get_clean  pour mettre le contenue de la page dans contenu et le paser en parameter pour template 
            $contenu = ob_get_clean();
            //require qui va passer le contenue  comme parametre a template        
            require "view/template.php";
        ?>
    </body>
</html>