<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 11:02
 */
require_once 'config/config.php';
require_once 'config/config_db.php';
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
$route = new Router();
$route->route($_SERVER['REQUEST_URI'],'app/controllers/','');

