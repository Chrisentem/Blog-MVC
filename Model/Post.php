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
    public function getPaginatedPosts(int $perPage, int $calledPageNumber) {
        $sql = 'SELECT POST_ID as id, DATE_FORMAT(POST_DATE, "%d/%m/%Y à %Hh%imin") as date, DATE_FORMAT(POST_DATE_MODIFIED, "%d/%m/%Y à %Hh%imin") as modificationDate, POST_TITLE as title, POST_CONTENT as content FROM T_POST ORDER BY POST_ID DESC LIMIT ' . (($calledPageNumber - 1)*$perPage) . ', ' . $perPage;
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
		$sql = 'SELECT POST_ID as id, DATE_FORMAT(POST_DATE, "%d/%m/%Y à %Hh%imin") as date, DATE_FORMAT(POST_DATE_MODIFIED, "%d/%m/%Y à %Hh%imin") as modificationDate, POST_TITLE as title, POST_CONTENT as content FROM T_POST WHERE POST_ID=?';
		$post = $this->executeRequest($sql, array($postId));
		if ($post->rowCount() > 0)
		return $post->fetch();  // On récupère la première ligne de résultat
		else
		throw new Exception("No Post matches with the id '$postId'");
	}

    /** Update a Post
    *
    * @param int $id Post id
    * @param string $content Post content
    * @param string $title Post title
    **/    
    public function update($title, $content, $postId){
        $sql = 'UPDATE T_POST SET POST_TITLE = ?, POST_CONTENT = ?, POST_DATE_MODIFIED = ? WHERE POST_ID = ?';
        $date = date(DATE_W3C);
        $this->executeRequest($sql, [$title, $content, $date, $postId]);
    }

    /** Delete a Post and associated Comments
    *
    * @param int $id Post id
    **/
    public function delete($postId){
        $sql = 'DELETE FROM T_POST WHERE POST_ID = ?; DELETE FROM T_COMMENT WHERE POST_ID = ?';
        $this->executeRequest($sql, [$postId, $postId]);
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

    /** Create a new Post
    *
    * @param int $id Post id
    * @param string $content Post content
    * @param string $title Post title
    **/
    public function create($title, $content){
        $sql = 'INSERT INTO T_POST(POST_TITLE, POST_CONTENT, POST_DATE) VALUES(? ,? ,?)';
        $date = date(DATE_W3C);
        $this->executeRequest($sql, [$title, $content, $date]);
    }
}