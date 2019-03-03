<?php
namespace Blog\authentification;

use Blog\controller\IndexController;

class Session extends IndexController
{
    //Definitions des types de variables de session
    public static function setFlash($message)
    {
        $_SESSION['flash']=$message;
    }

    public static function setUserlog($message)
    {
        $_SESSION['userlog']=$message;
    }

    public static function setUsername($message)
    {
        $_SESSION['username']=$message;
    }


    public static function setNotification($message)
    {
        $_SESSION['notice']=$message;
    }

    public static function setPost($message)
    {
        $_SESSION['post']=$message;
    }



// réinitialisation d'une variable de session
    public static function resetFlash()
    {
        $_SESSION['flash']=null;
    }

    // Session Close
    public static function closeSession()
    {
        session_destroy();
    }


}