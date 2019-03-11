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
    } elseif ($_GET['key'] == 'logout') {
        $logoff= new \Blog\controller\LoginController();
        $logoff->logout();
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
            $upcomment->updateComment($idpost,$idcomment);

        }
    }

} else {
    $index = new Blog\controller\HomeController();
    $index->home();
}