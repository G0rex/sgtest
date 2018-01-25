<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 16:17
 */
class Contactus_Controller extends Controller {

    /**
     *Затычка для шаблона
     */
    function index()
    {

        $this->view->generate('contactus_view.php', SiteSettings::LAYOUT_FILE.'.php');
    }
}