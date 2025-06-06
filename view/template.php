<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" ">
    <link href="./public/css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lunasima:wght@400;700&family=Oswald:wght@200..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Tagesschrift&display=swap" rel="stylesheet">
    <title><?= $titre ?></title>
</head>
<body>
    <div>
        <nav>
            <div class="nav1"> 
                <a class="loupe" href="#"><img class="imgloupe" src="public/img/loupe.png" alt="Loupe de recherche"></a>
                <a class="lienfilm" href="index.php?action=listFilms">Films</a>
            </div>
            <a href="index.php?action=listGenre">Genres</a>
            <a class="lienlogo" href="index.php?action=main"><img class="logocine" src="./public/img/ticket_cinema.svg" alt="Logo Ticket de cinéma">
            <h1 class="txtlogo">Cinéma ★</h1>
        </a>
        <a href="index.php?action=listActors">Acteurs</a>
             <a href="index.php?action=listReal">Réalisateurs</a>
        </nav>
        <main>
            <div class="contenu">

                <h2 class="commonH2"><?= $titre_secondaire ?></h2>
                <?= $contenu ?>
            </div> 
        </main>
        <footer>
            <div class="reseaux">
                <a class="logoreseau" href="#"><img src="public/img/logofb.svg" alt="logo facebook"></a>
                <a class="logoreseau" href="#"><img src="public/img/logox.svg" alt="logo twitter"></a>
                <a class="logoreseau" href="#"><img src="public/img/logoinsta.svg" alt="logo instagram"></a>
            </div>
            <small>© 2025 - Tous droits réservés ™</small>
            <a class="mention" href="#">Mentions légales</a>
        </footer>
    </div>
    <script src="./public/js/script.js"></script>
</body>
</html>