<?php
namespace Blog\Models;

class Users
{
    private $id;
    private $username;
    private $usertype;
    private $contact;
    private $email;
    private $passwd;
    private $confirmTkn;



    public function __construct($username, $passwd, $usertype, $email, $contact)
    {
        $this->username=$username;
        $this->usertype=$usertype;
        $this->contact=$contact;
        $this->passwd=$passwd;
        $this->email=$email;
    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getUsertype()
    {
        return $this->usertype;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @return mixed
     */
    public function getPasswd()
    {
        return $this->passwd;
    }

    /**
     * @return mixed
     */
    public function getConfirmTkn()
    {
        return $this->confirmTkn;
    }


    public function setUsername($username)
    {
        $this->username = $username;
    }




    /**
     * @return mixed
     */
    public function setUsertype($usertype)
    {
        $this->usertype = $usertype;
    }

    /**
     * @return mixed
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return mixed
     */
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;
    }







}