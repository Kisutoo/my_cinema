<?php ob_start(); ?>
<div class="listActeurs">
        <?php
            foreach($requete->fetchAll() as $film) { ?> 
                <a class="acteur" href="index.php?action=detailReal&id=<?=$film["id_realisateur"]?>"><?= $film["Réal"] ?></a></td>
        <?php } ?>
</div>
<?php
$titre = "Liste des réalisateurs";
$titre_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "view/template.php";
?>