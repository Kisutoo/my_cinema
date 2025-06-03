<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> films</p>

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
        </tr>
    </tbody>
</table>

<?php

$titre = $film["titre"];
$titre_secondaire = $film["titre"];
$contenu = ob_get_clean();
require "view/template.php";

?>