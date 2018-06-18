<?php

require_once 'Controller.php';
require_once 'Request.php';
require_once 'View.php';

/**
 * @author Chris Entem Based and translated in english from Baptiste Pesquet MVC Blog with user authentication
 * (https://github.com/bpesquet/MonBlog/tree/authentification)
 */

class Router {

  /**
  * Main method called by the front controller
  * Incoming request is routed : matching action is executed
  */
  public function routingRequest() {
    try {
      // Merging of the request parameters GET and POST
      $request = new Request(array_merge($_GET, $_POST));
      // We use the parameters to define and call the right controller
      // and action (object controller method)
      $controller = $this->buildController($request);
      $action = $this->buildAction($request);
      // Call to method executeAction of class controller with the defined action
      $controller->executeAction($action);
    }
    catch (Exception $e) {
      $this->manageError($e);
    }
  }

  /**
  * instantiate the right controller with the received request
  * 
  * @param Request $request received request
  * @return Controller instance
  * @throws Exception If the controller creation fails
  */
  private function buildController(Request $request) {
    // With redirection, all incoming URLs are like :
    // index.php?controller=XXX&action=YYY&id=ZZZ
    $controllerSuffix = "Home";  // Default controller suffix is "Home" to call ControllerHome
    if ($request->existsParameter('controller')) {
      $controllerSuffix = $request->getParameter('controller');
      // First letter to uppercase
      $controllerSuffix = ucfirst(strtolower($controllerSuffix));
    }
    // Once we have the Suffix we can create the controller filename
    $controllerClass = "Controller" . $controllerSuffix;
    $controllerFilePath = "Controller/" . $controllerClass . ".php";
    if (file_exists($controllerFilePath)) {
      // Now the right controller matching with the url request is required
      require($controllerFilePath);
      // We instantiate a new controller object 
      $controller = new $controllerClass();
      $controller->setRequest($request);
      return $controller;
    }
    else
      throw new Exception("File '$controllerFile' not found");
  }

  /**
  * Determine the action to execute based on the request received
  * 
  * @param Request $request received request
  * @return string Action to execute
  */
  private function buildAction(Request $request) {
    $action = "index";  // default action (called method of current controller object)
    if ($request->existsParameter('action')) {
      $action = $request->getParameter('action');
    }
    return $action;
  }

  // Manage execution error (exception)
  private function manageError(Exception $exception) {
    $vue = new View('error');
    $vue->generate(array('msgError' => $exception->getMessage()));
  }
}