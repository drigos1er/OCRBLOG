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

            $commentarray = new Comments(array(
                'content' => $contentcom,
                'createdate' => $datecreatecom,
                'updatedate' => $datecreatecom,
                'createuser' => $_SESSION['userlog'],
                'updateuser' => $_SESSION['userlog'],
                'postid' => $id
            ));


            $insertcomment=new CommentsRepository();
            $insertcomment->addComment($commentarray);
            authentification\Session::setFlash('Commentaire Ajouté avec succès!! Il s\'affichera après validation');

            header("Location:index.php?key=detailspost&&id=$id");
        }

        echo $this->twig->render('detailsblogposts.html.twig',array('detailspost'=>$detailspost,'detailscomment'=>$detailscomment));
    }

}