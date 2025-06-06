<?php ob_start(); ?>

<?php
$titre = "Accueil";
$titre_secondaire = "Films du moment";
$contenu = ob_get_clean();
require "template.php";
?>