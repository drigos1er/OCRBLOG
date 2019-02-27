<?php
require('vendor/autoload.php');
if (isset($_GET['key'])) {




    if($_GET['key'] == 'register'){

        $login= new \Blog\controller\LoginController();
        $login->register();
    }
}else{
    $index = new Blog\controller\HomeController();
    $index->home();
}