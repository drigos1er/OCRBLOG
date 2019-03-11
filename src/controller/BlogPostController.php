<?php
/**
 * Class LoginController
 */
namespace Blog\controller;

use Blog\config\Config;

use Blog\Models\Comments;
use Blog\repositories\CommentsRepository;
use Blog\repositories\PostsRepository;
use Blog\authentification;
use Blog\repositories\UsersRepository;


class BlogPostController extends IndexController
{


    /**
     * list of posts
     */
    public function listPost()
    {
        $post = new PostsRepository(Config::getCdb());
        $listpost=$post->getallPublishPost();


        echo $this->twig->render('blogposts.html.twig', array('listpost'=>$listpost));
    }


    /**
     * dteails Post
     * @param $id
     */
    public function detailsPost($id)
    {
        //Clear session information
        authentification\Session::resetFlash();


        $post = new PostsRepository();
        $detailspost=$post->getPostById($id);
        $comment= new CommentsRepository();
        $detailscomment=$comment->getallComments($id);




        if (!empty($_POST)) {
            $contentcom=htmlspecialchars($_POST['content']);
            $datecreatecom=date('Y-m-d H:i:s');
            $iduserlog=authentification\Session::getUserlog();
            $commentarray = new Comments(array(
                'content' => $contentcom,
                'createdate' => $datecreatecom,
                'updatedate' => $datecreatecom,
                'createuser' => $iduserlog,
                'updateuser' => $iduserlog,
                'postid' => $id
            ));


            $insertcomment=new CommentsRepository();
            $insertcomment->addComment($commentarray);
            authentification\Session::setFlash('Commentaire Ajouté avec succès!! Il s\'affichera après validation');

            header("Location:index.php?key=detailspost&&id=$id");
        }

        echo $this->twig->render('detailsblogposts.html.twig',array('detailspost'=>$detailspost,'detailscomment'=>$detailscomment));
    }


    /**
     * Update Comment
     * @param $postid
     * @param $commentid
     */
    public function updateComment($postid, $commentid)
    {
        $post = new PostsRepository();
        $detailspost=$post->getPostById($postid);
        $comment= new CommentsRepository();
        $detailscomment=$comment->getCommentsById($commentid);

        if (!empty($_POST)) {
            $contentup=htmlspecialchars($_POST['content']);
            $dateup=date('Y-m-d H:i:s');
            $iduserlogupd=authentification\Session::getUserlog();

            $updcommentarray = new Comments(array(
                'content' => $contentup,

                'updatedate' => $dateup,

                'updateuser' => $iduserlogupd,
                'id' => $commentid
            ));
            $upcomment= new CommentsRepository();
            $upcomment->updComment($updcommentarray);
            authentification\Session::setFlash('Commentaire modifié avec succès');
             header("Location:index.php?key=detailspost&&id=$postid");
        }







        echo $this->twig->render('updatecomment.html.twig',array('detailspost'=>$detailspost, 'detailscomment'=>$detailscomment));
    }



}