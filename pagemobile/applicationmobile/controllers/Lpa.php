<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 15:45
 */

class Lpa extends CI_Controller
{

    public function index()
    {

        $theme = new theme();
        $theme->_loadfrontend('lpa/lpa');
    }

    public function add()
    {
        $theme = new theme();
        $theme->_loadfrontend('accident/datedb.php');
    }

    public function view()
    {
        $theme = new theme();
        $theme->_loadfrontend('accident/view');


    }

    public function menu_index()
    {
        $theme = new theme();
        $theme->_loadfrontend('accident/menu_index');


    }



}

