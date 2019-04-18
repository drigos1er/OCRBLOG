<?php
/**
 * Class PostsRepository
 */

namespace Blog\repositories;

use Blog\Models\Posts;
use Blog\config\Config;

class PostsRepository
{
    private $_db;

    /**
     * PostRepository constructor.
     */
    public function __construct()
    {
        $this->_db=Config::getCdb();
    }


    /**
     * @return array
     */
    public function getallPublishPost()
    {

          $postspublish=[];
          $stmt = $this->_db->query('SELECT * FROM posts where published=1 order by updatedate desc');
          $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        for ($i=0; $i< count($data); $i++) {
            $postpublish = new Posts($data[$i]);
            array_push($postspublish, $postpublish);
        }
        return $postspublish ;
    }


    /**
     * @return array
     */
    public function getallPost()
    {
        $posts=[];

        $stmt = $this->_db->query('SELECT * FROM posts   order by updatedate desc');
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

        $stmt = $this->_db->query("SELECT * FROM posts WHERE id=?", [$id]);

        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        return  new Posts($data);
    }


    /**
     * @param Posts $posts
     */
    public function addPost(Posts $posts)
    {
        $pt=$posts->getTitle();
        $pc=$posts->getChapo();
        $pco=$posts->getContent();
        $pcd=$posts->getCreatedate();
        $pcu=$posts->getCreateuser();
        $pud=$posts->getUpdatedate();
        $pus=$posts->getUpdateuser();


        $this->_db->query("INSERT INTO posts SET title=?, chapo=?, content=?, createdate=?, createuser=?, updatedate=?, updateuser=?", [$pt, $pc, $pco, $pcd, $pcu, $pud, $pus]);
    }


    /**
     * @param Posts $posts
     */
    public function updatePost(Posts $posts)
    {
        $this->_db->query("UPDATE posts SET title=?, chapo=?, content=?, updatedate=?, updateuser=? WHERE id=?", [$posts->getTitle(), $posts->getChapo(),
            $posts->getContent(), $posts->getUpdatedate(), $posts->getUpdateuser(), $posts->getId()]);
    }


    /**
     * @param $id
     */
    public function deletePost($id)
    {
        $this->_db->query("DELETE FROM posts  WHERE id=?", [$id]);
    }


    /**
     * @param $id
     */
    public function publishPost($id)
    {
        $this->_db->query("UPDATE posts SET published=1 WHERE id=?", [$id]);
    }


    /**
     * @param $id
     */
    public function unpublishPost($id)
    {
        $this->_db->query("UPDATE posts SET published=0 WHERE id=?", [$id]);
    }

}
