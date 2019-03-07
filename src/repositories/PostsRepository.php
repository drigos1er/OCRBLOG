<?php
/**
 * Class PostsRepository
 */

namespace Blog\repositories;

use Blog\Models\Posts;
use Blog\config\Config;

class PostsRepository
{
    private $db;

    /**
     * PostRepository constructor.
     */
    public function __construct()
    {
        $this->db=Config::getCdb();
    }


    /**
     * @return array
     */
    public function getallPublishPost()
    {

          $posts=[];
          $stmt = $this->db->query('SELECT * FROM posts where published=1 order by updatedate desc');
          $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        for ($i=0; $i< count($data); $i++) {
            $post = new Posts($data[$i]) ;
            array_push($posts, $post);
        }
        return $posts ;
    }





    public function getPostById($id)
    {

        $stmt = $this->db->query("SELECT * FROM posts WHERE id=?", [$id]);

        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        return  new Posts($data);
    }



}