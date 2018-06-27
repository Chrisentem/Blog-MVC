<?php

/**
 * Class that modelizes a session
 * encapsulate the superglobal PHP $_SESSION.
 * 
 * @author Chris Entem Based and translated in english from Baptiste Pesquet MVC Blog with user authentication
 * (https://github.com/bpesquet/MonBlog/tree/authentification)
 */
class Session
{

    /**
     * Builder
     * Start or restore a session
     */
    public function __construct()
    {
        session_start();
    }

    public function connectUser($userId, $login){
        $this->setAttribute("userId", $userId);
        $this->setAttribute("login", $login);
    }

    /**
     * Destroy current session
     */
    public function destroy()
    {
        session_destroy();
    }

    /**
     * Add an attribute to the session
     * 
     * @param string $name Attribut's name
     * @param string $value Attribute's value
     */
    public function setAttribute($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    /**
     * Returns True if attribute exists in session
     * @param string $name Attribute name
     * @return bool True if attribut exists and value si not empty 
     */
    public function existsAttribute($name)
    {
        return (isset($_SESSION[$name]) && $_SESSION[$name] != "");
    }

    /**
     * Returns value of the requested attribute
     * 
     * @param string $name Attribute name
     * @return string Attribute value
     * @throws Exception if attribute does not exist in session
     */
    public function getAttribute($name)
    {
        if ($this->existsAttribute($name)) {
            return $_SESSION[$name];
        }
        else {
            throw new Exception("Attribut '$name' missing from session");
        }
    }

}