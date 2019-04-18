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
     * All comments
     *
     * @param $postid
     * @return array
     */
    public function getallComments($pid)
    {
        $comments=[];
        $stmt = $this->db->query("SELECT * FROM comments where postid=?  and valid=1 order by updatedate desc", [$pid]);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        for ($i=0; $i< count($data); $i++) {
            $comment = new Comments($data[$i]);
            array_push($comments, $comment);
        }
        return $comments ;
    }



    /**
     *  All comments
     *  @param $postid
     *  @return array
     */
    public function getallCommentsadmin($postid)
    {
        $commentsadmin=[];
        $stmt = $this->db->query("SELECT * FROM comments where postid=?   order by updatedate desc", [$postid]);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        for ($i=0; $i< count($data); $i++) {
            $commentadmin = new Comments($data[$i]);
            array_push($commentsadmin, $commentadmin);
        }
        return $commentsadmin ;
    }




    /**
     * @param Comments $comments
     */
    public function addComment(Comments $comments)
    {
        $this->db->query("INSERT INTO comments SET content=?, createdate=?, createuser=?, updatedate=?, updateuser=?, postid=?", [$comments->getContent(), $comments->getCreatedate(), $comments->getCreateuser(),$comments->getUpdatedate(),$comments->getUpdateuser(), $comments->getPostid()]);
    }


    /**
     * @param $id
     * @return Comments
     */
    public function getCommentsById($id)
    {

        $stmt = $this->db->query("SELECT * FROM comments WHERE id=?", [$id]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);

        return  new Comments($data);
    }


    /**
     * @param Comments $comments
     */
    public function updComment(Comments $comments)
    {
        $ct=$comments->getContent();
        $upd=$comments->getUpdatedate();
        $usr=$comments->getUpdateuser();
        $cid=$comments->getId();

        $this->db->query("UPDATE comments SET content=?, updatedate=?, updateuser=? WHERE id=?", [$ct, $upd, $usr, $cid]);
    }


    /**
     * @param $id
     */
    public function deleteComment($id)
    {
        $this->db->query("DELETE FROM comments  WHERE id=?", [$id]);
    }


    /**
     * @param $id
     */
    public function validComment($id)
    {
        $this->db->query("UPDATE comments SET valid=1 WHERE id=?", [$id]);
    }


    /**
     * @param $id
     */
    public function unvalidComment($id)
    {
        $this->db->query("UPDATE comments SET valid=0 WHERE id=?", [$id]);
    }


}
