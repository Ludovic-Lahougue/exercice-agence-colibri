<?php

namespace App\controller;

use App\router\Router;
use App\view\View;
use \Exception;


/**
 * Class FrontController
 * 
 * utilise le router pour définir la vue
 */
class FrontController
{
    /**
     * request et response
     */
    protected $request;
    protected $response;

    /**
     * constructeur de la classe
     */
    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * méthode pour lancer le contrôleur et exécuter l'action à faire
     */
    public function execute()
    {
        $view = null;
        try {
            // demander au Router la classe et l'action à exécuter
            $router = new Router($this->request);
            $className = $router->getControllerClassName();
            $action = $router->getControllerAction();

            // instancier le controleur de classe et exécuter l'action
            $controller = new $className($this->request, $this->response);
            $controller->execute($action);
            $view = $controller->getView();
        } catch (Exception $e) {
            $view = new View('templates/home.php');
            $view->setPart('title', 'Erreur');
            $content = $e->getMessage();
            $content .= "<div>" . nl2br($e->getTraceAsString()) . "</div>";
            $view->setPart('content', $content);
        }
        $content = $view->render();

        $this->response->send($content);
    }
}
