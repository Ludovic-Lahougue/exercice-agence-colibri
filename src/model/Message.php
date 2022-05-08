<?php

namespace App\model;

/**
 * Class message
 * Intéragit avec la base de données pour enregistrer des messages
 */
class Message
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
     * insère un message dans la base de données
     * @param  string $nom
     * @param  string $prenom
     * @param  string $email
     * @param  string $message
     * @return boolean
     */
    public function newMessage($nom, $prenom, $email, $message)
    {
        $this->db->query('INSERT INTO messages (message_prenom, message_nom, message_email, message) VALUES(:prenom, :nom, :email, :message)');
        $this->db->bind(':prenom', $prenom);
        $this->db->bind(':nom', $nom);
        $this->db->bind(':email', $email);
        $this->db->bind(':message', $message);
        return $this->db->execute();
    }
}
