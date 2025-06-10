<?php ob_start(); ?>

<div class="formulairefilm">
    <form class="formfilm" action="index.php?action=addFilm" method="post">
    <div class="section1">
        <p class="pform">
            <label class="sectionsForm" aria-label="Titre du film">
            Titre du film
            <input type="text" class="inputform" required="required" name="titre">
            </label>
        </p>
        <p class="pform">
            <label class="sectionsForm" aria-label="Affiche du film">
            Affiche du film (titre.webp)
            <input type="text" class="inputform" required="required" name="affiche">
            </label>
        </p> 
        <p class="pform">
            <label class="sectionsForm" aria-label="Description de l'affiche du film">
            Description de l'affiche du film
            <input type="text" class="inputform" required="required" name="descAffiche">
            </label>
        </p>
    </div>
    <div class="section1">
        <p class="pform">
            <label class="sectionsForm" aria-label="Durée du film">
            Durée du film (en minutes)
            <input type="number" class="inputform" required="required" name="duree" min="0">
            </label>
        </p>
        <p class="pform">
            <label class="sectionsForm" aria-label="Date de sortie">
            Date de sortie
            <input type="date" class="inputform" required="required" name="anneeDeSortie">
            </label>
        </p>
        <p class="pform">
            <label class="sectionsForm" aria-label="Synopsis">
            Synopsis
            <input type="text" class="inputform" required="required" name="synopsis">
            </label>
        </p>
    </div>
    <div class="section1">
        <p class="pform">
            <label  class="sectionsForm" aria-label="Note du film">
            Note du film (/10)
            <input type="range" class="inputform" required="required" name="note" min="0" max="10">
            </label>
        </p>
        <p class="pform">
            <label  class="sectionsForm" aria-label="Bande Annonce">
            Bande annonce <br>(intégrer script vidéo youtube)
            <input class="inputform" type="text" required="required" name="bandeAnnonce">
            </label>
        </p>
        <p class="pform">
            <label class="sectionForm" aria-label="Réalisateur">
            Réalisateur
            <input class="inputform" type="select" required="required" name=id_realisateur>
            <nom>id_realisateur</nom>
                <?php foreach($requete->fetchAll() as $real) { ?>
                    
                    <option valeur="<?=$real["id_realisateur"]?>"><?=$real["Réal"]?></option>
                <?php } ?>
            </input>
            </label>
        </p>
    </div>
        <p class="button">
            <a href="index.php?action=detailFilm&id=<?=$id?>"><input class="boutonenvoyer" type="submit" name="submit" value="Ajouter le film">
        </p>

    </form>
</div>
<?php
$titre = "Ajouter un film";
$titre_secondaire = "Ajouter un film";
$contenu = ob_get_clean(); 
require "view/template.php";
?>