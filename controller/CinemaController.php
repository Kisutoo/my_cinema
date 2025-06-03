<?php

namespace Controller;
use Model\Connect;

class CinemaController {

    /**
     * Lister les films
     */
    public function listFilms() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT id_film, titre, anneeDeSortie
            FROM film
        ");
    
        require "view/listFilms.php";
    }

    public function listActeurs() {
        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT p.nom, p.prenom
            FROM personne p
            INNER JOIN acteur a ON a.id_personne = p.id_personne
        ");

        require "view/listActeurs.php";
    }

    // detail film

    public function detActeur($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT *
            FROM acteur
            WHERE id_acteur = :id
        ");
        $requete->execute(["id_acteur" => $id]);
        require "view/acteur/detailActeur.php";
    }

    public function detailFilm($id) {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT f.titre, f.duree, f.anneeDeSortie, p.nom, f.note, f.synopsis
            FROM film f
            INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
            INNER JOIN personne p ON p.id_personne = r.id_personne
            WHERE f.id_film =  :id_film
        ");
        $requete->execute(["id_film" => $id]);
        require "view/detailFilm.php";
    }
}