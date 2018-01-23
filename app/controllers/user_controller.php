<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 12:57
 */
class User_Controller extends Controller {

    function __construct()
    {
        parent::__construct();
        $this->model = new User();
        $this->view = new View();
    }
    function index()
    {
        
        $this->view->generate('user_view.php', SiteSettings::LAYOUT_FILE.'.php', $this->model->getData() );
    }
}