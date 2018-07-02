<?php

require_once 'Framework/Controller.php';

/**
 * Parent Class of Controllers with required authentification
 *
 * @author Chris Entem Based and translated in english from Baptiste Pesquet MVC Blog with user authentication
 * (https://github.com/bpesquet/MonBlog/tree/authentification)
 */
abstract class ControllerSecured extends Controller
{
    // Override of Controller method executeAction()
    public function executeAction($action)
    {
        // Check if user's informations are already in session
        // if yes, user is already identified : action continues to be executed normally
        // If not, user is redirected to the connexion controller
        if ($this->request->getSession()->existsAttribute("userId")) {
            parent::executeAction($action);
        }
        else {
            $this->redirect("connection");
        }
    }

    // Override of Controller method
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
        // Generate the view with $isAdmin is true
        $vue->generate($viewData, true);
    }

}

