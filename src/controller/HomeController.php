<?php
/**
 * Class HomeController
 * Permet d'afficher la page d'accueil
 */
namespace Blog\controller;

class HomeController extends IndexController
{
  public function home()
    {

        echo $this->twig->render('home.html.twig');
    }

}
