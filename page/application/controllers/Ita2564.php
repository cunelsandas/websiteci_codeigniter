<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 15:45
 */

class Ita2564 extends CI_Controller
{

    public function index()
    {

        $theme = new theme();
        $theme->_loadfrontend('ita2564/ita');
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

