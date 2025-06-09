<?php ob_start(); ?>

<div class="listActeurs">
        <?php
            foreach($requete->fetchAll() as $personne) { ?> 
                    <a class="acteur" href="index.php?action=detailActor&id=<?=$personne["id_acteur"]?>"><?= $personne["Actor"] ?>
        <?php } ?>
</div>
<?php
$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean(); 
require "view/template.php";
?>