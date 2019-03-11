<?php
/**
 * Class LoginController
 */
namespace Blog\controller;

use Blog\config\Config;

use Blog\Models\Comments;
use Blog\Models\Posts;
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
        $userupdate=  new UsersRepository();
        $upduser=$userupdate->getUserById($detailspost->getUpdateuser());

        $tableuser=array();
        foreach ($detailscomment as $allcomment) {
            $usercom= new UsersRepository();
            $idusercom=$usercom->getUserById($allcomment->getCreateuser());
            $idusercomname=$idusercom->getUsername();
            array_push($tableuser, $idusercomname);
        }



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

        echo $this->twig->render('detailsblogposts.html.twig', array('detailspost'=>$detailspost,
            'detailscomment'=>$detailscomment, 'tableuser'=>$tableuser, 'upduser'=>$upduser->getUsername()));
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

        echo $this->twig->render('updatecomment.html.twig', array('detailspost'=>$detailspost, 'detailscomment'=>$detailscomment));
    }

    /**
     * delete comment
     * @param $idpost
     * @param $idcomment
     */
    public function deleteComment($idpost, $idcomment)
    {
        $delpost=new CommentsRepository();
        $delpost->deleteComment($idcomment);

        authentification\Session::setFlash('Commentaire supprimé avec succès');
        header("Location:index.php?key=detailspost&&id=$idpost");
    }

    /**
     * List post espace admin
     */
    public function blogAdmin()
    {
        $post = new PostsRepository();
        $listpost=$post->getallPost();


        $tableuserpost=array();
        foreach ($listpost as $allpost) {
            $userpost= new UsersRepository();


            $iduserpost=$userpost->getUserById($allpost->getCreateuser());


            $iduserpostname=$iduserpost->getUsername();
            array_push($tableuserpost, $iduserpostname);
        }

        echo $this->twig->render('blogadmin.html.twig', array('listpost'=>$listpost,'tableuserpost'=>$tableuserpost));
    }

    /**
     * create Post Blog
     */
    public function addPost()
    {
        if (!empty($_POST)) {
            $titlesec=htmlspecialchars($_POST['title']);
            $chaposec=htmlspecialchars($_POST['chapo']);
            $contentsec=htmlspecialchars($_POST['content']);
            $iduserpost=authentification\Session::getUserlog();

            $datecreate=date('Y-m-d H:i:s');
            $postarray = new Posts(array(
                'title' => $titlesec,
                'chapo' => $chaposec,
                'content' => $contentsec,
                'createdate' => $datecreate,
                'createuser' => $iduserpost,
                'updatedate' => $datecreate,
                'updateuser' => $iduserpost
            ));


            $insertpost=new PostsRepository();
            $insertpost->addPost($postarray);
            authentification\Session::setFlash('Article Ajouté avec succès!!');

            header("Location:index.php?key=blogadmin");
        }

        echo $this->twig->render('addpost.html.twig');
    }

}