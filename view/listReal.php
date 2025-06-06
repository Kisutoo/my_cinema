<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> Réalisateurs</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>RÉALISATEUR</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $film) { ?> 
                <tr>
                    <td><a href="index.php?action=detailReal&id=<?=$film["id_realisateur"]?>"><?= $film["Réal"] ?></a></td>
                </tr>
        <?php } ?>
    </tbody>
</table>

<?php
$titre = "Liste des réalisateurs";
$titre_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();
require "view/template.php";
?>