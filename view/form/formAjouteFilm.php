<?php ob_start() ?>
<form action="index.php?action=ajouteFilm" method="POST">
    <!-- <input type="text" class="form-control"  name="action" value="ajoutActeur" readonly hidden> -->
    <div class="form-group">
        <label for="titreInput">Titre</label>
        <input type="text" class="form-control" id="titreInput" placeholder="Titre" name="titre" required>
    </div>

    <div class="form-group">
        <label for="dateInput">Date Sortie</label>
        <input type="date" class="form-control" id="dateInput" name="date_sortie" required>
    </div>
    <div class="form-group">
        <label for="dureeInput">Duree</label>
        <input type="number_format" class="form-control" id="dureeInput" name="duree" required>
    </div>
    <div class="form-group">
        <label for="synopsisInput">Resume</label>
        <input type="text" class="form-control" id="synopsisInput" placeholder="Synopsis" name="synopsis" required>
    </div>

    <div class="form-group">
        <label for="afficheInput">Affiche</label>
        <input type="text" class="form-control" id="afficheInput" placeholder="Url Path" name="affiche" required>
    </div>

    <div class="form-group">
        <label for="noteInput">Note</label>
        <input type="number_format" class="form-control" id="noteInput" placeholder="0-5" name="note" required>
    </div>

    <div class="form-group">
        <label for="sel1">Realisateur:</label>
        <select class="form-control" id="sel1" name="realisateur">
            <?php
            foreach ($realisateursList as $realisateur) { ?>
                <option value='<?= $realisateur["id_realisateur"] ?>'><?= $realisateur["realisateur"] ?></option>
            <?php } ?>
        </select>
    </div>


    <ul class="list-group">
        <label for="selGenre">Genres List:</label>

        <?php
        foreach ($genresList as $genre) { ?>
            <li class="list-group-item m-0 ">
                <input type="checkbox" id='<?= $genre["id_genre"] ?>' name='Genre<?= $genre["id_genre"] ?>' value='<?= $genre["id_genre"] ?>' class=" ml-4">
                <label><?= $genre["type"] ?></label>
            </li>
            <!-- name="genres[]" -->

        <?php  } ?>



    </ul>



    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
<?php

$titre = "ajouter film";
$titre_secondaire = "ajouter film formAjoutefilm page";


$class = $_SESSION['class'];
$message = $_SESSION['returnmsg'];
$contenu = ob_get_clean();
require "view/template.php";
?>