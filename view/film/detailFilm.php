<?php ob_start();

if (!isset($film) || empty($film)) {
?>
    <h1>Film Details Not Found! ...</h1>


<?php
} else {

?>

    <div class='divclass'>
        <h1></h1>
        <div class='divclass'>

            <div class="card">
                <div class="card-header">
                    <h1><?= $film['titre'] ?></h1>
                    <p>Année de sortie : <?= $film['year'] ?></p>
                    <p>Réalisation : <?= $film['realisateur'] ?></p>
                    <p>Durée : <?= $film['dtime'] ?></p>
                    <p>Note : <?= $film['note'] ?> </p>
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

$titre = "film Detail";
$titre_secondaire = "";
//end par , ob_get_clean  pour mettre le contenue de la page dans contenu et le paser en parameter pour template 
$contenu = ob_get_clean();
//require qui va passer le contenue  comme parametre a template        
require "view/template.php";
?>