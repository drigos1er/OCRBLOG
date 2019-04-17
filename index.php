<?php
require('vendor/autoload.php');

if (isset($_GET['key'])) {
    if ($_GET['key'] == 'register') {
        $reg= new \Blog\controller\LoginController();
        $reg->register();
    } elseif ($_GET['key'] == 'registeradmin') {
        $reg= new \Blog\controller\LoginController();
        $reg->registeradmin();
    } elseif ($_GET['key'] == 'login') {
        $log= new \Blog\controller\LoginController();
        $log->login();
    } elseif ($_GET['key'] == 'blogpost') {
        $listposts= new \Blog\controller\BlogPostController();
        $listposts->listPost();
    } elseif ($_GET['key'] == 'addpost') {
        $addpost= new \Blog\controller\BlogPostController();
        $addpost->addPost();
    } elseif ($_GET['key'] == 'formcontact') {
        $contact= new \Blog\controller\FormContactController();
        $contact->sendmail();
    } elseif ($_GET['key'] == 'logout') {
        $logoff= new \Blog\controller\LoginController();
        $logoff->logout();
    } elseif ($_GET['key'] == 'blogadmin') {
        $blogadmin= new \Blog\controller\BlogPostController();
        $blogadmin->blogAdmin();
    } elseif ($_GET['key'] == 'profil') {
        $iduser = intval($_GET['id']);
        if ($iduser != 0) {
            $contact= new \Blog\controller\LoginController();
            $contact->editprofil($iduser);
        }
    } elseif ($_GET['key'] == 'detailspost') {
        $idarticle = intval($_GET['id']);
        if ($idarticle != 0) {
            $detailspost = new \Blog\controller\BlogPostController();
            $detailspost->detailsPost($idarticle);
        }
    } elseif ($_GET['key'] == 'updatecomment') {
        $idpostup = intval($_GET['postid']);
        $idcommentup = intval($_GET['commentid']);
        if ($idcommentup != 0 and $idpostup != 0) {
            $upcomment = new \Blog\controller\BlogPostController();
            $upcomment->updateComment($idpostup, $idcommentup);
        }
    } elseif ($_GET['key'] == 'deletecomment') {
        $idpostdel = intval($_GET['postid']);
        $idcommentdel = intval($_GET['commentid']);
        if ($idcommentdel != 0 and $idpostdel != 0) {
            $delcomment = new \Blog\controller\BlogPostController();
            $delcomment->deleteComment($idpostdel, $idcommentdel);
        }
    } elseif ($_GET['key'] == 'updatepost') {
        $idarticleup = intval($_GET['id']);
        if ($idarticleup != 0) {
            $updatpost = new \Blog\controller\BlogPostController();
            $updatpost->updatePost($idarticleup);
        }
    } elseif ($_GET['key'] == 'deletepost') {
        $idarticledel = intval($_GET['id']);
        if ($idarticledel != 0) {
            $deletepost = new \Blog\controller\BlogPostController();
            $deletepost->deletePost($idarticledel);
        }
    } elseif ($_GET['key'] == 'publishpost') {
        $idarticlepub = intval($_GET['id']);
        if ($idarticlepub != 0) {
            $publishpost = new \Blog\controller\BlogPostController();
            $publishpost->publishPost($idarticlepub);
        }
    } elseif ($_GET['key'] == 'unpublishpost') {
        $idarticleunp = intval($_GET['id']);
        if ($idarticleunp != 0) {
            $publishpost = new \Blog\controller\BlogPostController();
            $publishpost->unpublishPost($idarticleunp);
        }
    } elseif ($_GET['key'] == 'detailspostadmin') {
        $idarticledet = intval($_GET['id']);
        if ($idarticledet != 0) {
            $detailspost = new \Blog\controller\BlogPostController();
            $detailspost->detailsPostadmin($idarticledet);
        }
    } elseif ($_GET['key'] == 'validcomment') {
        $idpostva = intval($_GET['postid']);
        $idcommentva = intval($_GET['commentid']);
        if ($idcommentva != 0 && $idpostva != 0) {
            $vacomment = new \Blog\controller\BlogPostController();
            $vacomment->validComment($idpostva, $idcommentva);
        }
    } elseif ($_GET['key'] == 'unvalidcomment') {
        $idpostunva = intval($_GET['postid']);
        $idcommentunva = intval($_GET['commentid']);
        if ($idcommentunva != 0  && $idpostunva != 0) {
            $unvacomment = new \Blog\controller\BlogPostController();
            $unvacomment->unvalidComment($idpostunva, $idcommentunva);
        }
    } elseif ($_GET['key'] == 'deletecommentadmin') {
        $idpostdelc = intval($_GET['postid']);
        $idcommentdelc = intval($_GET['commentid']);
        if ($idcommentdelc != 0 && $idpostdelc != 0) {
            $delccomment = new \Blog\controller\BlogPostController();
            $delccomment->deleteCommentadmin($idpostdelc, $idcommentdelc);
        }
    }
} else {
    $index = new Blog\controller\HomeController();
    $index->home();
}
