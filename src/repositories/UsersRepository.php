<?php
namespace Blog\repositories;

use Blog\authentification\StrFunct;
use Blog\Models\Users;

class UsersRepository
{
    private $db;

    public function __construct($db)
    {
        $this->db=$db;
    }


    public function getUserByField($table, $chp, $id)
    {

        $rec=$this->db->query("SELECT * FROM $table WHERE $chp = ?", [$id]);


        $donnees = $rec->fetch(\PDO::FETCH_ASSOC);

        return $donnees;
    }


    public function getUserLogin($username, $passwd)
    {
        $record=$this->db->query("SELECT id FROM users WHERE username = ? and passwd=?", [$username,$passwd]);
        $resultat = $record->fetch(\PDO::FETCH_ASSOC);
        return $resultat;
    }



    public function register(Users $guest)
    {
        $password=password_hash($guest->getPasswd(), PASSWORD_BCRYPT);
        $this->db->query("INSERT INTO users SET username=?,  firstname=?,  lastname=?, passwd=?, email=?, contact=?, usertype=?, createdate=?, updatedate=?",
            [$guest->getUsername(),$guest->getFirstname(), $guest->getLastname(), $password, $guest->getEmail(), $guest->getContact(), $guest->getUsertype(),$guest->getCreatedate(),$guest->getUpdatedate()]);
    }
}