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





}