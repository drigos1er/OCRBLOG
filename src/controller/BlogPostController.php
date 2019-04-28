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
     * List of posts
     */
    public function listPost()
    {
        $post = new PostsRepository(Config::getCdb());
        $listpost=$post->getallPublishPost();


        $tusrlst=array();
        foreach ($listpost as $alistpost) {
            $userupdatelpst=  new UsersRepository();
            $upduserlst=$userupdatelpst->getUserById($alistpost->getUpdateuser());
            $upsrlst=$upduserlst->getUsername();





            array_push($tusrlst, $upsrlst);
        }



        echo $this->twig->render('blogposts.html.twig', array('listpost'=>$listpost,'tuserlst'=>$tusrlst,'upduserlst'=>$upsrlst));
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
        $dpt=$post->getPostById($id);
        $comment= new CommentsRepository();
        $dct=$comment->getallComments($id);
        $userupdate=  new UsersRepository();
        $upduser=$userupdate->getUserById($dpt->getUpdateuser());

        $tusr=array();
        foreach ($dct as $allcomment) {
            $usercom= new UsersRepository();
            $idusercom=$usercom->getUserById($allcomment->getCreateuser());
            $idusercomname=$idusercom->getUsername();
            array_push($tusr, $idusercomname);
        }


        $upsr=$upduser->getUsername();
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

        echo $this->twig->render('detailsblogposts.html.twig',
            array('detailspost'=>$dpt, 'detailscomment'=>$dct, 'tableuser'=>$tusr, 'upduser'=>$upsr));
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
        //Clear session information
        authentification\Session::resetFlash();

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


    /**
     * update post
     * @param $id
     */
    public function updatePost($id)
    {
        $post = new PostsRepository();
        $updatepost=$post->getPostById($id);


        if (!empty($_POST)) {
            $titleup=htmlspecialchars($_POST['title']);
            $chapoup=htmlspecialchars($_POST['chapo']);
            $contentup=htmlspecialchars($_POST['content']);
            $iduserpostup=authentification\Session::getUserlog();

            $dateup=date('Y-m-d H:i:s');
            $postarrayup = new Posts(array(
                'title' => $titleup,
                'chapo' => $chapoup,
                'content' => $contentup,
                'updatedate' => $dateup,
                'updateuser' => $iduserpostup,
                'id' => $id
            ));


            $updpost=new PostsRepository();
            $updpost->updatePost($postarrayup);
            authentification\Session::setFlash('Article Modifié avec succès!!');

            header("Location:index.php?key=blogadmin");
        }




        echo $this->twig->render('updatepost.html.twig', array('updatepost'=>$updatepost));
    }


    /**
     * Delete Post
     * @param $id
     */
    public function deletePost($id)
    {
        $delpost=new PostsRepository();
        $delpost->deletePost($id);
        authentification\Session::setFlash('Article supprimé avec succès!!');
        header("Location:index.php?key=blogadmin");
    }


    public function detailsPostadmin($id)
    {
        //Clear session information
        authentification\Session::resetFlash();


        $postad = new PostsRepository();
        $dpad=$postad->getPostById($id);
        $commentad= new CommentsRepository();
        $dcad=$commentad->getallCommentsadmin($id);
        $userupdatead=  new UsersRepository();
        $upduserad=$userupdatead->getUserById($dpad->getUpdateuser());

        $tusrad=array();
        foreach ($dcad as $allcommentad) {
            $usercomad= new UsersRepository();
            $idusercomad=$usercomad->getUserById($allcommentad->getCreateuser());
            $idusercomnamead=$idusercomad->getUsername();
            array_push($tusrad, $idusercomnamead);
        }
        $usrad=$upduserad->getUsername();


        if (!empty($_POST)) {
            $contentcomad=htmlspecialchars($_POST['content']);
            $datecreatecomad=date('Y-m-d H:i:s');
            $iduserlogad=authentification\Session::getUserlog();
            $commentarrayad = new Comments(array(
                'content' => $contentcomad,
                'createdate' => $datecreatecomad,
                'updatedate' => $datecreatecomad,
                'createuser' => $iduserlogad,
                'updateuser' => $iduserlogad,
                'postid' => $id
            ));


            $insertcommentad=new CommentsRepository();
            $insertcommentad->addComment($commentarrayad);
            authentification\Session::setFlash('Commentaire Ajouté avec succès!!');

            header("Location:index.php?key=detailspost&&id=$id");
        }

        echo $this->twig->render('detailsblogpostsadmin.html.twig', array('detailspost'=>$dpad,
            'detailscomment'=>$dcad, 'tableuser'=>$tusrad, 'upduser'=>$usrad));
    }

    /**
     * Valid comment
     * @param $idpost
     * @param $idcomment
     */
    public function validComment($idpost, $idcomment)
    {
        $delpost=new CommentsRepository();
        $delpost->validComment($idcomment);

        authentification\Session::setFlash('Commentaire validé avec succès !!');
        header("Location:index.php?key=detailspostadmin&&id=$idpost");
    }


    /**
     * Unvalid comment
     * @param $idpost
     * @param $idcomment
     */
    public function unvalidComment($idpost, $idcomment)
    {
        $delpost=new CommentsRepository();
        $delpost->unvalidComment($idcomment);

        authentification\Session::setFlash('Annulation validation commentaire effectué avec succès !!');
        header("Location:index.php?key=detailspostadmin&&id=$idpost");
    }


    /**
     * Delete comment admin
     * @param $idpost
     * @param $idcomment
     */
    public function deleteCommentadmin($idpost, $idcomment)
    {
        $delpost=new CommentsRepository();
        $delpost->deleteComment($idcomment);

        authentification\Session::setFlash('Commentaire supprimé avec succès');
        header("Location:index.php?key=detailspostadmin&&id=$idpost");
    }


    /**
     * Publish Post
     * @param $id
     */
    public function publishPost($id)
    {
        $delpost=new PostsRepository();
        $delpost->publishPost($id);
        authentification\Session::setFlash('Article publié avec succès!!');
        header("Location:index.php?key=blogadmin");
    }

    /**
     * UnPublish  Post
     * @param $id
     */
    public function unpublishPost($id)
    {
        $delpost=new PostsRepository();
        $delpost->unpublishPost($id);
        authentification\Session::setFlash('Annulation publication de l\'article efv(fv(ectué avec succès!!');
        header("Location:index.php?key=blogadmin");
    }

}