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
                echo 'You are not authorised!';
                exit;
            }
            echo 'You are authorised!';
            exit;

        }
        
        $this->view->generate('login_view.php', SiteSettings::LAYOUT_FILE . '.php', $data = $arguments);
    }

    function registration()
    {
        if (!empty($_REQUEST)) {
            $login = $_REQUEST['email'];
            if ($_REQUEST['psw'] !== $_REQUEST['psw-repeat']) {
                throw new Exception("Value must be 1 or below");
            }
            $password = sha1(md5('qw5hj7bs3' . $_REQUEST['psw'] . $_REQUEST['email']));
            $auth = new Auth();
            $auth->registerUser($login, $password);
        }
        $this->view->generate('registration_view.php', SiteSettings::LAYOUT_FILE . '.php');
    }
}