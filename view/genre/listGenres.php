<?php ob_start(); ?>


<div class='divclass'>
    <table class='table table-bordered table-striped table-hover'>
        <thead class=thead-dark'>
            <tr calss='bg-info'>
                <td class='table-danger' colspan=4></td>
            <tr>
                <th scope='col'>Genre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // or utiliser $cinemaStatement->fetchAll() as $film
            foreach ($genresList  as $genre) {
            ?>
                <tr>
                    <td><?= $genre["type"] ?>
                        <!-- <a href="index.php?action=&id=">
                            <i class="fa-solid fa-circle-info"></i>
                        </a> -->
                    </td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php
$titre = "liste des Genres";
$titre_secondaire = "titre secondaire listGenres php page";


$class = $_SESSION['class'];
$message = $_SESSION['returnmsg'];
//end par , ob_get_clean  pour mettre le contenue de la page dans contenu et le paser en parameter pour template 
$contenu = ob_get_clean();
//require qui va passer le contenue  comme parametre a template        
require "view/template.php";
?>