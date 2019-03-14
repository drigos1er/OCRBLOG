<?php
/**
 * Created by PhpStorm.
 * User: drigo
 * Date: 14/03/2019
 * Time: 16:43
 */

namespace Blog\controller;

use Blog\authentification;
use Blog\validation;

class FormContactController extends IndexController
{



    public function sendmail()
    {
        //Clear session information
        authentification\Session::resetFlash();

        if (!empty($_POST)) {
            //Retrieving user-submitted data
            $name=htmlspecialchars($_POST['name']);
            $email=htmlspecialchars($_POST['email']);
            $subject=htmlspecialchars($_POST['subject']);
            $message=htmlspecialchars($_POST['message']);
            $emailinfo='drigos1er@yahoo.fr';
            //validation of the data sent by the user

            $valid = new validation\Errors($_POST);
            // Email validation
            if ($valid->isValidator()) {
                $valid->isEmail('email', 'Cet email n\'est pas valide');
                authentification\Session::setFlash('Cet email n\'est pas valide');
                header("Location:index.php?key=formcontact");
            }

            if ($valid->isValidator()) {
                $contenu_message = "Nom : ".$name."\nMail : ".$mail."\nSujet : ".$subject."\nMessage : ".$message;
                $entete = "From: ".$name." <".$email."> \nContent-Type: text/html; charset=iso-8859-1";
                mail($emailinfo, $subject, $contenu_message, $entete);

                authentification\Session::setFlash('Votre message a été envoyé avec succès!!');
                header("Location:index.php?key=formcontact");
            }
        }
        echo $this->twig->render('formcontact.html.twig');



    }






}