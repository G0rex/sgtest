<?php

/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 17:16
 */
class Auth_Controller extends Controller
{

    function login()
    {

        $arguments = array();
        if (!empty($_REQUEST)) {
            $auth = new Auth();
            $login = $_REQUEST['uname'];
            $password = sha1(md5('qw5hj7bs3' . $_REQUEST['psw'] . $_REQUEST['uname']));
            if (!$auth->checkLoginUser($login, $password)) {
                header("Location: /auth/login");
                die();
            }
            session_start();
            $_SESSION['id'] = $auth->returnUserId($login, $password);
            header("Location: /");

        }

        $this->view->generate('login_view.php', SiteSettings::LAYOUT_FILE . '.php', $data = $arguments);
    }

    function registration()
    {
        if (!empty($_REQUEST)) {
            $login = $_REQUEST['email'];
            $password = sha1(md5('qw5hj7bs3' . $_REQUEST['psw'] . $_REQUEST['email']));
            $auth = new Auth();
            $auth->registerUser($login, $password);
        }
        $this->view->generate('registration_view.php', SiteSettings::LAYOUT_FILE . '.php');
    }

    function logout()
    {
        session_start();
        unset($_SESSION['id']);
        header("Location: /auth/login");
    }
}