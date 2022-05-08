<?php

namespace App\controller;

use App\model\User;

/**
 * Class AutenticationManager
 * gère la vérification des champs des formulaires
 */
class AuthenticationManager
{
    private static $instance = null;
    private $userModel;

    private function __construct()
    {
        $this->userModel = new User;
    }

    /**
     * singleton
     * @return void
     */
    public static function getInstance()
    {
        if (empty(self::$instance))
            self::$instance = new AuthenticationManager;
        return self::$instance;
    }

    /**
     * vérifie la connexion d'un utilisateur
     * @param  string $email
     * @param  string $password
     * @return boolean
     */
    public function connexion($email, $password)
    {
        if (!$this->userModel->isAvailable())
            return "bdd";
        if (!$this->userModel->findUserByEmail($email))
            return "mail";
        $err = $this->userModel->connexion($email, $password);
        if ($err != null)
            return $err;
        $_SESSION['current_user'] = $email;
    }

    /**
     * vérifie l'inscription d'un utilisateur
     * @param  string $email
     * @param  string $password
     * @return string
     */
    public function inscription($email, $password)
    {
        if (!$this->userModel->isAvailable())
            return "bdd";
        if ($this->userModel->findUserByEmail($email))
            return "mail";
        if (!$this->userModel->inscription($email, $password))
            return "bdd";
        $_SESSION['current_user'] = $email;
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
        return array_key_exists('current_user', $_SESSION);
    }
}
