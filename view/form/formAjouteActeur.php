<?php ob_start() ?>
<form action="index.php?action=ajouteActeur" method="POST">
    <!-- <input type="text" class="form-control"  name="action" value="ajoutActeur" readonly hidden> -->
    <div class="form-group">
        <label for="nomInput">nom d'acteur</label>
        <input type="text" class="form-control" id="nomInput" placeholder="Entrer Nom" name="nom" required>
    </div>
    <div class="form-group">
        <label for="prenomInput">Prenom d'acteur</label>
        <input type="text" class="form-control" id="prenomInput" placeholder="Entrer Prenom" name='prenom' required>
    </div>
    <div class="form-group">
        <label for="dateInput">date de naissance</label>
        <input type="date" class="form-control" id="dateInput" name="date_naissance" required>
    </div>
    <div class="form-group">
        <label for="select">Choisissez le sexe</label>
        <select id="select" class="form-select" name="sexe" required>
            <option value="">select...</option>
            <option value="M">Homme</option>
            <option value="F">Femme</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
<?php

$titre = "ajouter acteur";
$titre_secondaire = "ajouter acteur formAjouteActeur page";
$contenu = ob_get_clean();
require "view/template.php";
?>