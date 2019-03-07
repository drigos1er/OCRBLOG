<?php
/**
 * Class LoginController
 */
namespace Blog\controller;

use Blog\config\Config;

use Blog\repositories\CommentsRepository;
use Blog\repositories\PostsRepository;

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









        $post = new PostsRepository();
        $detailspost=$post->getPostById($id);
        $comment= new CommentsRepository();
        $detailscomment=$comment->getallComments($id);



        if (!empty($_POST)) {


            $contentcom=htmlspecialchars($_POST['content']);

            $db=\Config::getCdb();
            $datecreate=date('Y-m-d H:i:s');
            $insertcomment=new CommentsRepository($db);
            $insertcomment->addComment($contentcom, $datecreate, $_SESSION['userlog'],$datecreate, $_SESSION['userlog'],$id);
            $flashmessage= new Session();
            $flashmessage->setNotification('Commentaire Ajouté avec succès');
            header("Location:index.php?key=blogpost");
        }







        echo $this->twig->render('detailsblogposts.html.twig',array('detailspost'=>$detailspost,'detailscomment'=>$detailscomment));
    }

}