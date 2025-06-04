<?php ob_start(); 

$actor = $requete->fetch()?>


<p class="uk-label uk-table-striped">

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>SEXE</th>
            <th>DATE DE NAISSANCE</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $actor["nom"] ?></td>
            <td><?= $actor["prenom"] ?></td>
            <td><?= $actor["sexe"] ?></td>
            <td><?= $actor["dateDeNaissance"] ?></td>
        </tr>
    </tbody>
</table>

<?php
$titre = $actor["prenom"]. " " .$actor["nom"];
$titre_secondaire = $actor["prenom"]. " " .$actor["nom"];
$contenu = ob_get_clean();
require "view/template.php"
?>