<?php 
    namespace Controller;

    // spl_autoload_register(function ($class_name) {
    //     require_once $class_name . '.php';
    // });
    
    
    use Model\Connect;

    class CinemaController{
    
    public function listFilms(){
    
        $pdo = Connect::seConnecter();
        //$requet = $pdo->query("select  titre  , year(date) from film");
        
        try {
            //get list des film requet utilisant PDO
            $cinemaStatement = $pdo->query("SELECT id_film, titre , YEAR(DATE) as year ,  concat(p.nom,' ',p.prenom) AS realisateur , TIME_FORMAT(SEC_TO_TIME(f.duree*60),'%h:%i') as dtime FROM  film f
                                                                                    INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur 
                                                                                    INNER JOIN personne p ON p.id_personne = r.id_personne");
            $cinemaStatement->execute();
            $cinemaList = $cinemaStatement->fetchAll();
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        require "view/film/listFilms.php";
    }


        
        

    }
