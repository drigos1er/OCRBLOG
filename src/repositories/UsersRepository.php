<?php
/**
 * Class UsersRepository
 */

namespace Blog\repositories;

use Blog\authentification\StrFunct;
use Blog\Models\Users;

class UsersRepository
{
    private $db;

    /**
     * UsersRepository constructor.
     * @param $db
     */
    public function __construct($db)
    {
        $this->db=$db;
    }


    /**
     * @param $table
     * @param $chp
     * @param $id
     * @return array
     */
    public function getUserByField($table, $chp, $id)
    {

        $rec=$this->db->query("SELECT * FROM $table WHERE $chp = ?", [$id]);


        $data = $rec->fetch(\PDO::FETCH_ASSOC);

        return $data;
    }


    /**
     * @param $username
     * @return Users
     */
    public function getUserByUsername($username)
    {

        $rec=$this->db->query("SELECT * FROM users WHERE username = ?", [$username]);


        $data = $rec->fetch(\PDO::FETCH_ASSOC);

        return  new Users($data);
    }




    /**
     * @param Users $guest
     */
    public function register(Users $guest)
    {
        $password=password_hash($guest->getPasswd(), PASSWORD_BCRYPT);
        $this->db->query("INSERT INTO users SET username=?,  firstname=?,  lastname=?, passwd=?, email=?, contact=?, usertype=?, createdate=?, updatedate=?",
        [$guest->getUsername(),$guest->getFirstname(), $guest->getLastname(), $password, $guest->getEmail(), $guest->getContact(), $guest->getUsertype(),$guest->getCreatedate(),$guest->getUpdatedate()]);
    }
}