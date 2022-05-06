<?php

namespace App\view;

/**
 * Class View
 * 
 * contient les éléments de la vue
 */
class View
{
    /**
     * @var array $parts le tableau des parties de HTML qui pourront être utilisés
     */
    protected $parts;
    /**
     * @var string $template le nom du fichier servant de squelette HTML à la page
     */
    protected $template;

    public function __construct($template, $parts = array())
    {
        $this->template = $template;
        $this->parts = $parts;
    }


    /**
     * ajoute une partie à la vue
     * @param  string $key
     * @param  string $content
     */
    public function setPart($key, $content)
    {
        $this->parts[$key] = $content;
    }

    /**
     * getter des parties de la vue
     * @param  string $key
     * @return string
     */
    public function getPart($key)
    {
        if (isset($this->parts[$key])) {
            return $this->parts[$key];
        } else {
            return null;
        }
    }

    /**
     * initialise le menu
     */
    public function setMenu()
    {
        $menu[] = array(
            "link" => "",
            "text" => "Accueil",
            "class" => "menu-item",
        );
        $menu[] = array(
            "link" => "?o=auth&a=inscription",
            "text" => "Inscription",
            "class" => "menu-item right",
        );
        $menu[] = array(
            "link" => "?o=auth&a=connexion",
            "text" => "Connexion",
            "class" => "menu-item right",
        );
        $this->setPart('menu', $menu);
    }

    /**
     * génère la vue avec les contenus en remplissant les zones définies
     * @return string
     */
    public function render()
    {
        $title = $this->getPart('title');
        $content = $this->getPart('content');
        $menu = $this->getPart('menu');

        ob_start();
        include($this->template);
        $data = ob_get_contents();
        ob_end_clean();

        return $data;
    }
}
