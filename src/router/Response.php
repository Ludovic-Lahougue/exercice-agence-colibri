<?php

namespace App\router;

/**
 * Class Response
 *
 * embryon de classe pour gérer la réponse HTTP
 */
class Response
{
    /**
     * liste des en-têtes HTTP
     * @var array
     */
    private $headers = array();

    /**
     * ajouter un en-tête à la liste
     * @param $headerValue
     */
    public function addHeader($headerValue)
    {
        $this->headers[] = $headerValue;
    }

    /**
     * envoie tous les headers au client
     */
    public function sendHeaders()
    {
        foreach ($this->headers as $header) {
            header($header);
        }
    }

    /**
     * envoi de la réponse au client
     * @param $content
     */
    public function send($content)
    {
        $this->sendHeaders();
        echo $content;
    }
}
