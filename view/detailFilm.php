<?php ob_start(); ?>
<?php 
$film = $requete->fetch();
?>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITRE</th>
            <th>DUREE</th>
            <th>ANNEE SORTIE</th>
            <th>REALISATEUR</th>
            <th>NOTE</th>
            <th>SYSNOPSIS</th>
            <th>CASTING</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $film["titre"] ?></td>
            <td><?= $film["duree"] ?></td>
            <td><?= $film["anneeDeSortie"] ?></td>
            <td><?= $film["nom"] ?></td>
            <td><?= $film["note"] ?></td>
            <td><?= $film["synopsis"] ?></td>
            <td>
                <?php foreach($requete1->fetchAll() as $cast) { ?>
                    <div>
                        <a href="index.php?action=detailActor&id=<?=$cast["id_acteur"]?>"><?= $cast["Acteur"]?></a>
                    </div>
                <?php } ?>
            </td>
        </tr>
    </tbody>
</table>

<?php
$titre = $film["titre"];
$titre_secondaire = $film["titre"];
$contenu = ob_get_clean();
require "view/template.php";
?>