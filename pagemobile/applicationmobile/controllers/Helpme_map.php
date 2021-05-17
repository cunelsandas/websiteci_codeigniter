<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 15:45
 */

class Helpme_map extends CI_Controller
{

    public function index()
    {

        $theme = new theme();
        $theme->_loadfrontend('helpme_map/index');
    }

    public function add()
    {
        $theme = new theme();
        $theme->_loadfrontend('helpme_map/addnew');
    }

    public function view()
    {
        $theme = new theme();
        $theme->_loadfrontend('helpme_map/view');


    }

    public function menu_index()
    {
        $theme = new theme();
        $theme->_loadfrontend('helpme_map/menu_index');


    }



}

