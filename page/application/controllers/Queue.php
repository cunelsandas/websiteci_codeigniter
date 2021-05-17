<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 15:45
 */

class Queue extends CI_Controller
{

    public function index()
    {

        $theme = new theme();
        $theme->_loadfrontend('queue/queue');
    }

    public function add()
    {
        $theme = new theme();
        $theme->_loadfrontend('queue/addnew');
    }

    public function view()
    {
        $theme = new theme();
        $theme->_loadfrontend('queue/view');


    }




}

