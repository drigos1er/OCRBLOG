<?php
/**
 * Class LoginController
 */
namespace Blog\controller;

use Blog\config\Config;

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




}