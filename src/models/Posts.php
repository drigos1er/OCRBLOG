<?php
/**
 * Class Posts
 */
namespace Blog\Models;

class Posts
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $chapo;

    /**
     * @var string
     */
    private $content;
    /** @var \DateTime */
    private $createdate;

    /** @var \DateTime */
    private $updatedate;

    /** @var \DateTime */
    private $publishdate;

    /** @var bool */
    private $published;
    /**
     * @var string
     */
    private $createuser;
    /**
     * @var string
     */
    private $updateuser;
    /**
     * @var string
     */
    private $publishuser;


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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getChapo()
    {
        return $this->chapo;
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
     * @return \DateTime
     */
    public function getPublishdate()
    {
        return $this->publishdate;
    }




    /**
     * @return bool
     */
    public function isPublished()
    {
        return $this->published;
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
    public function getPublishuser()
    {
        return $this->publishuser;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param string $chapo
     */
    public function setChapo($chapo)
    {
        $this->chapo = $chapo;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @param \DateTime $createdate
     */
    public function setCreatedate($createdate)
    {
        $this->createdate = $createdate;
    }

    /**
     * @param \DateTime $updatedate
     */
    public function setUpdatedate($updatedate)
    {
        $this->updatedate = $updatedate;
    }

    /**
     * @param bool $published
     */
    public function setPublished($published)
    {
        $this->published = $published;
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
     * @param string $publishuser
     */
    public function setPublishuser($publishuser)
    {
        $this->publishuser = $publishuser;
    }


}