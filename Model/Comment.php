<?php

require_once 'Framework/Model.php';

/**
 * Defines the DB Queries for the blog Comments
 *
 * @author Chris Entem Based and translated in english from Baptiste Pesquet MVC Blog with user authentication
 * (https://github.com/bpesquet/MonBlog/tree/authentification)
 */
class Comment extends Model {
	
	public function getComments($postId)
	{
		$sql = 'SELECT COM_ID as id, COM_DATE as date, COM_AUTHOR as author, COM_CONTENT as content, POST_ID FROM T_COMMENT WHERE POST_ID=?';
		$comments = $this->executeRequest($sql, array($postId));
		return $comments;
	}

    /**
     * Returns total number of Comments
     * 
     * @return int number of Comments
     */
    public function getNumComments()
    {
        $sql = 'select count(*) as NumComments from T_COMMENT';
        $result = $this->executeRequest($sql);
        $line = $result->fetch();  // Result always return 1 line
        return $line['NumComments'];
    }


 }