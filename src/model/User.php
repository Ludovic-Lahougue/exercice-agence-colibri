<?php

namespace App\model;

/**
 * Class User
 * Intéragit avec la base de données pour les données des utilisateurs
 */
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * vérifie si la base de données est connectée.
     * @return boolean
     */
    public function isAvailable()
    {
        $error = $this->db->getError();
        return $error == null;
    }

    /**
     * cherche un utilisateur avec son adresse mail
     * @param string $email
     * @return boolean
     */
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE user_mail = :email');
        $this->db->bind(':email', $email);
        $this->db->fetch();
        return $this->db->rowCount() > 0;
    }

    /**
     * vérifie les informations de connexion
     * @param  string $email
     * @param  string $password
     * @return void
     */
    public function connexion($email, $password)
    {
        $this->db->query('SELECT user_password FROM users WHERE user_mail = :email');
        $this->db->bind(':email', $email);
        $res = $this->db->fetch();
        if (!password_verify($password, $res["user_password"]))
            return "mdp";
    }

    /**
     * insère un nouvel utilisateur dans la base de données
     * @param  string $email
     * @param  string $password
     * @return boolean
     */
    public function inscription($email, $password)
    {
        $this->db->query('INSERT INTO users (user_mail, user_password) VALUES(:email, :password)');
        $this->db->bind(':email', $email);
        $this->db->bind(':password', password_hash($password, PASSWORD_DEFAULT));
        return $this->db->execute();
    }
}
