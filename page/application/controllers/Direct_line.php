<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 15:45
 */

class Direct_line extends CI_Controller
{

    public function index()
    {

        $theme = new theme();
        $theme->_loadfrontend('direct_line/index');
    }

    public function add()
    {
        $theme = new theme();
        $theme->_loadfrontend('direct_line/addnew');
    }

    public function view()
    {
        $theme = new theme();
        $theme->_loadfrontend('direct_line/view');


    }

    public function menu_index()
    {
        $theme = new theme();
        $theme->_loadfrontend('direct_line/menu_index');


    }



}

