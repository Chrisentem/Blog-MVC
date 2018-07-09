<?php

require_once 'Configuration.php';
require_once 'Request.php';
require_once 'View.php';


/**
 * Abstract Class Controller. 
 * Provides common services to derivative controller classes.
 * 
 * @author Chris Entem Based and translated in english from Baptiste Pesquet MVC Blog with user authentication
 * (https://github.com/bpesquet/MonBlog/tree/authentification)
 */
abstract class Controller {

  /** Action to do **/
  protected $action;

  /** Incoming request **/
  protected $request;

  /** Usable for pagination with every child controller when needed **/
  const PER_PAGE = 5;

  /** Defines the incoming request
   *
   * @param Request $request incoming request
  */
  public function setRequest(Request $request) {
    $this->request = $request;
  }

  /**
  * Execute the action to do.
  * Call the method with the same name than the action on the current controller object
  * 
  * @throws Exception if the action does not exist in the current controller object
  */
  public function executeAction($action) {
    if (method_exists($this, $action)) {
      // set the private attribut $action
      $this->action = $action;
       // Call the method of the child controller
      $this->{$this->action}();
    }
    else {
      $controllerClass = get_class($this); // return the Class name of the current object
      throw new Exception("Action '$action' undefined in Class $controllerClass");
    }
  }

  /**
  * Abstract method corresponding to the default action
  * As default method (action) called, this method must be implemented in each child controller
  **/
  public abstract function index();

  /**
  * Generate the view associated with the current controller
  * 
  * @param array $viewData required data to generate the view (data are mostly extracted from DB with model class)
  * @param string $action Action associated with the view (let a controller to generate a view for a specific action)
  */  
  protected function generateView($viewData = array(), $action = null) {
    // Use of the current action as default action
    $actionView = $this->action;
    if ($action != null) {
    // Use of the given action in method params
      $actionView = $action;
    }    
    // Use of the current controller name
    $controllerClass = get_class($this);
    $controllerView = str_replace("Controller", "", $controllerClass);

    // Instanciate a new object View
    $vue = new View($actionView, $controllerView);
    // Generate the view with data defined or called in controller action method
    $vue->generate($viewData);
  }

     /**
     * Redirecting to a controller and a specific action
     * 
     * @param string $controller Controller
     * @param type $action Action Action
     */
    protected function redirect($controller, $action = null)
    {
        $webRoot = Configuration::get("webRoot", "/");
        // Redirection to URL /website_root/controller/action
        header("Location:" . $webRoot . $controller . "/" . $action);
    }

  /**
  * Returns the page number if exists or int(1) by default
  *
  * 
  **/
  public function buildCurrentPageNumber($maxPage) {
    if($this->request->existsParameter("page")){
      $cPage = $this->request->getParameter("page");
    }
    else {
      $cPage = 1;
    }
    return min(max($cPage, 1), $maxPage);
  }
    
}