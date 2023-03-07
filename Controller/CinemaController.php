<?php

namespace Controller;

use Model\Connect;
// spl_autoload_register(function ($class_name) {
//     require_once $class_name . '.php';
// });
class CinemaController
{
    public function detailFilm($id)
    {

        $pdo = Connect::seConnecter();
        try {
            //get list des film requet utilisant PDO
            $requet = $pdo->prepare("SELECT titre , YEAR(DATE) as year ,  concat(p.nom,' ',p.prenom) AS realisateur , TIME_FORMAT(SEC_TO_TIME(f.duree*60),'%h:%i') as dtime , note 
                                     FROM  film f
                                     INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur 
                                     INNER JOIN personne p ON p.id_personne = r.id_personne
                                     WHERE id_film = :id");
            $requet->execute(["id" => $id]);
            $film = $requet->fetch();
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }

        // pour casting requet 
        $castingsList = $this->castingList($id);
        // var_dump($castingList);
        require "view/film/detailFilm.php";
    }

    public function castingList($id): array
    {
        $pdo = Connect::seConnecter();

        try {
            //get list des film requet utilisant PDO
            $requet = $pdo->prepare("SELECT f.titre , concat(p.nom,' ',p.prenom) AS acteur ,r.nom FROM  film f
                                    INNER JOIN casting c ON f.id_film = c.id_film
                                    INNER JOIN acteur a ON a.id_acteur= c.id_acteur
                                    INNER JOIN personne p ON p.id_personne = a.id_personne
                                    INNER JOIN role r ON r.id_role = c.id_role
                                    WHERE f.id_film = :id
                                    order by p.nom ");
            $requet->execute(["id" => $id]);
            $castingsList = $requet->fetchAll();
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $castingsList;
    }


    public function listFilms()
    {
        $pdo = Connect::seConnecter();
        //$requet = $pdo->query("select  titre  , year(date) from film");
        try {
            //get list des film requet utilisant PDO
            $cinemaStatement = $pdo->query("SELECT id_film, titre , YEAR(DATE) as year ,  concat(p.nom,' ',p.prenom) AS realisateur , TIME_FORMAT(SEC_TO_TIME(f.duree*60),'%h:%i') as dtime FROM  film f
                                                                                        INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur 
                                                                                        INNER JOIN personne p ON p.id_personne = r.id_personne
                                                                                        ORDER BY YEAR desc");
            // $cinemaStatement->execute();
            $filmsList = $cinemaStatement->fetchAll();
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        require "view/film/listFilms.php";
    }


    public function listActeurs()
    {
        $pdo = Connect::seConnecter();
        //$requet = $pdo->query("select  titre  , year(date) from film");
        try {
            //get list des film requet utilisant PDO
            $requet = $pdo->query("SELECT a.id_acteur , concat(p.nom,' ',p.prenom) AS acteur 
                                   FROM  acteur a
                                   INNER JOIN personne p ON p.id_personne = a.id_personne
                                   ORDER BY p.nom ");
            // $cinemaStatement->execute();
            $acteursList = $requet->fetchAll();
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        require "view/acteur/listActeurs.php";
    }

    public function detailActeur($id)
    {

        $pdo = Connect::seConnecter();
        try {
            //get acteur par id  requet utilisant PDO
            $requet = $pdo->prepare("SELECT concat(p.nom,' ',p.prenom) AS acteur  , p.sexe , p.date_de_naissance
                                     FROM  acteur a
                                     INNER JOIN personne p ON p.id_personne = a.id_personne
                                     WHERE id_acteur = :id");
            $requet->execute(["id" => $id]);
            $acteur = $requet->fetch();
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }


        // pour casting requet 
        $castingsList = $this->castingList($id);
        // var_dump($castingList);


        require "view/acteur/detailActeur.php";
    }



    public function listRealisateur()
    {
        $pdo = Connect::seConnecter();
        //$requet = $pdo->query("select  titre  , year(date) from film");
        try {
            //get list des film requet utilisant PDO
            $requet = $pdo->query("SELECT r.id_realisateur , concat(p.nom,' ',p.prenom) AS realisateur
                                   FROM  realisateur r
                                   INNER JOIN personne p ON p.id_personne = r.id_personne
                                   ORDER BY p.nom");
            // $cinemaStatement->execute();
            $realisateursList = $requet->fetchAll();
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        require "view/realisateur/listRealisateurs.php";
    }

    public function detailRealisateur($id)
    {

        $pdo = Connect::seConnecter();
        try {
            //get acteur par id  requet utilisant PDO
            $requet = $pdo->prepare("SELECT concat(p.nom,' ',p.prenom) AS realisateur  , p.sexe , p.date_de_naissance
                                     FROM  realisateur r
                                     INNER JOIN personne p ON p.id_personne = r.id_personne
                                     WHERE id_realisateur = :id");
            $requet->execute(["id" => $id]);
            $realisateur = $requet->fetch();
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }


        // pour casting requet 
        // $filmsRealisateurList = $this->filmsRealisateurList($id);
        // var_dump($castingList);


        require "view/realisateur/detailRealisateur.php";
    }
}
