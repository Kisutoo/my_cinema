<?php ob_start();
$film1 = $requete1->fetch();?>
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
<div>
    <div class="button">
        <a href="index.php?action=addFilmForm&id=<?=$id?>"><input class="boutonenvoyer" type="submit" name="submit" value="Ajouter un film"></a>
    </div>
    <div class="button">
        <a href="index.php?action=delGenre&id=<?=$id?>"><input class="boutonenvoyer delete" type="submit" name="submit" value="Supprimer le genre"></a>
    </div>
</div>
<?php    
$titre = $film1["nomGenre"];
$titre_secondaire = $film1["nomGenre"];
$contenu = ob_get_clean();
require "view/template.php";
?>