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
    public function generate($data) {
        // Generation of the specific part of the view
        $content = $this->generateFile($this->file, $data);
        // We define a local variable accessible by the view for the webroot
        // It is the path to the website on the server
        // it is needed for URLs with type controleur/action/id
        $webRoot = Configuration::get("webRoot", "/");
        // Generation of a common template using the specifique part
        $view = $this->generateFile('View/Template.php',
                array('title' => $this->title, 'content' => $content,
                    'webRoot' => $webRoot));
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
    private function generateFile($file, $data) {
        if (file_exists($file)) {
            // Let all the values in table $data accessible in view
            extract($data);
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

}
