<?php ob_start(); ?>

<div class="formulairefilm">
    <form action="index.php?action=addGenre" method="post">
        <p class="pform">
            <label class="sectionsForm" aria-label="nomGenre">
            Nom du genre
            <input type="text" class="inputform" required="required" name="nomGenre">
            </label>
        </p>
        <div class="button">
            <a href="index.php?action=listGenre"><input class="boutonenvoyer" type="submit" name="submit" value="Ajouter le genre"></a>
        </div>
    </form>
</div>
<?php
$titre = "Ajouter un genre";
$titre_secondaire = "Ajouter un genre";
$contenu = ob_get_clean(); 
require "view/template.php";
?>