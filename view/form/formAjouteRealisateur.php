<?php ob_start() ?>
<form action="index.php?action=ajouteRealisateur" method="POST">
    <!-- <input type="text" class="form-control"  name="action" value="ajoutActeur" readonly hidden> -->
    <div class="form-group">
        <label for="nomInput">nom de réalisateur</label>
        <input type="text" class="form-control" id="nomInput" placeholder="Nom" name="nom" required>
    </div>
    <div class="form-group">
        <label for="prenomInput">Prenom de réalisateur</label>
        <input type="text" class="form-control" id="prenomInput" placeholder="Prenom" name='prenom' required>
    </div>
    <div class="form-group">
        <label for="dateInput">Date De Naissance</label>
        <input type="date" class="form-control" id="dateInput" name="date_naissance" required>
    </div>
    <div class="form-group">
        <label for="select">Choisissez le sexe</label>
        <select id="select" name="sexe" class="form-select"  required>
            <option value="">select...</option>
            <option value="M">Homme</option>
            <option value="F">Femme</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
<?php

$titre = "ajouter acteur";
$titre_secondaire = "ajouter realisateur formAjouteRealisateur page";
$contenu = ob_get_clean();
require "view/template.php";
?>