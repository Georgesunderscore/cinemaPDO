<?php
namespace Model;


abstract class Connect
{

    const HOST = "localhost";
    const DB = "cinemageorges";
    const USER = "root";
    const PASS = "";

    public static function seConnecter()
    {
        try {           // \class native de php
            return new \PDO(
                "mysql:host=" . self::HOST . ";dbname=" . self::DB . ";charset=utf8",
                self::USER,
                self::PASS,
                //pour activer les erreurs
                [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION],
            );
        } catch (\PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
