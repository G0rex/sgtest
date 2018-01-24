<?php

/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 23.01.18
 * Time: 11:18
 */
class Router
{

    public function route($uri,  $check_file_in_dir = '', $params = false)
    {

        try {

            list($controller_name, $controller_function) = self::parseURI($uri);
            $controller_name = ucwords($controller_name);

            $controller_class = $controller_name . '_Controller';
            $controller_file = strtolower($controller_name) . '_controller.php';
            if ($check_file_in_dir && !is_file($check_file_in_dir . 'app/controllers/' . $controller_file . '.php')) {
                throw new \Exception('file doesnt exist ' . $controller_class);
            }

            include_once 'app/controllers/' . $controller_file;

            $model_name = ''.$controller_name;
            $model_file = strtolower($model_name).'.php';
            $model_path = "app/models/".$model_file;
            if ($check_file_in_dir && !is_file($model_path . '.php')) {
                throw new \Exception('file doesnt exist ' . $model_file);
            }

            include "app/models/".$model_file;

            $controller = new $controller_class();

            if (!method_exists($controller, $controller_function)) {
                $controller_function_2 = ucwords($controller_function);
                if (method_exists($controller, $controller_function_2)) {
                    $controller_function = $controller_function_2;
                } else {

                    $controller_function = 'index';
                }
            }
         
            
            $controller->$controller_function();

        } catch (Exception $e) {
            print_r($e);
        }
    }

    public static function parseURI($uri)
    {
        $uri_parsed_big = parse_url($uri);
        $uri_path = isset($uri_parsed_big['path']) ? $uri_parsed_big['path'] : null;


        $uri_parsed = explode('/', $uri_path);
        $controller_name = 'Index';
        $controller_function = 'index';

        if (count($uri_parsed)) {
            $controller_name = array_shift($uri_parsed);
            if (!$controller_name) {
                $controller_name = array_shift($uri_parsed);
            }
            if (!$controller_name) {
                $controller_name = 'Index';
            }
        }
        if (count($uri_parsed)) {
            $controller_function = array_shift($uri_parsed);
        }

        if ($controller_function && $controller_function[0] === '_') {
            $controller_function = substr($controller_function, 1);
        }
        if (!$controller_function) {
            $controller_function = 'index';
        }

        return array($controller_name, $controller_function);
    }
} 