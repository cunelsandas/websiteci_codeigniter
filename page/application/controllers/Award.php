<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 15:45
 */

class Award extends CI_Controller
{

    public function index()
    {

        $theme = new theme();
        $theme->_loadfrontend('award/index');
    }

    public function add()
    {
        $theme = new theme();
        $theme->_loadfrontend('award/addnew');
    }

    public function view()
    {
        $theme = new theme();
        $theme->_loadfrontend('award/view');


    }

    public function menu_index()
    {
        $theme = new theme();
        $theme->_loadfrontend('award/menu_index');


    }



}

