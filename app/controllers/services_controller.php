<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 16:16
 */
class Services_Controller extends Controller {

    /**
     *Затычка для шаблона
     */
    function index()
    {

        $this->view->generate('services_view.php', SiteSettings::LAYOUT_FILE.'.php');
    }
}