<?php
/**
 * Class Users
 */
namespace Blog\Models;

class Users
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $firstname;
    /**
     * @var string
     */
    private $lastname;
    /**
     * @var string
     */
    private $usertype;
    /**
     * @var string
     */
    private $contact;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $passwd;
    /**
     * @var  \DateTime
     */
    private $updatedate;
    /**
     * @var  \DateTime
     */
    private $createdate;


    /**
     * Users constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    /**
     * @param array $data
     */
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


    /**
     * @return int
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
    public function getFirstname()
    {
        return $this->firstname;
    }


    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
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
     * @return \DateTime
     */
    public function getCreatedate()
    {
        return $this->createdate;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedate()
    {
        return $this->updatedate;
    }



    /**
     * @param mixed $usertype
     */
    public function setUsertype($usertype)
    {

            $this->usertype = $usertype;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0) {
            $this->id = $id;
        }
    }

    /**
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        if (is_string($firstname)) {
            $this->firstname = $firstname;
        }
    }

    /**
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        if (is_string($lastname)) {
            $this->lastname = $lastname;
        }
    }

    /**
     * @param mixed $contact
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $passwd
     */
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;
    }

    /**
     * @param \DateTime $updatedate
     */
    public function setUpdatedate($updatedate)
    {
        $this->updatedate = $updatedate;
    }

    /**
     * @param \DateTime $createdate
     */
    public function setCreatedate($createdate)
    {
        $this->createdate = $createdate;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        if (is_string($username)) {
            $this->username = $username;
        }
    }


}