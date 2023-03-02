


<?php
class Connection
{
    private $_db;

    public function __construct()
    {
        try {
            $db = new PDO(
                'mysql:host=localhost;dbname=cinemageorges;charset=utf8',
                'root',
                '',
                //pour activer les erreurs
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
            );
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $this->_db = $db;
    }

    /**
     * Get the value of _db
     */
    public function getDb()
    {
        return $this->_db;
    }

    /**
     * Set the value of _db
     *
     * @return  self
     */
    // public function setDb($db)
    // {
    //     $this->_db = $db;

    //     return $this;
    // }
}
