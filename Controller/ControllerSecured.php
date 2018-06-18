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

}

