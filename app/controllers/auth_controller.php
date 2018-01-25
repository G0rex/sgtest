<?php

/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 17:16
 */
class Auth_Controller extends Controller
{

    /**Метод обработки логина
     *
     */
    function login()
    {

        $arguments = array();
        if (!empty($_REQUEST)) {
            $auth = new Auth();
            $email = $_REQUEST['uname'];
            $password = sha1(md5('qw5hj7bs3' . $_REQUEST['psw'] . $_REQUEST['uname']));
            if (!$auth->checkLoginUser($email, $password)) {
                header("Location: /auth/login");
                die();
            }
            session_start();
            $_SESSION['id'] = $auth->returnUserId($email, $password);
            header("Location: /");

        }

        $this->view->generate('login_view.php', SiteSettings::LAYOUT_FILE . '.php', $data = $arguments);
    }

    /**Метод обработки регистрации
     *
     */
    function registration()
    {
        if (!empty($_REQUEST)) {

            $email = $_REQUEST['email'];
            $password = sha1(md5('qw5hj7bs3' . $_REQUEST['psw'] . $_REQUEST['email']));
            $auth = new Auth();
            $auth->registerUser( $password,$email);
            session_start();
            $_SESSION['id'] = $auth->returnUserId($email, $password);

            $this->view->generate('blog_view.php', SiteSettings::LAYOUT_FILE . '.php');
        }
        $this->view->generate('registration_view.php', SiteSettings::LAYOUT_FILE . '.php');
    }

    /**
     *Метод обработки логаута
     */
    function logout()
    {
        session_start();
        unset($_SESSION['id']);
        header("Location: /auth/login");
    }
}