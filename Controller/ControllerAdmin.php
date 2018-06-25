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
        $allComments = $this->comment->getAllComments();
        $login = $this->request->getSession()->getAttribute("login");

        $this->generateView(array('numPosts' => $numPosts, 'numComments' => $numComments, 'login' => $login, 'posts' => $posts, 'allComments' => $allComments));
    }

    // Action to edit a Post
    // Change title and content only allowed
    public function editPost() {
        $postId = $this->request->getParameter("id");
        $post = $this->post->getPost($postId);
        $this->generateView(array('post' => $post));
    }

    // Action to save a Post modifications  
    public function savePost() {
        $postId = $this->request->getParameter("id");
        $title = $this->request->getParameter("title");
        $content = $this->request->getParameter("content");
        
        $this->post->update($title, $content, $postId);
        $this->redirect('admin','editPost/'.$postId);

    }

    // Action to delete a Post
    public function deletePost() {
        $postId = $this->request->getParameter("id");
        $this->post->delete($postId);
        $this->redirect('Admin','index/');
    }

    // Action to write a new Post
    public function writing() {
        $title = $this->request->getParameter("title");
        $content = $this->request->getParameter("content");
        $this->post->create($title, $content);
        $this->redirect('Admin','index/');
    }

    // Action to delete a comment and its reports when exist from DB
    public function deleteCom() {
        $comId = $this->request->getParameter("id");
        $this->comment->delete($comId);
        $this->redirect('Admin','index/');
    }


}

