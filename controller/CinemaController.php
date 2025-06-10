<?php

namespace Controller;
use Model\Connect;

class CinemaController {

    public function listFilms() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT id_film, titre, affiche, descAffiche, anneeDeSortie
            FROM film
            WHERE anneeDeSortie <= CURDATE()
        ");

        $requete1 = $pdo->query("
            SELECT id_film, titre, affiche, descAffiche, anneeDeSortie
            FROM film
            WHERE anneeDeSortie > CURDATE()
        ");
        require "./view/listFilms.php";
    }

    public function listActors() {
        $pdo = Connect::seConnecter();  // Utilise la fonction seConnecter pour se connecter à la base de donnée
        $requete = $pdo->query("
            SELECT a.id_acteur, CONCAT(p.prenom, ' ', p.nom) as Actor
            FROM personne p
            INNER JOIN acteur a ON a.id_personne = p.id_personne
            ORDER BY p.nom ASC
        ");

        require "view/listActors.php";
    }

    public function detActor($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT p.nom, p.prenom, p.sexe, p.dateDeNaissance
            FROM personne p
            INNER JOIN acteur a ON a.id_personne = p.id_personne
            WHERE a.id_acteur = :id_acteur
        ");
        $requete->execute(["id_acteur" => $id]);
        require "view/detailActor.php";
    }

    public function detailFilm($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT f.titre, f.duree, f.anneeDeSortie, p.nom, p.prenom, f.note, f.synopsis, f.affiche, f.descAffiche, f.bandeAnnonce
            FROM film f
            INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
            INNER JOIN personne p ON p.id_personne = r.id_personne
            WHERE f.id_film = :id_film
        ");

        $requete1 = $pdo->prepare("
            SELECT a.id_acteur, CONCAT(p.prenom, ' ', p.nom) as Acteur
            FROM personne p
            INNER JOIN acteur a ON p.id_personne = a.id_personne
            INNER JOIN incarner i ON i.id_acteur = a.id_acteur
            INNER JOIN film f ON f.id_film = i.id_film
            WHERE f.id_film = :id_film
        ");

        $requete2 = $pdo->prepare("
            SELECT g.nomGenre
            FROM genre g
            INNER JOIN associer ass ON ass.id_genre = g.id_genre
            INNER JOIN film f ON f.id_film = ass.id_film
            WHERE f.id_film = :id_film
        ");
        $requete->execute(["id_film" => $id]);
        $requete1->execute(["id_film" => $id]);
        $requete2->execute(["id_film" => $id]);
        require "view/detailFilm.php";
    }

    public function listGenre() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT g.id_genre, g.nomGenre
        FROM genre g
        ");

        require "view/listGenre.php";
    }

    public function detailGenre($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT f.titre, p.nom, p.prenom, f.id_film, g.nomGenre, f.affiche, f.descAffiche, g.id_genre
            FROM film f
            INNER JOIN associer ass ON f.id_film = ass.id_film
            INNER JOIN genre g ON g.id_genre = ass.id_genre
            INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur
            INNER JOIN personne p ON r.id_personne = p.id_personne
            WHERE g.id_genre = :id_genre
        ");
        $requete1 = $pdo->prepare("
            SELECT *
            FROM genre
            WHERE id_genre = :id_genre
        ");
        $requete->execute(["id_genre" => $id]);
        $requete1->execute(["id_genre" => $id]);
        require "view/detailGenre.php";
    }

    public function listReal() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT CONCAT(p.prenom, ' ', p.nom) AS Réal, r.id_realisateur
            FROM personne p
            INNER JOIN realisateur r ON p.id_personne = r.id_personne
        ");

        require "view/listReal.php";
    }

    public function detailReal($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT f.titre, f.anneeDeSortie, f.synopsis, f.id_film, p.nom, p.prenom
            FROM film f
            INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
            INNER JOIN personne p ON p.id_personne = r.id_personne
            WHERE r.id_realisateur = :id_realisateur 
        ");
        $requete->execute(["id_realisateur" => $id]);
        require "view/detailReal.php";
    }

    public function main() {
    
        require "view/main.php";
    }

    public function addFilmForm($id) {
        // select realisateurs
        // select genres 
        require "view/addFilmForm.php";
    }
    
    public function addFilm($id) {
        if(isset($_POST['submit']))
            {
                $affiche = filter_input(INPUT_POST, "affiche", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $titre = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $duree = filter_input(INPUT_POST, "duree", FILTER_VALIDATE_INT);
                $anneeDeSortie = filter_input(INPUT_POST, "anneeDeSortie");
                $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $note = filter_input(INPUT_POST, "note", FILTER_VALIDATE_INT);
                $descAffiche = filter_input(INPUT_POST, "descAffiche", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $bandeAnnonce = filter_input(INPUT_POST, "bandeAnnonce", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
            }
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            INSERT INTO film ('affiche', 'titre', 'duree', 'anneeDeSortie', 'synopsis', 'note', 'descAffiche', 'bandeAnnonce')
            VALUES (:affiche, :titre, :duree, :anneeDeSortie, :synopsis, :note, :descAffiche, :bandeAnnonce);
        ");
        $requete->execute(["affiche" => $affiche, "titre" => $titre, "duree" => $duree, "anneeDeSortie" => $anneeDeSortie, "synopsis" => $synopsis, "note" => $note, "descAffiche" => $descAffiche, "bandeAnnonce" => $bandeAnnonce]);
        require "view/listFilms.php";
    }

    public function addGenreForm() {
        require "view/addGenreForm.php";
    }
    
    public function addGenre() {
        if(isset($_POST['submit']))
        {
            $nomGenre = filter_input(INPUT_POST, "nomGenre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            INSERT INTO genre (nomGenre)
            VALUE (:nomGenre)
            ");
        $requete->execute(["nomGenre" => $nomGenre]);
        require "view/addGenreForm.php";

        header("Location:index.php?action=listGenre");
    }

    public function delGenre($id) {
        $pdo = Connect::seConnecter();
        $requete2 = $pdo->prepare("
            DELETE FROM genre
            WHERE id_genre = :id_genre
        ");
        $requete2->execute(["id_genre" => $id]);

        header("Location:index.php?action=listGenre");
    }
}