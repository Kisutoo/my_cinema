<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <meta name="description" content=" ">
    <title><?= $titre ?></title>
</head>
<body>
    <div>
        <nav>
             <a href="?action=listFilms">Films</a>
             <a href="index.php?action=listActors">Acteurs</a>
             <a href="index.php?action=listGenre">Genres</a>
             <a href="index.php?action=listReal">Réalisateurs</a>
             <a href=""></a>
        </nav>
        <main>
            <div id="contenu">
                <h1 class="uk-heading-divider">PDO Cinema</h1>
                <h2 class="uk-heading-bullet"><?= $titre_secondaire ?></h2>
                <?= $contenu ?>
            </div> 
        </main>
        <footer>
            
        </footer>
    </div>
</body>
</html>