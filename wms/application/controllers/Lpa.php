<?php

/**

 * Created by PhpStorm.

 * User: Administrator

 * Date: 19/3/2561

 * Time: 15:16

 */



class Lpa extends CI_Controller

{

    public function index()

    {
        $theme = new theme();

        $theme->_loadmodules('configlpa/lpa');
    }



    public function view($name_type, $id = null)

    {

        $theme = new theme();

        $theme->_loadmodules('configlpa/lpa_detail');

    }



    public function save($name_type, $id = null)

    {



    }


}