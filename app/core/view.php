<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 12:08
 */

class View
{


    /**
     * @param $content_view
     * @param $template_view
     * @param null $data
     */
    function generate($content_view, $template_view, $data = null)
    {

        include 'app/views/layouts/'.$template_view;
    }
}