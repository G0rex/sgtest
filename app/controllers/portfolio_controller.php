<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 16:16
 */
class Portfolio_Controller extends Controller {

    function index()
    {

        $this->view->generate('portfolio_view.php', SiteSettings::LAYOUT_FILE.'.php');
    }
}