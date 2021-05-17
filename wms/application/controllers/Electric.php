<?php

/**

 * Created by PhpStorm.

 * User: Administrator

 * Date: 19/3/2561

 * Time: 15:16

 */



class Electric extends CI_Controller

{

    public function index()

    {

        $theme = new theme();

        $theme->_loadmodules('config_electric/helpme');

    }



    public function view()

    {

        $theme = new theme();

        $theme->_loadmodules('config_electric/helpme_view');



    }



    public function save($name_type, $id = null)

    {



    }

}