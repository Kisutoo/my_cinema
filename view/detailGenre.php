<?php ob_start(); ?>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITRE</th>
            <th>REALISATEUR</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchAll() as $film) { ?>
        <tr>
            <td><a href="index.php?action=detailFilm&id=<?=$film["id_film"]?>"><?= $film["titre"] ?></a></td>
            <td><?= $film["prenom"] ." ". $film["nom"] ?></td>

        </tr>
        <?php } ?>
    </tbody>
</table>

<?php
$titre = $film["titre"];
$titre_secondaire = $film["titre"];
$contenu = ob_get_clean();
require "view/template.php";
?>