<?php

require_once 'Framework/Model.php';

/**
 * Defines the DB Queries for the blog Comments
 *
 * @author Chris Entem Based and translated in english from Baptiste Pesquet MVC Blog with user authentication
 * (https://github.com/bpesquet/MonBlog/tree/authentification)
 */
class Comment extends Model {
	
    /**
     * Returns PDOStatment array with Comments data for one Post
     */
	public function getComments($postId, int $max = 5) {
		$sql = 'SELECT COM_ID as id, COM_DATE as date, COM_AUTHOR as author, COM_CONTENT as content, POST_ID FROM T_COMMENT WHERE POST_ID=? ORDER BY id DESC LIMIT 0,' . $max;
		$comments = $this->executeRequest($sql, array($postId));
		return $comments;
	}

    /**
     * Returns PDOStatment array with all Comments data
     */
    public function getAllComments() {
        $sql = 'SELECT c.com_id as id, COM_DATE as date, COM_AUTHOR as author, COM_CONTENT as content, POST_ID, COUNT(REPORT_ID) as reports FROM T_COMMENT_REPORT cr RIGHT JOIN T_COMMENT c ON cr.com_id = c.com_id GROUP BY c.com_id';
        $allComments = $this->executeRequest($sql);
        return $allComments;
    }

    /**
     * Add a new comment to DB
     */
    public function addComment($author, $content, $postId) {
        $sql = 'INSERT INTO T_COMMENT(COM_DATE, COM_AUTHOR, COM_CONTENT, POST_ID)'
        . 'VALUES(?, ?, ?, ?)';
        $date = date(DATE_W3C);
        $this->executeRequest($sql, array($date, $author, $content, $postId));
    }

    /**
     * Returns total number of Comments
     * 
     * @return int number of Comments
     */
    public function getNumComments() {
        $sql = 'select count(*) as NumComments from T_COMMENT';
        $result = $this->executeRequest($sql);
        $line = $result->fetch();  // Result always return 1 line
        return $line['NumComments'];
    }

    /**
     * Delete a comment and its reports when exist from DB 
     * 
     * @param int $comId Comment id
     */
    public function delete($comId){
        $sql = 'DELETE FROM T_COMMENT WHERE COM_ID = ?; DELETE FROM T_COMMENT_REPORT WHERE COM_ID = ?';
        $this->executeRequest($sql, [$comId, $comId]);
    }

        /** Update a Comment
    *
    * @param int $comId Comment id
    * @param string $comContent Comment content
    **/    
    public function update($comContent, $comId){
        $sql = 'UPDATE T_COMMENT SET COM_CONTENT = ?, COM_DATE_MODERATE = ? WHERE COM_ID = ?';
        $date = date(DATE_W3C);
        $this->executeRequest($sql, [$comContent, $date, $comId]);
    }

 }