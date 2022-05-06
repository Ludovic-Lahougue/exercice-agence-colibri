<?php

namespace App\controller;

use App\controller\AutenticationManager;
use App\router\{Request, Response};
use App\view\View;
use \Exception;

/**
 * Class ConnexionController
 * gère l'inscription et la connexion
 */
class AuthController
{
    protected $request;
    protected $response;
    protected $auth;
    protected $view;

    public function __construct(Request $request, Response $response, AutenticationManager $auth)
    {
        $this->request = $request;
        $this->response = $response;
        $this->auth = $auth;
    }

    public function getView()
    {
        return $this->view;
    }

    /**
     * exécuter le contrôleur de classe pour effectuer l'action $action
     * @param $action
     */
    public function execute($action)
    {
        if (method_exists($this, $action)) {
            $this->$action();
        } else {
            throw new Exception("Action {$action} non trouvée");
        }
    }

    /**
     * définit l'action par défaut
     *
     * @return void
     */
    public function defaultAction()
    {
        return $this->connexion();
    }

    /**
     * gère la déconnexion
     */
    public function deconnexion()
    {
        $this->view = new View('templates/auth/connexion.php');
        if ($this->auth->isLogged()) {
            $this->auth->deconnexion();
            $this->response->addHeader('Location: /');
        }
    }

    /**
     * gère la connexion
     */
    public function connexion()
    {
        if ($this->auth->isLogged()) {
            $this->view = new View('templates/home.php');
            $this->response->addHeader('Location: /');
            return;
        }
        $this->view = new View('templates/auth/connexion.php');
        $this->view->setMenu($this->auth->isLogged());
        $content = array();

        $mail = $this->request->getPostParam('mail');
        $password = $this->request->getPostParam('password');
        if ($mail != null && $password != null) {
            $succes = $this->auth->connexion($mail, $password);
            if (!$succes) {
                $content["error"] = true;
                $content["mail"] = $mail;
            } else $this->response->addHeader('Location: /');
        }
        $this->view->setPart('content', $content);
    }

    /**
     * gère l'inscription
     */
    public function inscription()
    {
        if ($this->auth->isLogged()) {
            $this->view = new View('templates/home.php');
            $this->response->addHeader('Location: /');
            return;
        }
        $this->view = new View('templates/auth/inscription.php');
        $this->view->setMenu($this->auth->isLogged());
        $content = array();

        $mail = $this->request->getPostParam('mail');
        $password = $this->request->getPostParam('password');
        if ($mail != null && $password != null) {
            $error = $this->auth->inscription($mail, $password);
            if ($error != null) {
                if ($error != "mail")
                    unset($content["mail"]);
                $content["error"] = $error;
            } else $this->response->addHeader('Location: /');
        }
        $this->view->setPart('content', $content);
    }
}
