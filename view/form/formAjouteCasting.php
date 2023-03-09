<?php ob_start() ?>
<form action="index.php?action=ajouteCasting" method="POST">
    <!-- <input type="text" class="form-control"  name="action" value="ajoutActeur" readonly hidden> -->
    

    <div class="form-group">
        <label for="sel1">Film:</label>
        <select class="form-control" id="sel1" name="film">
            <?php
            foreach ($filmsList as $obj) { ?>
                <option value='<?= $obj["id_film"] ?>'><?= $obj["titre"] ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label for="sel2">Acteur:</label>
        <select class="form-control" id="sel2" name="acteur">
            <?php
            foreach ($acteursList as $obj) { ?>
                <option value='<?= $obj["id_acteur"] ?>'><?= $obj["acteur"] ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label for="sel3">Role:</label>
        <select class="form-control" id="sel3" name="role">
            <?php
            foreach ($rolesList as $obj) { ?>
                <option value='<?= $obj["id_role"] ?>'><?= $obj["nom"] ?></option>
            <?php } ?>
        </select>
    </div>
    




    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
<?php

$titre = "ajouter cating";
$titre_secondaire = "ajouter casting formAjoutecasting page";
$contenu = ob_get_clean();
require "view/template.php";
?>