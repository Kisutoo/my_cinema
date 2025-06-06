<?php

namespace Controller;
use Model\Connect;

class CinemaController {

    public function listFilms() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT id_film, titre, anneeDeSortie
            FROM film
        ");
    
        require "./view/listFilms.php";
    }

    public function listActors() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT a.id_acteur, CONCAT(p.prenom, ' ', p.nom) as Actor
            FROM personne p
            INNER JOIN acteur a ON a.id_personne = p.id_personne
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
            SELECT f.titre, f.duree, f.anneeDeSortie, p.nom, p.prenom, f.note, f.synopsis
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
        $requete->execute(["id_film" => $id]);
        $requete1->execute(["id_film" => $id]);
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
            SELECT f.titre, p.nom, p.prenom, f.id_film
            FROM film f
            INNER JOIN associer ass ON f.id_film = ass.id_film
            INNER JOIN genre g ON g.id_genre = ass.id_genre
            INNER JOIN realisateur r ON r.id_realisateur = f.id_realisateur
            INNER JOIN personne p ON r.id_personne = p.id_personne
            WHERE ass.id_genre = :id_genre
        ");
        $requete->execute(["id_genre" => $id]);
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
}