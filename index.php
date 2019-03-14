<?php
require('vendor/autoload.php');
if (isset($_GET['key'])) {
    if ($_GET['key'] == 'register') {
        $reg= new \Blog\controller\LoginController();
        $reg->register();
    } elseif ($_GET['key'] == 'login') {
        $log= new \Blog\controller\LoginController();
        $log->login();
    } elseif ($_GET['key'] == 'blogpost') {
        $listposts= new \Blog\controller\BlogPostController();
        $listposts->listPost();
    } elseif ($_GET['key'] == 'addpost') {
        $addpost= new \Blog\controller\BlogPostController();
        $addpost->addPost();
    } elseif ($_GET['key'] == 'logout') {
        $logoff= new \Blog\controller\LoginController();
        $logoff->logout();
    } elseif ($_GET['key'] == 'blogadmin') {
        $blogadmin= new \Blog\controller\BlogPostController();
        $blogadmin->blogAdmin();
    } elseif ($_GET['key'] == 'detailspost') {
        $idarticle = intval($_GET['id']);
        if ($idarticle != 0) {
            $detailspost = new \Blog\controller\BlogPostController();
            $detailspost->detailsPost($idarticle);
        }
    } elseif ($_GET['key'] == 'updatecomment') {
        $idpost = intval($_GET['postid']);
        $idcomment = intval($_GET['commentid']);
        if ($idcomment != 0 and $idpost != 0) {
            $upcomment = new \Blog\controller\BlogPostController();
            $upcomment->updateComment($idpost, $idcomment);
        }
    } elseif ($_GET['key'] == 'deletecomment') {
        $idpost = intval($_GET['postid']);
        $idcomment = intval($_GET['commentid']);
        if ($idcomment != 0 and $idpost != 0) {
            $upcomment = new \Blog\controller\BlogPostController();
            $upcomment->deleteComment($idpost, $idcomment);

        }
    } elseif ($_GET['key'] == 'updatepost') {
        $idarticle = intval($_GET['id']);
        if ($idarticle != 0) {
            $updatpost = new \Blog\controller\BlogPostController();
            $updatpost->updatePost($idarticle);

        }
    } elseif ($_GET['key'] == 'deletepost') {
        $idarticle = intval($_GET['id']);
        if ($idarticle != 0) {
            $deletepost = new \Blog\controller\BlogPostController();
            $deletepost->deletePost($idarticle);

        }
    } elseif ($_GET['key'] == 'publishpost') {
        $idarticle = intval($_GET['id']);
        if ($idarticle != 0) {
            $publishpost = new \Blog\controller\BlogPostController();
            $publishpost->publishPost($idarticle);

        }
    } elseif ($_GET['key'] == 'unpublishpost') {
        $idarticle = intval($_GET['id']);
        if ($idarticle != 0) {
            $publishpost = new \Blog\controller\BlogPostController();
            $publishpost->unpublishPost($idarticle);

        }
    } elseif ($_GET['key'] == 'detailspostadmin') {
        $idarticle = intval($_GET['id']);
        if ($idarticle != 0) {
            $detailspost = new \Blog\controller\BlogPostController();
            $detailspost->detailsPostadmin($idarticle);
        }
    } elseif ($_GET['key'] == 'validcomment') {
        $idpost = intval($_GET['postid']);
        $idcomment = intval($_GET['commentid']);
        if ($idcomment != 0 and $idpost != 0) {
            $upcomment = new \Blog\controller\BlogPostController();
            $upcomment->validComment($idpost, $idcomment);

        }
    } elseif ($_GET['key'] == 'unvalidcomment') {
        $idpost = intval($_GET['postid']);
        $idcomment = intval($_GET['commentid']);
        if ($idcomment != 0 and $idpost != 0) {
            $upcomment = new \Blog\controller\BlogPostController();
            $upcomment->unvalidComment($idpost, $idcomment);

        }
    } elseif ($_GET['key'] == 'deletecommentadmin') {
        $idpost = intval($_GET['postid']);
        $idcomment = intval($_GET['commentid']);
        if ($idcomment != 0 and $idpost != 0) {
            $upcomment = new \Blog\controller\BlogPostController();
            $upcomment->deleteCommentadmin($idpost, $idcomment);

        }
    }

} else {
    $index = new Blog\controller\HomeController();
    $index->home();
}