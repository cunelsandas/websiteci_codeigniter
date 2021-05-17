<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 31/3/2561
 * Time: 13:16
 */

class Home extends CI_Controller
{
    public function index()
    {
        $theme = new theme();
        $view = 'home/index';
        $theme->_loadbackend($view);
    }
}