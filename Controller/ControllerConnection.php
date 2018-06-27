<?php

require_once 'Framework/Controller.php';
require_once 'Model/User.php';

/**
 * Controller that manage the connexion to the website
 *
 * @author Chris Entem Based and translated in english from Baptiste Pesquet MVC Blog with user authentication
 * (https://github.com/bpesquet/MonBlog/tree/authentification)
 */
class ControllerConnection extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $this->generateView();
    }

    public function connect()
    {
        if ($this->request->existsParameter("login") && $this->request->existsParameter("pw")) {
            $login = $this->request->getParameter("login");
            $pw = $this->request->getParameter("pw");
            // Check if Login exist and if Password is valid with User method connect
            if ($this->user->connect($login, $pw)) {
                $user = $this->user->getUser($login);
               $this->request->getSession()->connectUser($user['userId'], $user['login']);
                // $this->request->getSession()->setAttribute("userId",
                //         $user['userId']);
                // $this->request->getSession()->setAttribute("login",
                //         $user['login']);
                $this->redirect("admin");
            }
            else
                $this->generateView(array('msgError' => 'Login or password is incorrect'),
                        "index");
        }
        else
            throw new Exception("Action impossible : login or password undefined ");
    }

    public function disconnect()
    {
        $this->request->getSession()->destroy();
        $this->redirect("home");
    }

}
