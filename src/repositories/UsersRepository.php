<?php
/**
 * Class UsersRepository
 */

namespace Blog\repositories;

use Blog\Models\Users;
use Blog\config\Config;

class UsersRepository
{
    private $db;

    /**
     * UsersRepository constructor.
     */
    public function __construct()
    {
        $this->db=Config::getCdb();
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

        if($data)
        {
            return  new Users($data);
        }

    }



    /**
     * @param $id
     * @return Users
     */
    public function getUserById($id)
    {

        $rec=$this->db->query("SELECT * FROM users WHERE id = ?", [$id]);


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
        [$guest->getUsername(), $guest->getFirstname(), $guest->getLastname(), $password, $guest->getEmail(), $guest->getContact(), $guest->getUsertype(), $guest->getCreatedate(), $guest->getUpdatedate()]);
    }


    /**
     * @param Users $guest
     */
    public function editprofil(Users $guest)
    {

        $this->db->query("UPDATE users SET username=?,  firstname=?,  lastname=?, email=?, contact=?, updatedate=?",
            [$guest->getUsername(), $guest->getFirstname(), $guest->getLastname(), $guest->getEmail(), $guest->getContact(), $guest->getUpdatedate()]);
    }


}