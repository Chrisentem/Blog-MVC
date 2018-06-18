<?php

require_once 'Session.php';

/*
 * Class modeling an incoming HTTP request
 * 
 * @author Chris Entem Based and translated in english from Baptiste Pesquet MVC Blog with user authentication
 * (https://github.com/bpesquet/MonBlog/tree/authentification)
 */
class Request {

    /** Table of request params */
    private $parameters;

    /** Session Object associated to the request */
    private $session;

    /**
     * Builder
     * 
     * @param array $parameters Request parameters
     */
    public function __construct(array $parameters) {
        $this->parameters = $parameters;
        $this->session = new Session();
    }

    /**
     * Returns the Session Object associated to the request
     * 
     * @return Session Session Object
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Returns True if parameter found in request
     * 
     * @param string $name Parameter name
     * @return bool True If parameter exists and his value not empty
     */
    public function existsParameter($name) {
        return (isset($this->parameters[$name]) && $this->parameters[$name] != "");
    }

    /**
     * Returns the value of a requested parameter
     * 
     * @param string $name Parameter name
     * @return string Parameter value
     * @throws Exception if parameter found in request
     */
    public function getParameter($name) {
        if ($this->existsParameter($name)) {
            return $this->parameters[$name];
        }
        else {
            throw new Exception("Parameter '$name' does not exist");
        }
    }

}