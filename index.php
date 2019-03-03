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
    }
} else {
    $index = new Blog\controller\HomeController();
    $index->home();
}