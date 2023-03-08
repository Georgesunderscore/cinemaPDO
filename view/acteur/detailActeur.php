<?php ob_start();

if (!isset($acteur) || empty($acteur)) {
?>
    <h1>Acteur Details Not Found! ...</h1>


<?php
} else {

?>

    <div class='divclass'>
        <h1></h1>
        <div class='divclass'>
            <div class="card">
                <div class="card-header">
                    <h1><?= $acteur['acteur'] ?></h1>
                    <p>Sexe : <?= $acteur['sexe'] == 'M' ? 'Male' : 'Female' ?></p>
                    <p>Date de naissance : <?= Date_format(new DateTime($acteur['date_de_naissance']), "d/m/Y");  ?></p>
                </div>
                <div class="card-text scroll">
                    <h1>Filmographie</h1>
                    <?php
                    foreach ($acteurFilmsList as $film) {
                    ?>
                        <p><?= $film['titre'] ?></p>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
}

$titre = "Acteur Details";
$titre_secondaire = "Acteur Details";
//end par , ob_get_clean  pour mettre le contenue de la page dans contenu et le paser en parameter pour template 
$contenu = ob_get_clean();
//require qui va passer le contenue  comme parametre a template        
require "view/template.php";
?>