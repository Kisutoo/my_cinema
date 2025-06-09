<?php ob_start(); ?>
<?php 
date_default_timezone_set('CET');
$film = $requete->fetch();
$genre = $requete2->fetch();
?>
<div class="pageFilm">
    <div class="afficheinfo">
        <div class="detAfficheFilm">
            <img class="imgaffichefilm" src="public/img/affiches/<?=$film["affiche"]?>" alt="<?=$film["descAffiche"]?>">
        </div>
        <div class="infofilm">
            <p class=txtinfofilm><b>Genre :</b> <?=$genre["nomGenre"]?></p>
            <p class=txtinfofilm><b>Durée :</b> <?=$film["duree"]?> minutes</p>
            <p class=txtinfofilm><b>Date de sortie :</b> <?=(new DateTime($film["anneeDeSortie"]))->format('d M Y')?></p>
            <p class=txtinfofilm><b>Réalisateur :</b> <?=$film["prenom"] . " " . $film["nom"]?></p>
            <p class=txtinfofilm><b>Note :</b> <?=$film["note"]?> / 10</p>
            <ul class=txtinfofilm><b>Acteurs :</b> <?php foreach($requete1->fetchAll() as $cast) { ?>
                        <li><a href="index.php?action=detailActor&id=<?=$cast["id_acteur"]?>"><?= $cast["Acteur"]?></a></li>
                <?php } ?>
                </ul>
        </div>
    </div>
    <div class="synopsis">
        <p class=titresynopsis>Résumé</p>
        <p><?=$film["synopsis"]?></p>
    </div>
    <div class="bandeannonce">
        <?=$film["bandeAnnonce"]?>
    </div>
</div>

<?php
$titre = $film["titre"];
$titre_secondaire = $film["titre"];
$contenu = ob_get_clean();
require "view/template.php";
?>