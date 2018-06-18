<?php

require_once 'ControllerSecured.php';
require_once 'Model/Post.php';
require_once 'Model/Comment.php';

/**
 * Controller for administration
 *
 * @author Chris Entem Based and translated in english from Baptiste Pesquet MVC Blog with user authentication
 * (https://github.com/bpesquet/MonBlog/tree/authentification)
 */
class ControllerAdmin extends ControllerSecured
{
    private $post;
    private $comment;

    /**
     * Builder
     */
    public function __construct()
    {
        $this->post = new Post();
        $this->comment = new Comment();
    }

    public function index()
    {
        $numPosts = $this->post->getNumPosts();
        $posts = $this->post->getPosts($numPosts);
        $numComments = $this->comment->getNumComments();
        $login = $this->request->getSession()->getAttribute("login");

        $this->generateView(array('numPosts' => $numPosts, 'numComments' => $numComments, 'login' => $login, 'posts' => $posts));
    }

    // Action to delete a Post
        public function deletePost()
    {
        $postId = $this->request->getParameter("id");
        $this->post->delete($postId);
        $this->redirect('Admin','index/');
    }

}

