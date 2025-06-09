<?php ob_start(); ?>

<div class="listActeurs">
        <?php
            foreach($requete->fetchAll() as $genre) { ?> 
                <a class="acteur" href="index.php?action=detailGenre&id=<?=$genre["id_genre"]?>"><?= $genre["nomGenre"] ?></a></td>
        <?php } ?>
</div>
<?php
$titre = "Liste des genres";
$titre_secondaire = "Liste des genres";
$contenu = ob_get_clean();
require "view/template.php";
?>