<?php ob_start(); ?>


<div class='divclass'>
    <table class='table table-bordered table-striped table-hover'>
        <thead class=thead-dark'>
            <tr calss='bg-info'>
                <td class='table-danger' colspan=4></td>
            <tr>
                <th scope='col'>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // or utiliser $cinemaStatement->fetchAll() as $film
            foreach ($rolesList  as $role) {
            ?>
                <tr>
                    <td><?= $role["nom"] ?>
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
$titre = "liste des Roles";
$titre_secondaire = "titre secondaire listRoles php page";
//end par , ob_get_clean  pour mettre le contenue de la page dans contenu et le paser en parameter pour template 
$contenu = ob_get_clean();
//require qui va passer le contenue  comme parametre a template        
require "view/template.php";
?>