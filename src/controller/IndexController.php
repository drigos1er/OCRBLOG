<?php
namespace Blog\controller;


use \Twig_Loader_Filesystem;

use \Twig_Environment;

class IndexController
{
  // Chargement de la Bibliothèque Twig
    protected $twig;

    public function __construct()
    {
        session_start();

        $loader = new Twig_Loader_Filesystem('src/view');
        $this->twig = new Twig_Environment($loader, array('debug' => true));

    }



}