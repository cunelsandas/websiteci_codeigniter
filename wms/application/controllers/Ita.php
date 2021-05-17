<?php

/**

 * Created by PhpStorm.

 * User: Administrator

 * Date: 19/3/2561

 * Time: 15:16

 */



class Ita extends CI_Controller

{

    public function index()

    {
        $theme = new theme();

        $theme->_loadmodules('configita/ita');
    }



    public function view($name_type, $id = null)

    {

        $theme = new theme();

        $theme->_loadmodules('configita/ita_detail');

    }



    public function save($name_type, $id = null)

    {



    }


}