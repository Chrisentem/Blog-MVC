<?php

require_once 'Framework/Model.php';

/**
 * Modelize a user of the blog
 *
 * @author Chris Entem Based and translated in english from Baptiste Pesquet MVC Blog with user authentication
 * (https://github.com/bpesquet/MonBlog/tree/authentification)
 */
class User extends Model {

    /**
     * Check if user is into the DB
     * Check if password is valid
     * 
     * @param string $login The given login
     * @param string $pw The given password
     * @return boolean True if user exists, otherwise False
     */
    public function connect($login, $pw)
    {
        $sql = "SELECT USER_ID, USER_PW from T_USER WHERE USER_LOGIN = ?";
        // Getting data from DB for the given Login
        $pdoStm = $this->executeRequest($sql, array($login));

        if($pdoStm->rowCount()){
           $userData =  $pdoStm->fetch();
           // check if given password match with the password hash on DB
           return password_verify($pw, $userData['USER_PW']);
        }
        // If login not found
        return false;

        //$hash = password_hash($pw, PASSWORD_BCRYPT);
        // $sql = "select USER_ID from T_USER where USER_LOGIN=? and USER_PW=?";
        // $user = $this->executeRequest($sql, array($login, $hash));
        // return ($user->rowCount() == 1); // returns first row data
    }

    /**
     * Return an existing user from DB
     * 
     * @param string $login The login
     * @return mixed The user
     * @throws Exception if no user matches with the parameters
     */
    public function getUser($login)
    {
        $sql = "select USER_ID as userId, USER_LOGIN as login 
            from T_USER where USER_LOGIN=?";
        $user = $this->executeRequest($sql, array($login));
        if ($user->rowCount() == 1)
            return $user->fetch();  // First line of result
        else
            throw new Exception("No user match with the given ids");
    }

}

