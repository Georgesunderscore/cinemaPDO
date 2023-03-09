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
                    <p>Note :
                        <?php
                        $note = $film['note'];
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $note) {
                        ?>
                                <i class="fa-solid fa-star"></i>
                            <?php
                            } else {
                            ?>
                                <i class="fa-regular fa-star"></i>
                        <?php
                            }
                        }
                        ?>
                    </p>



                </div>
                <div class="card-text scroll">
                    <h1>Casting</h1>
                    <?php
                    // or utiliser $cinemaStatement->fetchAll() as $film
                    foreach ($castingsList as $cast) {
                    ?>
                        <p><?= $cast['acteur'] ?> (<?= $cast['nom'] ?>)</p>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
}

$titre = "film Detail";
$titre_secondaire = "Film Details";


$class = $_SESSION['class'];
$message = $_SESSION['returnmsg'];
//end par , ob_get_clean  pour mettre le contenue de la page dans contenu et le paser en parameter pour template 
$contenu = ob_get_clean();
//require qui va passer le contenue  comme parametre a template        
require "view/template.php";
?>