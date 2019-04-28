<?php
/**
 * Class LoginController
 */

namespace Blog\controller ;

use Blog\Models\Users;

use Blog\repositories\UsersRepository;
use Blog\validation;
use Blog\authentification;

class LoginController extends IndexController
{

    /**
     *  http_method=post
     * creating a user
     */
    public function register()
    {

        //Clear session information
        authentification\Session::resetFlash();

        if (!empty($_POST)) {
        //Retrieving user-submitted data
            $passsec=htmlspecialchars($_POST['passwd']);
            $usernamesecu=htmlspecialchars($_POST['username']);
            $firstnamesecu=htmlspecialchars($_POST['firstname']);
            $lastnamesecu=htmlspecialchars($_POST['lastname']);
            $emailsec=htmlspecialchars($_POST['email']);
            $contactsec=htmlspecialchars($_POST['contact']);
            $datecr=new \Datetime();
            $datecreatesecu=$datecr->format('Y-m-d H:i:s');


        //validation of the data sent by the user

            $valid = new validation\Errors($_POST);
        // Email validation
            if ($valid->isValidator()) {
                $valid->isEmail('email', 'Cet email n\'est pas valide');
                authentification\Session::setFlash('Cet email n\'est pas valide');
                header("Location:index.php?key=register");
            }
        //confirmation password validation
            if ($valid->isValidator()) {
                $valid->isConfirmed('passwd', 'Les mots de passe ne sont pas identiques');
                authentification\Session::setFlash('Les mots de passe ne sont pas identiques');
                header("Location:index.php?key=register");
            }
         //username availability
            if ($valid->isValidator()) {
                $valid->isUniq('users', 'username', 'username', 'Ce Pseudo est dejà utilisé par un autre utilisateur');
                authentification\Session::setFlash('Ce Pseudo est dejà utilisé par un autre utilisateur');
                header("Location:index.php?key=register");
            }
        //email availability
            if ($valid->isValidator()) {
                $valid->isUniq('users', 'email', 'email', 'Cet Email  est dejà utilisé par un autre utilisateur');
                authentification\Session::setFlash(' Email  dejà utilisé par utilisateur');
                header("Location:index.php?key=register");
            }
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


                $insertuser=new UsersRepository();
                $insertuser->register($userarray);
                authentification\Session::setFlash('Utilisateur crée avec succès !!');
                header("Location:index.php?key=register");
            }
        }
        echo $this->twig->render('register.html.twig');
    }



    /**
     *  http_method=post
     * creating a user admin
     */
    public function registeradmin()
    {

        //Clear session information
        authentification\Session::resetFlash();

        if (!empty($_POST)) {
            //Retrieving user-submitted data
            $passsec=htmlspecialchars($_POST['passwd']);
            $usernamesecu=htmlspecialchars($_POST['username']);
            $firstnamesecu=htmlspecialchars($_POST['firstname']);
            $lastnamesecu=htmlspecialchars($_POST['lastname']);
            $emailsec=htmlspecialchars($_POST['email']);
            $contactsec=htmlspecialchars($_POST['contact']);
            $datecr=new \Datetime();
            $datecreatesecu=$datecr->format('Y-m-d H:i:s');


            //validation of the data sent by the user

            $valid = new validation\Errors($_POST);
            // Email validation
            if ($valid->isValidator()) {
                $valid->isEmail('email', 'Cet email n\'est pas valide');
                authentification\Session::setFlash('Cet email n\'est pas valide');
                header("Location:index.php?key=registeradmin");
            }
            //confirmation password validation
            if ($valid->isValidator()) {
                $valid->isConfirmed('passwd', 'Les mots de passe ne sont pas identiques');
                authentification\Session::setFlash('Les mots de passe ne sont pas identiques');
                header("Location:index.php?key=registeradmin");
            }
            //username availability
            if ($valid->isValidator()) {
                $valid->isUniq('users', 'username', 'username', 'Ce Pseudo est dejà utilisé par un autre utilisateur');
                authentification\Session::setFlash('Ce Pseudo est dejà utilisé par un autre utilisateur');
                header("Location:index.php?key=registeradmin");
            }
            //email availability
            if ($valid->isValidator()) {
                $valid->isUniq('users', 'email', 'email', 'Cet Email  est dejà utilisé par un autre utilisateur');
                authentification\Session::setFlash(' Email  dejà utilisé par utilisateur');
                header("Location:index.php?key=registeradmin");
            }
            if ($valid->isValidator()) {
                $userarray = new Users(array(
                    'username' => $usernamesecu,
                    'firstname' => $firstnamesecu,
                    'lastname' => $lastnamesecu,
                    'passwd' => $passsec,
                    'email' => $emailsec,
                    'contact' => $contactsec,
                    'usertype' => 'administrator',
                    'createdate' => $datecreatesecu,
                    'updatedate' => $datecreatesecu,
                ));


                $insertuser=new UsersRepository();
                $insertuser->register($userarray);
                authentification\Session::setFlash('Utilisateur crée avec succès !!');
                header("Location:index.php?key=registeradmin");
            }
        }
        echo $this->twig->render('registeradmin.html.twig');
    }




    /**
     *  http_method=post
     * user login
     */

    public function login()
    {

        //Clear session information
        authentification\Session::resetFlash();

        if (!empty($_POST)) {
            //Retrieving user-submitted data
            $passlog = htmlspecialchars($_POST['passwd']);
            $usernamelog = htmlspecialchars($_POST['username']);
            $userlogin = new UsersRepository();
            $loginus = $userlogin->getUserByUsername($usernamelog);

           // username and password validation and profile-based redirection
if($loginus){
      if (password_verify($passlog, $loginus->getPasswd())) {
          if ($loginus->getUsertype() == 'administrator') {
              authentification\Session::setUserlog($loginus->getId());
              authentification\Session::setUsername($usernamelog);
              authentification\Session::setTypeuser($loginus->getUsertype());
              header("Location:index.php?key=blogadmin");
          } else {
              authentification\Session::setUserlog($loginus->getId());
              authentification\Session::setUsername($usernamelog);
              authentification\Session::setTypeuser($loginus->getUsertype());
              header("Location:index.php?key=blogpost");
          }
      }
}
           else {
                authentification\Session::setFlash('Mot de passe ou login incorrect !!');

                header("Location:index.php?key=register");
            }
        }
    }

    /**
     *Logout
     */
    public function logout()
    {
        authentification\Session::closeSession();
        header("Location:index.php");
    }


    /**
     *  http_method=post
     * Edit Profil
     */
    public function editprofil($id)
    {
        $puser = new UsersRepository();
        $userprofil=$puser->getUserById($id);
        //Clear session information
        authentification\Session::resetFlash();

        if (!empty($_POST)) {
            //Retrieving user-submitted data

            $usernameupus=htmlspecialchars($_POST['username']);
            $firstnameupus=htmlspecialchars($_POST['firstname']);
            $lastnameupus=htmlspecialchars($_POST['lastname']);
            $emailupus=htmlspecialchars($_POST['email']);
            $contactupus=htmlspecialchars($_POST['contact']);
            $dateupus=new \Datetime();
            $dateupduser=$dateupus->format('Y-m-d H:i:s');


            //validation of the data sent by the user

            $valid = new validation\Errors($_POST);

            if ($valid->isValidator()) {
                $userupdarray = new Users(array(
                    'username' => $usernameupus,
                    'firstname' => $firstnameupus,
                    'lastname' => $lastnameupus,

                    'email' => $emailupus,
                    'contact' => $contactupus,


                    'updatedate' => $dateupduser,
                ));


                $updateuser=new UsersRepository();
                $updateuser->editprofil($userupdarray);
                authentification\Session::setFlash('Profil Modifié avec succès !!');
                header("Location:index.php?key=profil&&id=$id");
            }
        }
        echo $this->twig->render('editprofile.html.twig', array('userprofil'=>$userprofil));
    }


}
