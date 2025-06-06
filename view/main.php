<?php ob_start(); ?>

<div class="bannertotal">
<div class="banner">
</div>
<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>
<div class="slide-container">
        <div class="custom-slider fade">
            <img class="slide-img" src="public/img/mobilebanner.jpg" alt="Bannière du film Minecraft">
        </div>
        <div class="custom-slider fade">
            <img class="slide-img" src="public/img/john-wick-2-trailer-banniere.jpg" alt="Bannière du film John Wick 2">
        </div>
        <div class="custom-slider fade">
            <img class="slide-img" src="public/img/destinationfinale.jpg" alt="Bannière du film Destination Finale">
        </div>
        </div>
        <br>
        <div class="slide-dot">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
</div>
</div>
<h2 class="h2main commonH2">Actualités</h2>
<div class="actu">
    <div class="containterimgactu">
        <a href="#"><img class="imgactu" src="public/img/écrancinema.jpg" alt="Salle de cinéma"></a>
    </div>    
    <div class="txtActu">
        <h3 class="h3actu">Séance Tenante</h3>
        <p class="pActu">Le podcast des cinémas ...</p>
    </div>
</div>
<div class="actu actu2">
    <div class="txtActu">
        <h3 class="h3actu">The Creator</h3>
        <p class="pActu">Venez découvrir ce nouveau film à succès dans votre cinéma</p>
    </div>
    <div class="containterimgactu containerimgactu2">
        <a href="#"><img class="imgactu imgactu2" src="public/img/thecreator.jpg" alt="Salle de cinéma"></a>
    </div>    
</div>
<div class="actu actu3">
    <div class="containerimgactu containterimgactu3">
        <a href="#"><img class="imgactu imgactu3" src="public/img/dune.jpg" alt="Salle de cinéma"></a>
    </div>    
    <div class="txtActu">
        <h3 class="h3actu">Dune 3</h3>
        <p class="pActu">Découvrez en avant-première le casting de Dune 3</p>
    </div>
</div>

<?php
$titre = "Accueil";
$titre_secondaire = "Films du moment";
$contenu = ob_get_clean();
require "template.php";
?>