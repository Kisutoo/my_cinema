<?php ob_start(); 
$genrebutton = $requete1->fetch();

?>


<div class="formulairefilm">
    <form class="formfilm" action="index.php?action=addFilm" method="post">
    <div class="section1">
        <p class="pform">
            <label class="sectionsForm" aria-label="Titre du film">
                Titre du film
            </label>
            <input type="text" class="inputform" required="required" name="titre">
        </p>
        <p class="pform">
            <label class="sectionsForm" aria-label="Affiche du film">
                Affiche du film (titre.webp)
            </label>
            <input type="text" class="inputform" required="required" name="affiche">
        </p> 
        <p class="pform">
            <label class="sectionsForm" aria-label="Description de l'affiche du film">
                Description de l'affiche du film
            </label>
            <input type="text" class="inputform" required="required" name="descAffiche">
        </p>
    </div>
    <div class="section1">
        <p class="pform">
            <label class="sectionsForm" aria-label="Durée du film">
                Durée du film (en minutes)
            </label>
            <input type="number" class="inputform" required="required" name="duree" min="0">
        </p>
        <p class="pform">
            <label class="sectionsForm" aria-label="Date de sortie">
                Date de sortie
            </label>
            <input type="date" class="inputform" required="required" name="anneeDeSortie">
        </p>
        <p class="pform">
            <label class="sectionsForm" aria-label="Synopsis">
                Synopsis
            </label>
            <input type="text" class="inputform" required="required" name="synopsis">
        </p>
    </div>
    <div class="section1">
        <p class="pform">
            <label  class="sectionsForm" aria-label="Note du film">
                Note du film (/10)
            </label>
            <input type="range" class="inputform" required="required" name="note" min="0" max="10">
            
        </p>
        <p class="pform">
            <label  class="sectionsForm" aria-label="Bande Annonce">
                Bande annonce <br>(intégrer script vidéo youtube)
            </label>
            <input class="inputform" type="text" required="required" name="bandeAnnonce">
            
        </p>
        <p class="pform">
            <label class="sectionForm" aria-label="Réalisateur">
                Réalisateur
            </label>
            <select class="inputform" type="select" required="required" name=id_realisateur>
                <?php foreach($requete->fetchAll() as $real) { ?>  
                <option value="<?=$real["id_realisateur"]?>"><?=$real["Réal"]?></option>
                <?php } ?>
            </select>
        </p>
        <p class="pform">
            <label class="sectionForm" aria-label="Genre">
                Autres genres
            </label>
            <?php foreach($requete1->fetchAll() as $genre) { ?>  
                <input class="inputform" type="checkbox" name=id_genre>
                <label value="<?=$genre["id_genre"]?>"><?=$genre["nomGenre"]?></label>
                </input>
                <?php } ?>
        </p>
    </div>
        <p class="button">
            <a href="index.php?action=addFilm&id=<?=$genrebutton["id_genre"]?>"><input class="boutonenvoyer" type="submit" name="submit" value="Ajouter le film">
        </p>

    </form>
</div>
<?php
$titre = "Ajouter un film";
$titre_secondaire = "Ajouter un film";
$contenu = ob_get_clean(); 
require "view/template.php";
?>