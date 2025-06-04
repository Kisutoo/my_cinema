<?php ob_start(); ?>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITRE</th>
            <th>ANNEE SORTIE</th>
            <th>SYSNOPSIS</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($requete->fetchAll() as $film) { ?>
            <tr>    
                <td><a href="index.php?action=detailFilm&id=<?=$film["id_film"]?>"><?= $film["titre"] ?></a></td>
                <td><?= $film["anneeDeSortie"] ?></td>
                <td><?= $film["synopsis"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
$titre = $film["prenom"]. " " .$film["nom"] ;
$titre_secondaire = "Liste des films de " . $film["prenom"]. " " .$film["nom"];
$contenu = ob_get_clean();
require "view/template.php";
?>