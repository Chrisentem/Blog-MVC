<?php

require_once 'Framework/Controller.php';
require_once 'Model/Post.php';
require_once 'Model/Comment.php';


/**
 * Controller for the actions on Posts
 *
 * @author Chris Entem Based and translated in english from Baptiste Pesquet MVC Blog with user authentication
 * (https://github.com/bpesquet/MonBlog/tree/authentification)
*/
class ControllerPost extends Controller {

    private $post;
    private $comment;

    /**
     * Builder 
     */
    public function __construct() {
        $this->post = new Post();
        $this->comment = new Comment();
    }

    // Display a Post details
    public function index() {
        $postId = $this->request->getParameter("id");
        
        $post = $this->post->getPost($postId);
        $comments = $this->comment->getComments($postId);
        
        $this->generateView(array('post' => $post, 'comments' => $comments));
    }

}

