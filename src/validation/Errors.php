<?php
namespace Blog\validation;

use Blog\config\Config;
use Blog\repositories\UsersRepository;

class Errors
{

    private $info;
    private $errors=[];

    public function __construct($info)
    {
        $this->info=$info;
    }

// recuperation de la valeur du champssoumis
    public function getField($field)
    {

        if (!isset($this->info[$field])) {
            return null ;
        }
        return $this->info[$field];
    }


// verification de l'existence de la valeur d'un champs soumis
    public function isUniq($table, $chp, $field, $errorMsg)
    {
        $rec= new UsersRepository(Config::getCdb());

        $result=$rec->getUserByField($table, $chp, $this->getField($field));

        if ($result) {
                $this->errors[$field]=$errorMsg;
        }
    }

    // test de la validité de l'email
    public function isEmail($field, $errorMsg)
    {

        if (!filter_var($this->getField($field), FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field]=$errorMsg;
        }
    }

    // test conformité mot  de passe de confirmation
    public function isConfirmed($field, $errorMsg)
    {

        if (empty($this->getField($field))|| $this->getField($field) != $this->getField($field.'_confirm')) {
            $this->errors[$field]=$errorMsg;
        }
    }

    public function isValidator()
    {
         return empty($this->errors);
    }
// Retour de toutes les erreeurs
    public function getErrors()
    {
        return $this->errors;
    }
}