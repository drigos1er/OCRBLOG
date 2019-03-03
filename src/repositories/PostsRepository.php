<?php
/**
 * Class PostsRepository
 */

namespace Blog\repositories;

use Blog\Models\Posts;

class PostsRepository
{
    private $db;

    /**
     * PostRepository constructor.
     * @param $db
     */
    public function __construct($db)
    {
        $this->db=$db;
    }



    /**
     * @return mixed
     */
    public function getallPublishPost()
    {


        $stmt = $this->db->query('SELECT * FROM posts where published=1 order by updatedate desc');

        $data = $stmt->fetchAll(
            \PDO::FETCH_CLASS
        );
        return  $data;
    }








}