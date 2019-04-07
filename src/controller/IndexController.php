<?php
/**
 * Class IndexController
 */

namespace Blog\controller;

use \Twig_Loader_Filesystem;

use \Twig_Environment;

class IndexController
{

    protected $twig;

    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        session_start();

        $loader = new Twig_Loader_Filesystem('src/view');
        $this->twig = new Twig_Environment($loader, array('debug' => true));
        $this->twig->addGlobal('session', $_SESSION);
    }
}


