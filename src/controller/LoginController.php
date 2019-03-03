<?php
/**
 * Class LoginController
 */

namespace Blog\controller ;

use Blog\config\Config;
use Blog\Models\Users;
use Blog\repositories\PostRepository;
use Blog\repositories\UsersRepository;
use Blog\validation;
use Blog\authentification;

class LoginController extends IndexController
{
    public function register()
    {

        //Fermeure de la session en cours
        authentification\Session::resetFlash();

        if (!empty($_POST)) {
        //Récuperation des données envoyés par l'utilisateur
            $passsec=htmlspecialchars($_POST['passwd']);
            $usernamesecu=htmlspecialchars($_POST['username']);
            $firstnamesecu=htmlspecialchars($_POST['firstname']);
            $lastnamesecu=htmlspecialchars($_POST['lastname']);
            $emailsec=htmlspecialchars($_POST['email']);
            $contactsec=htmlspecialchars($_POST['contact']);
            $datecr=new \Datetime();
            $datecreatesecu=$datecr->format('Y-m-d H:i:s');


        // Test et récuperation des erreurs des informations envoyée par l'utilisateur
            $db=Config::getCdb();
            $valid = new validation\Errors($_POST);
        /*// Test de validité de l'Email
            if ($valid->isValidator()) {
                $valid->isEmail('email', 'Cet email n\'est pas valide');
                authentification\Session::setFlash('Cet email n\'est pas valide');
                header("Location:index.php?key=register");
            }
        // Test de conformité du mot de passe de confirmation
            if ($valid->isValidator()) {
                $valid->isConfirmed('passwd', 'Les mots de passe ne sont pas identiques');
                authentification\Session::setFlash('Les mots de passe ne sont pas identiques');
                header("Location:index.php?key=register");
            }
         // Vérification de la disponibilité du nom d'utilisateur
            if ($valid->isValidator()) {
                $valid->isUniq('users', 'username', 'username', 'Ce Pseudo est dejà utilisé par un autre utilisateur');
                authentification\Session::setFlash('Ce Pseudo est dejà utilisé par un autre utilisateur');
                header("Location:index.php?key=register");
            }
        // Vérification de la disponibilité du l'adresse mail
            if ($valid->isValidator()) {
                $valid->isUniq('users', 'email', 'email', 'Cet Email  est dejà utilisé par un autre utilisateur');
                authentification\Session::setFlash(' Email  dejà utilisé par utilisateur');
                header("Location:index.php?key=register");
            }*/
            if ($valid->isValidator()) {
                $userarray = new Users(array(
                    'username' => $usernamesecu,
                    'firstname' => $firstnamesecu,
                    'lastname' => $lastnamesecu,
                    'passwd' => $passsec,
                    'email' => $emailsec,
                    'contact' => $contactsec,
                    'usertype' => 'guest',
                    'createdate' => $datecreatesecu,
                    'updatedate' => $datecreatesecu,
                ));


                $insertuser=new UsersRepository($db);
                $insertuser->register($userarray);
                authentification\Session::setFlash('Utilisateur crée avec succès !!');
                header("Location:index.php?key=register");
            }
        }
        echo $this->twig->render('register.html.twig');
    }













}