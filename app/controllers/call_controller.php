<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 12:57
 */
class Call_Controller extends Controller {

    function index()
    {

        $this->view->generate('call_view.php', SiteSettings::LAYOUT_FILE.'.php');
    }
}