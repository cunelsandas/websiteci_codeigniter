<?php

/**

 * Created by PhpStorm.

 * User: Administrator

 * Date: 19/3/2561

 * Time: 15:16

 */



class Ita2564 extends CI_Controller

{

    public function index()

    {
        $theme = new theme();

        $theme->_loadmodules('configita2564/ita');
    }



    public function view($name_type, $id = null)

    {

        $theme = new theme();

        $theme->_loadmodules('configita2564/ita_detail');

    }



    public function save($name_type, $id = null)

    {



    }


}