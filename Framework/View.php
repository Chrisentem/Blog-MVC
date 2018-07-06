<?php

require_once 'Configuration.php';

/**
 * Generating View Class
 *
 * @author Chris Entem Based and translated in english from Baptiste Pesquet MVC Blog with user authentication
 * (https://github.com/bpesquet/MonBlog/tree/authentification)
 */
class View {

    /** Filename associated with the view */
    private $file;

    /** View title (defined in the view file) */
    private $title;

    const DEFAULT_TEMPLATE = 'View/TemplateDefault.php';
    const ADMIN_TEMPLATE = 'View/TemplateAdmin.php';

    /**
     * Builder
     * 
     * @param string $action Action with which the view is associated
     * @param string $controller Name of the controller to which the view is associated
     */
    public function __construct($action, $controller = "") {
        // Determining the name of the view file from the action and the controller
        // The view files name convention is : View/<$controller>/<$action>.php
        $file = "View/";
        if ($controller != "") {
            $file = $file . $controller . "/";
        }
        $this->file = $file . $action . ".php";
    }

    /**
     * Generate and display view
     * 
     * @param array $data Data required to generate the view
     */
    public function generate($viewData, $isAdmin = false) {

        $template = $isAdmin ? self::ADMIN_TEMPLATE : self::DEFAULT_TEMPLATE;
        // Generation of the specific part of the view
        $content = $this->generateFile($this->file, $viewData);
        // We define a local variable accessible by the view for the webroot
        // It is the path to the website on the server
        // it is needed for URLs with type controleur/action/id
        $webRoot = Configuration::get("webRoot", "/");
        // A default empty array value for breadcrumb is defined
        // So we don't have to write values on every view
        if(!isset($this->breadcrumb)){
            $this->breadcrumb = [];
        }
        // Generation of a common template using the specific part
        $view = $this->generateFile(
            $template,
            array('title' => $this->title,
                'breadcrumb'=> $this->breadcrumb,
                'content' => $content,
                'webRoot' => $webRoot)
            );
        // Retruns the generated view to the web browser
        echo $view;
    }

    /**
     * Generate file and return result
     * 
     * @param string $file Path of the view file to generate
     * @param array $data Data required to generate the view
     * @return string Result of the view generation
     * @throws Exception If view file is missing
     */
    private function generateFile($file, $viewData) {
        if (file_exists($file)) {
            // Let all the values in table $data accessible in view
            extract($viewData);
            // Starting output temporisation
            ob_start();
            // Including the view file
            // Result is stored in the output buffer
            require $file;
            // Stopping the temporisation adn return the output buffer
            return ob_get_clean();
        }
        else {
            throw new Exception("File '$file' missing");
        }
    }

    /**
     * Clean a value put in an HTML page
     * Helps avoid unwanted code execution issues (XSS) in generated views
     * 
     * @param string $value Value to clean
     * @return string cleaned value
     */
    private function clean($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
    }

    private function truncate($text, $limit = 50, $ellipsis = '...') {
        $text = strip_tags($text);
        $words = preg_split("/[\n\r\t ]+/", $text, $limit + 1, PREG_SPLIT_NO_EMPTY);
        if (count($words) > $limit ) {
            array_pop($words);
            $text = implode(' ', $words);
            $text = $text . $ellipsis;
        }
        return $text;
    }

}
