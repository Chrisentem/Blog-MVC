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

    // Action to display a single Post details
    public function index() {
        $postId = $this->request->getParameter("id");
        
        $post = $this->post->getPost($postId);
        $comments = $this->comment->getComments($postId);
        
        $this->generateView(array('post' => $post, 'comments' => $comments));
    }

    // Action to add a comment to a Post
    public function commenting() {
        if(strlen($this->request->getParameter("content")) > 10)
        {
        $postId = $this->request->getParameter("id");
        $author = $this->request->getParameter("author");
        $content = $this->request->getParameter("content");
        
        $this->comment->addComment($author, $content, $postId);
        $this->redirect('Post','index/'.$postId);
        }
        else {
        echo "Commentaire trop court";
        }
        
        // Execute the default action to reload and display the Posts list
        $this->executeAction("index");

    }

    // Action to report a bad comment
    public function reportComment() {
        $commentId = $this->request->getParameter("comId");
        $postId = $this->request->getParameter("postId");
        $this->comment->report($commentId);
        $this->redirect('Post','index/'.$postId);
    }

}

