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
            $requet = $pdo->prepare("SELECT titre , YEAR(DATESortie) as year ,  concat(p.nom,' ',p.prenom) AS realisateur , TIME_FORMAT(SEC_TO_TIME(f.duree*60),'%h:%i') as dtime , note 
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

    public function acteurFilmsList($id): array
    {
        $pdo = Connect::seConnecter();

        try {
            //get list des film requet utilisant PDO
            $requet = $pdo->prepare("SELECT  distinct f.titre FROM  film f
                                         INNER JOIN casting c ON f.id_film = c.id_film
                                         INNER JOIN acteur a ON a.id_acteur= c.id_acteur
                                         WHERE a.id_acteur = :id");
            $requet->execute(["id" => $id]);
            $acteurFilmsList = $requet->fetchAll();
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $acteurFilmsList;
    }


    public function realisateurFilmsList($id): array
    {
        $pdo = Connect::seConnecter();

        try {
            //get list des film requet utilisant PDO
            $requet = $pdo->prepare("SELECT  distinct f.titre FROM  film f
                                         INNER JOIN realisateur r ON f.id_realisateur
                                         WHERE r.id_realisateur = :id");
            $requet->execute(["id" => $id]);
            $realisateurFilmsList = $requet->fetchAll();
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $realisateurFilmsList;
    }


    public function listFilms()
    {
        $pdo = Connect::seConnecter();
        //$requet = $pdo->query("select  titre  , year(date) from film");
        try {
            //get list des film requet utilisant PDO
            $cinemaStatement = $pdo->query("SELECT id_film, titre , YEAR(DATESortie) as year ,  concat(p.nom,' ',p.prenom) AS realisateur , TIME_FORMAT(SEC_TO_TIME(f.duree*60),'%h:%i') as dtime FROM  film f
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

        // Film par acteur  
        $acteurFilmsList = $this->acteurFilmsList($id);

        require "view/acteur/detailActeur.php";
    }

    public function getRealisateursList(): array
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
        return $realisateursList;
    }
    public function getActeursList(): array
    {
        $pdo = Connect::seConnecter();
        //$requet = $pdo->query("select  titre  , year(date) from film");
        try {
            //get list des film requet utilisant PDO
            $requet = $pdo->query("SELECT a.id_acteur , concat(p.nom,' ',p.prenom) AS acteur
                                   FROM  acteur a
                                   INNER JOIN personne p ON p.id_personne = a.id_personne
                                   ORDER BY p.nom");
            // $cinemaStatement->execute();
            $acteursList = $requet->fetchAll();
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $acteursList;
    }
    public function getFilmsList(): array
    {
        $pdo = Connect::seConnecter();
        //$requet = $pdo->query("select  titre  , year(date) from film");
        try {
            //get list des film requet utilisant PDO
            $requet = $pdo->query("SELECT f.id_film , f.titre AS titre ,year(f.datesortie) AS year
                                   FROM  film f
                                   ORDER BY f.titre ,year");
            // $cinemaStatement->execute();
            $filmsList = $requet->fetchAll();
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $filmsList;
    }
    public function getRolesList(): array
    {
        $pdo = Connect::seConnecter();
        //$requet = $pdo->query("select  titre  , year(date) from film");
        try {
            //get list des film requet utilisant PDO
            $requet = $pdo->query("SELECT r.id_role , r.nom  
                                   FROM  role r
                                   ORDER BY r.nom");
            // $cinemaStatement->execute();
            $rolesList = $requet->fetchAll();
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $rolesList;
    }





    public function getGenresList(): array
    {
        $pdo = Connect::seConnecter();
        try {
            //get list des genres
            $requet = $pdo->query("SELECT g.id_genre , g.type AS type
                                   FROM  genre g
                                   ORDER BY g.type");
            // $cinemaStatement->execute();
            $genresList = $requet->fetchAll();
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $genresList;
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


        // list des films par acteur 
        $realisateurFilmsList = $this->realisateurFilmsList($id);
        // var_dump($castingList);


        require "view/realisateur/detailRealisateur.php";
    }


    public function listGenres()
    {
        $pdo = Connect::seConnecter();
        //$requet = $pdo->query("select  titre  , year(date) from film");
        try {
            //get list des film requet utilisant PDO
            $cinemaStatement = $pdo->query("SELECT g.type FROM  genre g
                                            ORDER BY g.type ");
            // $cinemaStatement->execute();
            $genresList = $cinemaStatement->fetchAll();
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        require "view/genre/listGenres.php";
    }

    public function listRoles()
    {
        $pdo = Connect::seConnecter();
        //$requet = $pdo->query("select  titre  , year(date) from film");
        try {
            //get list des film requet utilisant PDO
            $cinemaStatement = $pdo->query("SELECT r.nom FROM  role r
                                            ORDER BY r.nom ");
            // $cinemaStatement->execute();
            $rolesList = $cinemaStatement->fetchAll();
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        require "view/role/listRoles.php";
    }


    public function formAjouteActeur()
    {
        require 'view/form/formAjouteActeur.php';
    }
    public function formAjouteRealisateur()
    {
        require 'view/form/formAjouteRealisateur.php';
    }
    public function formAjouteFilm()
    {
        //fill realisateursList    
        $realisateursList = $this->getRealisateursList();
        //fill genresList    
        $genresList = $this->getGenresList();

        //ou get list realisateur ici 
        require 'view/form/formAjouteFilm.php';
    }

    public function formAjouteCasting()
    {
        //fill lists    
        $acteursList = $this->getActeursList();
        $filmsList = $this->getFilmsList();
        $rolesList = $this->getRolesList();

        //ou get list realisateur ici 
        require 'view/form/formAjouteCasting.php';
    }


    public function addPersonne()
    {

        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
        $dn = filter_input(INPUT_POST, 'date_naissance', FILTER_SANITIZE_SPECIAL_CHARS);
        $sexe = filter_input(INPUT_POST, 'sexe', FILTER_SANITIZE_SPECIAL_CHARS);

        try {
            $pdo = Connect::seConnecter();
            $pdo->beginTransaction();
            $requete = $pdo->prepare("INSERT INTO personne(nom , prenom,sexe,date_de_naissance) 
                                      VALUES(:nom,:prenom,:sexe,:dn)");
            $requete->execute([
                "nom" => $nom,
                "prenom" => $prenom,
                "sexe" => $sexe,
                "dn" => $dn
            ]);

            $id = $pdo->lastInsertId();
            $pdo->commit();
            // printf("New record has ID %d.\n", $id);

        } catch (\PDOException $e) {
            $pdo->rollback();
            die('Erreur : ' . $e->getMessage());
        }
        return $id;
    }

    public function addActeur($id)
    {
        try {
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("INSERT INTO acteur(id_personne) VALUES(:id)");
            $requete->execute(["id" => $id]);
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        //return la form 
        require 'view/form/formAjouteActeur.php';
    }

    public function addRealisateur($id)
    {
        try {
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("INSERT INTO realisateur(id_personne) VALUES(:id)");
            $requete->execute(["id" => $id]);
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        //return la form 
        require 'view/form/formAjouteRealisateur.php';
    }


    public function addFilm()
    {

        //get input filter 
        $titre = filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_SPECIAL_CHARS);
        $dateSortie = filter_input(INPUT_POST, 'date_sortie', FILTER_SANITIZE_SPECIAL_CHARS);
        $duree = filter_input(INPUT_POST, 'duree', FILTER_SANITIZE_SPECIAL_CHARS);
        $synopsis = filter_input(INPUT_POST, 'synopsis', FILTER_SANITIZE_SPECIAL_CHARS);
        $affiche = filter_input(INPUT_POST, 'affiche', FILTER_SANITIZE_SPECIAL_CHARS);
        $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_SPECIAL_CHARS);
        $idRealisateur = filter_input(INPUT_POST, 'realisateur', FILTER_SANITIZE_SPECIAL_CHARS);

        //$genresList = [];

        $genresList = filter_input(INPUT_POST, "genres", FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        // var_dump($genresList);

        // foreach ($_POST as $key => $value) {
        //     if (substr($key, 0, 5) == 'Genre') {
        //         $genresList[] = $value;
        //     }
        // }

        // var_dump($genresList);

        // echo $titre 
        //      ." " .$ dateSortie
        //      ." " .$duree
        //      ." " .$synopsis
        //      ." " .$affiche
        //      ." " .$note
        //      ." " .$idRealisateur;
        // $sexe = filter_input(INPUT_POST, 'realisateur', FILTER_SANITIZE_SPECIAL_CHARS);

        // if($titre && )

        try {
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("INSERT INTO film(titre,dateSortie,duree,synopsis,affiche,note,id_realisateur) 
                                      VALUES(:titre,:dateSortie,:duree,:synopsis,:affiche,:note,:realisateur)");
            $requete->execute([
                "titre"       => $titre,
                "dateSortie"  => $dateSortie,
                "duree"       => $duree,
                "synopsis"    => $synopsis,
                "affiche"     => $affiche,
                "note"        => $note,
                "realisateur" => $idRealisateur
            ]);

            $film =     $pdo->lastInsertId();

            //insert genre det 
            foreach ($genresList as $genre) {
                $requete = $pdo->prepare("INSERT INTO genre_det(id_genre,id_film) 
                                      VALUES(:genre,:film)");
                $requete->execute([
                    "genre"       => $genre,
                    "film"  => $film,
                ]);
            }
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }





        //return la form
        $this->formAjouteFilm();
        // $realisateursList = $this->getRealisateursList(); 
        // require 'view/form/formAjouteFilm.php';
    }

    public function getCastingByKey($film, $acteur, $role)
    {
        $casting = null;
        try {
            $pdo = Connect::seConnecter();
            $requete = $pdo->prepare("select * from  casting where id_role =:role and id_film =:film and id_acteur =:acteur");
            $requete->execute([
                "film" => $film,
                "acteur" => $acteur,
                "role" => $role
            ]);
            $casting = $requete->fetchAll();
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
        return $casting;
    }

    public function addCasting()
    {
        $film = filter_input(INPUT_POST, 'film', FILTER_SANITIZE_SPECIAL_CHARS);
        $acteur = filter_input(INPUT_POST, 'acteur', FILTER_SANITIZE_SPECIAL_CHARS);
        $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_SPECIAL_CHARS);

        //control if already exist 
        $casting = $this->getCastingByKey($film, $acteur, $role);
        if ($film != "" && $acteur != "" && $role != "") {

            if ($casting == null) {

                try {
                    $pdo = Connect::seConnecter();
                    $requete = $pdo->prepare("INSERT INTO casting(id_film,id_acteur,id_role) VALUES(:film,:acteur,:role)");
                    $requete->execute([
                        "film" => $film,
                        "acteur" => $acteur,
                        "role" => $role
                    ]);

                    $_SESSION['returnmsg'] = " le Casting est Bien ajouter  !";
                    $_SESSION['class'] = "has-success";
                } catch (\PDOException $e) {
                    die('Erreur : ' . $e->getMessage());
                }
            } else {

                $_SESSION['returnmsg'] = " le Casting est Deja existant !";
                $_SESSION['class'] = "has-faild";
            }
        } else {
            $_SESSION['returnmsg'] = "une ou plusieurs valeurs sont vides !";
            $_SESSION['class'] = "has-faild";
        }

        if (isset($_SESSION['returnmsg'])) {
?>

            <script>
                var cls = '<?= $_SESSION['class'] ?>';
                var msg = '<?= $_SESSION['returnmsg'] ?>';


                setMessage(cls, msg)
            </script>


<?php

            $this->formAjouteCasting();
            //return la form 
            //require 'view/form/formAjouteCasting.php';



        }

        unset($_SESSION['returnmsg']);
        unset($_SESSION['class']);
    }
}
