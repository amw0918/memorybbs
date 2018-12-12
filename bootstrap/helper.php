<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/12/12
 * Time: 0:38
 */
if (!function_exists('route_class')) {
    function route_class()
    {
        return str_replace('.', '-', Route::currentRouteName());
        echo 33;

    }
}