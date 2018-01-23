<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 16:28
 */
class Blog_Controller extends Controller {

    function index()
    {

        $this->view->generate('blog_view.php', SiteSettings::LAYOUT_FILE.'.php');
    }
}