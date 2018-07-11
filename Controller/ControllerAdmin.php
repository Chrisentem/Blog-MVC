<?php

require_once 'ControllerSecured.php';
require_once 'Model/Post.php';
require_once 'Model/Comment.php';
require_once 'Model/Page.php';

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
    private $page;

    /** Usable for pagination with every child controller when needed **/
    const PER_PAGE = 5;

    /**
     * Builder
     */
    public function __construct() {
        $this->post = new Post();
        $this->comment = new Comment();
        $this->page = new Page();
    }

    // Default Action defined
    public function index() {
        // We define variable to use with pagination
        $perPage = self::PER_PAGE;
        $numPosts = $this->post->getNumPosts();
        $maxPage = ceil($numPosts / $perPage);
        $calledPageNumber = $this->buildCurrentPageNumber($maxPage);

        // Get data from model objects
        $posts = $this->post->getPaginatedPosts($perPage, $calledPageNumber);
        $numComments = $this->comment->getNumComments();
        $login = $this->request->getSession()->getAttribute("login");

        $this->generateView(array(
            'numPosts' => $numPosts,
            'numComments' => $numComments,
            'login' => $login,
            'posts' => $posts,
            'maxPage' => $maxPage,
            'curPage' => $calledPageNumber
        ));
    }

    // Action to load Comments management page
    public function manageComments() {
        $allComments = $this->comment->getAllComments();
        $this->generateView(array('allComments' => $allComments));
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
        if($this->request->existsParameter("content")) {
            $content = $this->request->getParameter("content");
        }
        else {
            $content = '';
        }
        
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
        $title = $this->request->getParameter("new_title");
        if($this->request->existsParameter("new_content")) {
            $content = $this->request->getParameter("new_content");
        }
        else {
            $content = '';
        }
        $this->post->create($title, $content);
        $this->redirect('Admin','index/');
    }

    // Action to delete a comment and its reports when exist from DB
    public function deleteCom() {
        $comId = $this->request->getParameter("id");
        $this->comment->delete($comId);
        $this->redirect('Admin','index/');
    }

    // Action to validate - moderate an existing comment by removing reports
    public function validCom() {
        $comId = $this->request->getParameter("id");
        $this->comment->deleteReports($comId);
        $this->redirect('Admin','manageComments');
    }

    // Action to display simple pages list
    public function managePages() {
        $pages = $this->page->getPages();
        $this->generateView(array('pages' => $pages));
    }

        // Action to edit a Page
    // Change title and partial content only allowed
    public function editPage() {
        $pageId = $this->request->getParameter("id");
        $page = $this->page->getPage($pageId);
        $this->generateView(array('page' => $page));
    }

    // Action to save a Page modifications  
    public function savePage() {
        $pageId = $this->request->getParameter("id");
        $title = $this->request->getParameter("title");
        if($this->request->existsParameter("content")) {
            $content = $this->request->getParameter("content");
        }
        else {
            $content = '';
        }
                
        $this->page->update($title, $content, $pageId);
        $this->redirect('admin','editPage/'.$pageId);

    }

}

