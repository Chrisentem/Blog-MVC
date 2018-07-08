<?php

require_once 'Framework/Model.php';

/**
 * Defines the DB Queries for the blog "simple" Pages
 *
 * @author Chris Entem
 */

class Page extends Model {

    /** Returns all simple pages data
     *
     * @param int $pageId Page id
     * @return Array with table contents
     */
    public function getPages() {
        $sql = 'SELECT PAGE_ID as id, DATE_FORMAT(PAGE_DATE_CREATION, "%d/%m/%Y à %Hh%imin") as date, DATE_FORMAT(PAGE_DATE_MODIFIED, "%d/%m/%Y à %Hh%imin") as modificationDate, PAGE_TITLE as title, PAGE_CONTENT as content FROM T_PAGES';
        $page = $this->executeRequest($sql);
        return $page; // Returns an array with the data
    }


    /** Returns a simple page data
     *
     * @param int $pageId Page id
     * @return Array with table contents
     */
	public function getPage($pageId) {
        $sql = 'SELECT PAGE_ID as id, DATE_FORMAT(PAGE_DATE_CREATION, "%d/%m/%Y à %Hh%imin") as date, DATE_FORMAT(PAGE_DATE_MODIFIED, "%d/%m/%Y à %Hh%imin") as modificationDate, PAGE_TITLE as title, PAGE_CONTENT as content FROM T_PAGES WHERE PAGE_ID = ?';
        $page = $this->executeRequest($sql, [$pageId]);
		return $page->fetch();
	}

    /** Update a specific Page
    *
    * @param int $id Page id
    * @param string $content Page content
    * @param string $title Page title
    **/    
    public function update($title, $content, $pageId){
        $sql = 'UPDATE T_PAGES SET PAGE_TITLE = ?, PAGE_CONTENT = ?, POST_DATE_MODIFIED = ? WHERE PAGE_ID = ?';
        $date = date(DATE_W3C);
        $this->executeRequest($sql, [$title, $content, $date, $pageId]);
    }

}