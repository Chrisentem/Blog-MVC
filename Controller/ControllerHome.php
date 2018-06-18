<?php

require_once 'Framework/Controller.php';
require_once 'Model/Post.php';

/**
 * Controller for the homepage
 *
 * @author Chris Entem Based and translated in english from Baptiste Pesquet MVC Blog with user authentication
 * (https://github.com/bpesquet/MonBlog/tree/authentification)
*/
class ControllerHome extends Controller {

    private $post;

    public function __construct() {
        $this->post = new Post();
    }

    // Display all the blog's posts
    public function index() {
        $posts = $this->post->getPosts();
        $this->generateView(array('posts' => $posts));
    }

}




