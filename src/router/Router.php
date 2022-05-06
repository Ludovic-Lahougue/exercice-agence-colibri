<?php

namespace App\router;

use \Exception;


/**
 * Class Router
 * 
 * effectue les actions associées à l'URL
 */
class Router
{

	protected $controllerClassName;
	protected $controllerAction;
	protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
		$this->parseRequest();
	}


	/**
	 * 	getter du nom de la classe du contrôleur
	 * @return string
	 */
	public function getControllerClassName()
	{
		return $this->controllerClassName;
	}

	/**
	 * 	getter du nom de l'action du contrôleur
	 * @return string
	 */
	public function getControllerAction()
	{
		return $this->controllerAction;
	}

	/**
	 * analyse les paramètres de l'URL pour choisir le contrôleur correspondant
	 */
	public function parseRequest()
	{
		$package = $this->request->getGetParam('o');
		switch ($package) {
			case 'auth':
				$this->controllerClassName = 'App\controller\AuthController';
				break;
			default:
				$this->controllerClassName = 'App\controller\AccueilController';
		}

		if (!class_exists($this->controllerClassName)) {
			throw new Exception("Classe {$this->controllerClassName} non existante");
		}

		$this->controllerAction = $this->request->getGetParam('a', 'defaultAction');
	}
}
