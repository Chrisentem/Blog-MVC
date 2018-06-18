<?php

require_once 'Configuration.php';

/**
 * @author Chris Entem Based and translated in english from Baptiste Pesquet MVC Blog with user authentication
 * (https://github.com/bpesquet/MonBlog/tree/authentification)
 */
abstract class Model {

    /** PDO object for DB access 
    *   Static attribute :shared with all the derivated class instances
    */
    private static $db;

    /**
     * Execute SQL Query
     * 
     * @param string $sql SQL Query
     * @param array $params Query parameters
     * @return PDOStatement Query result
     */
    protected function executeRequest($sql, $params = null) {
        if ($params == null) {
            $req = self::getDb()->query($sql);   // exécution directe
        }
        else {
            $req = self::getDb()->prepare($sql); // requête préparée
            $req->execute($params);
        }
        return $req;
    }

    /**
     * Returns a connection object to the DB and initialize the connection if needed
     * 
     * @return PDO PDO Object of connection to the DB
     */
    private static function getDb() {
        if (self::$db === null) {
            // Récupération des paramètres de configuration BD
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $pw = Configuration::get("pw");
            // Création de la connexion
            self::$db = new PDO($dsn, $login, $pw, 
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$db;
    }

}
