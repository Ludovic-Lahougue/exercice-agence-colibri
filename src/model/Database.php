<?php

namespace App\model;

use \PDO;
use \PDOException;

/**
 * Class Database
 * Gère la connexion et les requêtes à la base de données en utilisant PDO
 */
class Database
{
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPass = "root";
    private $dbName = "colibri";

    private $statement;
    private $dbHandler;
    private $error;

    public function __construct()
    {
        $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
        } catch (PDOException $e) {
            $this->error = "bdd";
        }
    }

    /**
     * Retourne l'erreur de la base de données
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * prépare la requête
     * @param  string $sql
     */
    public function query($sql)
    {
        $this->statement = $this->dbHandler->prepare($sql);
    }

    /**
     * insère le contenu d'une variable dans la requête
     * @param  string $parameter
     * @param  string $value
     * @param  mixed $type
     */
    public function bind($parameter, $value, $type = null)
    {
        switch (is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        $this->statement->bindValue($parameter, $value, $type);
    }

    /**
     * exécute la requête
     * @return boolean
     */
    public function execute()
    {
        return $this->statement->execute();
    }

    /**
     * retourne le résulat de la requête
     * @return array
     */
    public function fetch()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * retourne le nombre de lignes du résultat
     * @return int
     */
    public function rowCount()
    {
        return $this->statement->rowCount();
    }
}
