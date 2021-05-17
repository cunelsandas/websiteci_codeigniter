<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 7/5/2561
 * Time: 14:36
 */

class Facebook extends CI_Controller
{
    public function index()
    {
        $theme = new theme();
        $view = 'facebook/index';
        $theme->_loadfrontend($view);
    }

}