<?php

namespace app\controller;

use App\model\Message;
use App\router\{Request, Response};
use App\view\View;
use \Exception;


/**
 * Class FrontController
 * définit la vue de la page d'accueil
 */
class HomeController
{
    protected $request;
    protected $response;
    protected $auth;
    protected $view;
    protected $messageModel;

    public function __construct(Request $request, Response $response, AuthenticationManager $auth)
    {
        $this->request = $request;
        $this->response = $response;
        $this->auth = $auth;
        $this->messageModel = new Message;
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
     * @return void
     */
    public function defaultAction()
    {
        return $this->home();
    }

    /**
     * page d'accueil
     */
    public function home()
    {
        $this->view = new View('templates/home.php');
        $this->view->setMenu($this->auth->isLogged());
    }

    public function contact()
    {
        self::home();
        $prenom = $this->request->getPostParam('prenom');
        $nom = $this->request->getPostParam('nom');
        $mail = $this->request->getPostParam('mail');
        $message = $this->request->getPostParam('message');

        if ($this->messageModel->isAvailable() && !empty($prenom) && !empty($nom) && !empty($mail) && !empty($message))
            $this->messageModel->newMessage($prenom, $nom, $mail, $message);

        $this->response->addHeader('Location: /');
    }
}
