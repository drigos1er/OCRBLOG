<?php
/**
 * Class Errors
 */

namespace Blog\validation;

use Blog\config\Config;
use Blog\repositories\UsersRepository;

class Errors
{

    private $info;
    private $errors=[];

    /**
     * Errors constructor.
     * @param $info
     */
    public function __construct($info)
    {
        $this->info=$info;
    }



    /**
     * @param $field
     */
    public function getField($field)
    {

        if (!isset($this->info[$field])) {
            return null ;
        }
        return $this->info[$field];
    }


    /**
     * @param $table
     * @param $chp
     * @param $field
     * @param $errorMsg
     */
    public function isUniq($table, $chp, $field, $errorMsg)
    {
        $rec= new UsersRepository(Config::getCdb());

        $result=$rec->getUserByField($table, $chp, $this->getField($field));

        if ($result) {
                $this->errors[$field]=$errorMsg;
        }
    }


    /**
     * @param $field
     * @param $errorMsg
     */
    public function isEmail($field, $errorMsg)
    {

        if (!filter_var($this->getField($field), FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field]=$errorMsg;
        }
    }


    /**
     * @param $field
     * @param $errorMsg
     */
    public function isConfirmed($field, $errorMsg)
    {

        if (empty($this->getField($field))|| $this->getField($field) != $this->getField($field.'_confirm')) {
            $this->errors[$field]=$errorMsg;
        }
    }

    /**
     * @return bool
     */
    public function isValidator()
    {
         return empty($this->errors);
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}