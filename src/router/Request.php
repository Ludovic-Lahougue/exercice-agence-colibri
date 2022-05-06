<?php

namespace App\router;

/**
 * Class Request
 * 
 * gère les données GET, POST
 */
class Request
{
    private $get;
    private $post;

    public function __construct($get, $post)
    {
        $this->get = $get;
        $this->post = $post;
    }

    /**
     * @param $key la clé à chercher dans GET
     * @param $default la valeur à renvoyer si $key n'existe pas
     * @return string
     */
    public function getGetParam($key, $default = null)
    {
        if (!isset($this->get[$key])) {
            return $default;
        }
        return $this->get[$key];
    }

    /**
     * @param $key la clé à chercher dans POST
     * @param $default la valeur à renvoyer si $key n'existe pas
     * @return string
     */
    public function getPostParam($key, $default = null)
    {
        if (!isset($this->post[$key])) {
            return $default;
        }
        return $this->post[$key];
    }

    /**
     * obtenir tous les paramètres POST
     * @return array
     */
    public function getAllPostParams()
    {
        return $this->post;
    }
}
