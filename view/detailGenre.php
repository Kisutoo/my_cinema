<?php ob_start(); ?>
<div class="displayFilms">
        <?php foreach($requete->fetchAll() as $film) { ?>
            <div class="film">
                        <a class="lienfilm" href="index.php?action=detailFilm&id=<?=$film["id_film"]?>">
                            <img class="affichefilm" src="public/img/affiches/<?=$film["affiche"]?>" alt="<?=$film["descAffiche"]?>">
                            <h3 class="titrefilm"><?=$film["titre"]?></h3>
                        </a>
                    </div>
        <?php } ?>
</div>
<?php
$titre = $film["nomGenre"];
$titre_secondaire = $film["nomGenre"];
$contenu = ob_get_clean();
require "view/template.php";
?>