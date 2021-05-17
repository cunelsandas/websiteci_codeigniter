<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 15:45
 */

class Electric extends CI_Controller
{

    public function index()
    {

        $theme = new theme();
        $theme->_loadfrontend('electric/index');
    }

    public function add()
    {
        $theme = new theme();
        $theme->_loadfrontend('electric/addnew');
    }

    public function view()
    {
        $theme = new theme();
        $theme->_loadfrontend('electric/view');


    }

    public function menu_index()
    {
        $theme = new theme();
        $theme->_loadfrontend('electric/menu_index');


    }



}

