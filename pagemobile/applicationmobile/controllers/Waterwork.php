<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 15:45
 */

class Waterwork extends CI_Controller
{

    public function index()
    {

        $theme = new theme();
        $theme->_loadfrontend('waterwork/index');
    }

    public function add()
    {
        $theme = new theme();
        $theme->_loadfrontend('waterwork/addnew');
    }

    public function view()
    {
        $theme = new theme();
        $theme->_loadfrontend('waterwork/view');


    }

    public function menu_index()
    {
        $theme = new theme();
        $theme->_loadfrontend('waterwork/menu_index');


    }



}

