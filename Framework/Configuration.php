<?php

/**
 * Management class of configuration parameters.
 * Inspired by the SimpleFramework from Frédéric Guillot
 * (https://github.com/fguillot/simpleFramework)
 *
 * @author Chris Entem Based and translated in english from Baptiste Pesquet MVC Blog with user authentication
 * (https://github.com/bpesquet/MonBlog/tree/authentification)
 */
class Configuration {

  private static $parameters;

  /** Returns the value of a configuration parameter
  *
  * @param string $name Parameter name
  * @param string $defaultValue Default value to return
  * @return string Parameter value
  */
  public static function get($name, $defaultValue = null) {
    $parameters = self::getParameters();
    if (isset($parameters[$name])) {
      $value = $parameters[$name];
    }
    else {
      $value = $defaultValue;
    }
    return $value;
  }

  /**
  * Returns the parameters array and load it if necessary from configuration file.
  * The searched configuration files are Config/dev.ini and Config/prod.ini (in this order)
  * 
  * @return array Parameters array
  * @throws Exception If no configuration file found
  */
  private static function getParameters() {
    if (self::$parameters == null) {
      $filePath = "Config/dev.ini";
      if (!file_exists($filePath)) {
        $filePath = "Config/prod.ini";
      }
      if (!file_exists($filePath)) {
        throw new Exception("No configuration file found ! ");
      }
      else {
        self::$parameters = parse_ini_file($filePath);
      }
    }
    return self::$parameters;
  }
}