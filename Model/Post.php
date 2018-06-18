<?php

require_once 'Framework/Model.php';

/**
 * Defines the DB Queries for the blog Posts
 *
 * @author Chris Entem Based and translated in english from Baptiste Pesquet MVC Blog with user authentication
 * (https://github.com/bpesquet/MonBlog/tree/authentification)
 */

class Post extends Model {


    /** Returns the Posts List of the Blog with display LIMIT
     * 
     * @return PDOStatement List of Posts
     */
	public function getPosts(int $max = 5) {
        $sql = 'SELECT POST_ID as id, POST_DATE as date, POST_TITLE as title, POST_CONTENT as content FROM T_POST ORDER BY POST_ID DESC LIMIT ' . $max;
        $posts = $this->executeRequest($sql);
		return $posts; // Returns an array with the data
	}

    /** Returns infos of one Post
     * 
     * @param int $id Post id
     * @return array The Post
     * @throws Exception If Post id unknown
     */
	public function getPost($postId){
		$sql = 'SELECT POST_ID as id, POST_DATE as date, POST_TITLE as title, POST_CONTENT as content FROM T_POST WHERE POST_ID=?';
		$post = $this->executeRequest($sql, array($postId));
		if ($post->rowCount() > 0)
		return $post->fetch();  // On récupère la première ligne de résultat
		else
		throw new Exception("No Post matches with the id '$postId'");
	}

	/**
     * Returns total number of Posts
     * 
     * @return int number of Posts
     */
    public function getNumPosts()
    {
        $sql = 'select count(*) as NumPosts from T_POST';
        $result = $this->executeRequest($sql);
        $line = $result->fetch();  // Result always return 1 line
        return $line['NumPosts'];
    }
}