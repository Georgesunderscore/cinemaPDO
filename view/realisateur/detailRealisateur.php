<?php ob_start();

if (!isset($realisateur) || empty($realisateur)) {
?>
    <h1>Realisateur Details Not Found! ...</h1>


<?php
} else {

?>

    <div class='divclass'>
        <h1></h1>
        <div class='divclass'>
            <div class="card">
                <div class="card-header">
                    <h1><?= $realisateur['realisateur'] ?></h1>
                    <p>Sexe : <?= $realisateur['sexe'] == 'M' ? 'Male' : 'Female' ?></p>
                    <p>Date de naissance : <?= Date_format(new DateTime($realisateur['date_de_naissance']), "d/m/Y");  ?></p>
                </div>
                <div class="card-text scroll">
                    <h1>Casting</h1>
                    <?php
                    foreach ($castingsList as $cast) {
                    ?>
                        <p><?= $cast['titre'] ?></p>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
}

$titre = "Realisateur Details";
$titre_secondaire = "Realisateur Details";
//end par , ob_get_clean  pour mettre le contenue de la page dans contenu et le paser en parameter pour template 
$contenu = ob_get_clean();
//require qui va passer le contenue  comme parametre a template        
require "view/template.php";
?>