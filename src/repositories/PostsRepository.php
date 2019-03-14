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


    /**
     * @return array
     */
    public function getallPost()
    {
        $posts=[];

        $stmt = $this->db->query('SELECT * FROM posts   order by updatedate desc');
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        for ($i=0; $i< count($data); $i++) {
            $post = new Posts($data[$i]) ;
            array_push($posts, $post);
        }
        return $posts ;
    }





    /**
     * @param $id
     * @return Posts
     */
    public function getPostById($id)
    {

        $stmt = $this->db->query("SELECT * FROM posts WHERE id=?", [$id]);

        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        return  new Posts($data);
    }


    /**
     * @param Posts $posts
     */
    public function addPost(Posts $posts)
    {
        $this->db->query("INSERT INTO posts SET title=?, chapo=?, content=?, createdate=?, createuser=?, updatedate=?, updateuser=?", [$posts->getTitle(), $posts->getChapo(),
            $posts->getContent(), $posts->getCreatedate(), $posts->getCreateuser(), $posts->getUpdatedate(), $posts->getUpdateuser()]);
    }


    /**
     * @param Posts $posts
     */
    public function updatePost(Posts $posts)
    {
        $this->db->query("UPDATE posts SET title=?, chapo=?, content=?, updatedate=?, updateuser=? WHERE id=?", [$posts->getTitle(), $posts->getChapo(),
            $posts->getContent(), $posts->getUpdatedate(), $posts->getUpdateuser(), $posts->getId()]);
    }


    public function deletePost($id)
    {
        $this->db->query("DELETE FROM posts  WHERE id=?", [$id]);
    }

}