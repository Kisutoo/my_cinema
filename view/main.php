<?php ob_start(); ?>

<div class="bannertotal">
<div class="banner">
</div>
<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>
<div class="slide-container">
        <div class="custom-slider fade">
            <img class="slide-img" src="public/img/mobilebanner.jpg">
        </div>
        <div class="custom-slider fade">
            <img class="slide-img" src="public/img/john-wick-2-trailer-banniere.jpg">
        </div>
        <div class="custom-slider fade">
            <img class="slide-img" src="public/img/destinationfinale.jpg">
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
<h2 class="h2main">Actualités</h2>
<p></p>

<?php
$titre = "Accueil";
$titre_secondaire = "Films du moment";
$contenu = ob_get_clean();
require "template.php";
?>