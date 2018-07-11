<?php

require_once 'Framework/Controller.php';
require_once 'Model/Post.php';
require_once 'Model/Page.php';

/**
 * Controller for the homepage
 *
 * @author Chris Entem Based and translated in english from Baptiste Pesquet MVC Blog with user authentication
 * (https://github.com/bpesquet/MonBlog/tree/authentification)
*/
class ControllerHome extends Controller {

    private $post;
    private $page;
    /** Usable for pagination with every child controller when needed **/
    const PER_PAGE = 5;

    public function __construct() {
        $this->post = new Post();
        $this->page = new Page();
    }

    // Display all the blog's posts
    public function index() {
        $perPage = self::PER_PAGE;
        $numPosts = $this->post->getNumPosts();
        $maxPage = ceil($numPosts / $perPage);
        $calledPageNumber = $this->buildCurrentPageNumber($maxPage);

        $posts = $this->post->getPaginatedPosts($perPage, $calledPageNumber);
        $this->generateView(array(
        	'posts' => $posts,
        	'numPosts' => $numPosts,
            'maxPage' => $maxPage,
            'curPage' => $calledPageNumber
        ));
    }

    // Action to display Author Bio page
    public function aPropos() {
    	$page = $this->page->getPage(1);
    	$this->generateView(array('page' => $page));
    }

        // Action to display Author Contact page
    public function contact() {
    	$page = $this->page->getPage(2);
    	$this->generateView(array('page' => $page));
    }

}




