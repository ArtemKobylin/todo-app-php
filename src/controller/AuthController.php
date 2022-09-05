<?php

require_once "BaseController.php";
require dirname(__DIR__) . "../service/UserService.php";

class AuthController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function login()
    {
        if ($this->isPost()) {
            $variables = $this->getVariables();
            $userService = new UserService();
            $username = $variables->username;
            $password = $variables->password;
            if(!$username || !$password) {
                $this->view('login', [
                    'errorMessage' => 'username and password must be present'
                ], 'auth-layout');  
            }
            $result = $userService->login($username, $password);
            if($result === null) {
                $this->view('login', [
                    'errorMessage' => 'incorrect username /password'
                ], 'auth-layout');  
            } else {
                $this->setCurrentUser($result);
                $this->redirect('/home');
            }  
        }
        echo $this->view('login', [], 'auth-layout');
    }

    public function logout()
    {
        $_SESSION['user'] = null;
        session_destroy();
        $this->redirect('/home');
    }
}
