<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 12:06
 */
class Index_Controller extends Controller {

    /**
     *Затычка для шаблона
     */
    function index()
    {
        
         $this->view->generate('index_view.php', SiteSettings::LAYOUT_FILE.'.php');
    }
}