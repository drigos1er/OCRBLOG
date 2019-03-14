<?php
/**
 * Class CommentsRepository
 */
namespace Blog\repositories;

use Blog\config\Config;
use Blog\Models\Comments;

class CommentsRepository
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
     * all comments
     * @param $postid
     * @return array
     */
    public function getallComments($postid)
    {
        $comments=[];
        $stmt = $this->db->query("SELECT * FROM comments where postid=?  and valid=1 order by updatedate desc", [$postid]);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        for ($i=0; $i< count($data); $i++) {
            $comment = new Comments($data[$i]) ;
            array_push($comments, $comment);
        }
        return $comments ;
    }


    /**
     * @param Comments $comments
     */
    public function addComment(Comments $comments)
    {
        $this->db->query("INSERT INTO comments SET content=?, createdate=?, createuser=?, updatedate=?, updateuser=?, postid=?", [$comments->getContent(), $comments->getCreatedate(), $comments->getCreateuser(),$comments->getUpdatedate(),$comments->getUpdateuser(), $comments->getPostid()]);
    }




    public function getCommentsById($id)
    {

        $stmt = $this->db->query("SELECT * FROM comments WHERE id=?", [$id]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        return  new Comments($data);
    }





    public function updComment(Comments $comments)
    {
        $this->db->query("UPDATE comments SET content=?, updatedate=?, updateuser=? WHERE id=?", [$comments->getContent(), $comments->getUpdatedate(), $comments->getUpdateuser(), $comments->getId()]);
    }


    public function deleteComment($id)
    {
        $this->db->query("DELETE FROM comments  WHERE id=?", [$id]);
    }







}