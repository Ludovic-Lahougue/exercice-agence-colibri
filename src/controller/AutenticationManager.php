<?php

namespace App\controller;


/**
 * Class AutenticationManager
 * gère la vérification des champs des formulaires
 */
class AutenticationManager
{
    private static $instance;

    /**
     * singleton
     * @return void
     */
    static function getInstance()
    {
        if (!isset($instance))
            $instance = new AutenticationManager();
        return $instance;
    }

    /**
     * vérifie la connexion d'un utilisateur
     * @param  string $login
     * @param  string $password
     * @return boolean
     */
    public function connexion($login, $password)
    {
        return false;
    }

    /**
     * vérifie l'inscription d'un utilisateur
     * @param  string $login
     * @param  string $password
     * @return string
     */
    public function inscription($login, $password)
    {
        return null;
    }

    /**
     * déconnecte l'utilisateur
     */
    public function deconnexion()
    {
        unset($_SESSION['current_user']);
    }

    /**
     * vérifie si un utilisateur est connecté
     * @return boolean
     */
    public function isLogged()
    {
        //return array_key_exists('current_user', $_SESSION);
        return true;
    }
}
