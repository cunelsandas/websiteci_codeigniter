<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 15:45
 */

class Paytax extends CI_Controller
{

    public function index()
    {

        $theme = new theme();
        $theme->_loadfrontend('paytax/index');
    }

    public function add()
    {
        $theme = new theme();
        $theme->_loadfrontend('paytax/addnew');
    }

    public function view()
    {
        $theme = new theme();
        $theme->_loadfrontend('paytax/view');


    }




}

