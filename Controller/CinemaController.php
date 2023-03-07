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
        try {
            //get list des film requet utilisant PDO
            $requet = $pdo->prepare("SELECT f.titre , p.nom,c.id_role FROM  film f
            INNER JOIN casting c ON f.id_film = c.id_film
            INNER JOIN acteur a ON a.id_acteur= c.id_acteur
            INNER JOIN personne p ON p.id_personne = a.id_personne
            WHERE f.id_film = :id");
            $requet->execute(["id" => $id]);
            $film = $requet->fetch();
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }


        require "view/film/detailFilm.php";
    }

    public function listFilms()
    {
        $pdo = Connect::seConnecter();
        //$requet = $pdo->query("select  titre  , year(date) from film");
        try {
            //get list des film requet utilisant PDO
            $cinemaStatement = $pdo->query("SELECT id_film, titre , YEAR(DATE) as year ,  concat(p.nom,' ',p.prenom) AS realisateur , TIME_FORMAT(SEC_TO_TIME(f.duree*60),'%h:%i') as dtime FROM  film f
                                                                                        INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur 
                                                                                        INNER JOIN personne p ON p.id_personne = r.id_personne");
            // $cinemaStatement->execute();
            $cinemaList = $cinemaStatement->fetchAll();
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        require "view/film/listFilms.php";
    }
}
