<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> genres</p>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>GENRE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $genre) { ?> 
                <tr>
                    <td><a href="index.php?action=detailGenre&id=<?=$genre["id_genre"]?>"><?= $genre["nomGenre"] ?></a></td>
                </tr>
        <?php } ?>
    </tbody>
</table>

<?php
$titre = "Liste des genres";
$titre_secondaire = "Liste des genres";
$contenu = ob_get_clean();
require "view/template.php";
?>