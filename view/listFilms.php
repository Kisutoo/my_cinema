<?php ob_start(); ?>

        
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
</div>


<?php
$titre = "Films à l'affiche";
$titre_secondaire = "Films à l'affiche";
$contenu = ob_get_clean();
require "view/template.php";
?>