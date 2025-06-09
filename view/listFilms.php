<?php ob_start(); ?>

<div class="test">    
    <div class="contentfilms">
        <div class="actuellement">
            <h3 class="titrecontentfilm">Actuellement</h3>
        </div>
        <div class="films">
            <?php foreach($requete->fetchAll() as $filmActuels) { ?> 
                    <div class="film">
                        <a class="lienfilm" href="index.php?action=detailFilm&id=<?=$filmActuels["id_film"]?>">
                            <img class="affichefilm" src="public/img/affiches/<?=$filmActuels["affiche"]?>" alt="<?=$filmActuels["descAffiche"]?>">
                            <h3 class="titrefilm"><?=$filmActuels["titre"]?></h3>
                        </a>
                    </div>
            <?php } ?>
        </div>
        <div class="prochainement">
            <div class="prochainement">
                <h3 class="titrecontentfilm">Prochainement</h3>
            </div>
            <div class="films">
            <?php foreach($requete1->fetchAll() as $filmAVenir) { ?> 
                    <div class="film">
                        <a class="lienfilm" href="index.php?action=detailFilm&id=<?=$filmAVenir["id_film"]?>">
                            <img class="affichefilm" src="public/img/affiches/<?=$filmAVenir["affiche"]?>" alt="<?=$filmAVenir["descAffiche"]?>">
                            <h3 class="titrefilm"><?=$filmAVenir["titre"]?></h3>
                        </a>
                    </div>
            <?php } ?>
        </div>
        </div>
        <div class="films">
            
        </div>
    </div>
</div>    

<?php
$titre = "Films à l'affiche";
$titre_secondaire = "Films à l'affiche";
$contenu = ob_get_clean();
require "view/template.php";
?>