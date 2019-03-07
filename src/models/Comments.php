<?php
/**
 * Class Comments
 */

namespace Blog\Models;

class Comments
{
    /** @var int */
    private $id;
    /** @var string */
    private $content;
    /** @var \DateTime */
    private $createdate;
    /** @var \DateTime */
    private $updatedate;

    /** @var bool */
    private $valid;
    /** @var string */
    private $createuser;
    /** @var string */
    private $updateuser;
    /** @var string */
    private $validuser;

    /**
     * Post constructor.
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
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }


    /**
     * @return \DateTime
     */
    public function getUpdatedate()
    {
        return $this->updatedate;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedate()
    {
        return $this->createdate;
    }



    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->valid;
    }


    /**
     * @return string
     */
    public function getCreateuser()
    {
        return $this->createuser;
    }



    /**
     * @return string
     */
    public function getUpdateuser()
    {
        return $this->updateuser;
    }


    /**
     * @return string
     */
    public function getValiduser()
    {
        return $this->validuser;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
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
     * @param bool $valid
     */
    public function setValid($valid)
    {
        $this->valid = $valid;
    }

    /**
     * @param string $createuser
     */
    public function setCreateuser($createuser)
    {
        $this->createuser = $createuser;
    }

    /**
     * @param string $updateuser
     */
    public function setUpdateuser($updateuser)
    {
        $this->updateuser = $updateuser;
    }

    /**
     * @param string $validuser
     */
    public function setValiduser($validuser)
    {
        $this->validuser = $validuser;
    }


}