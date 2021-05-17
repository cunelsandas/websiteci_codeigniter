<?php

/**

 * Created by PhpStorm.

 * User: Administrator

 * Date: 19/3/2561

 * Time: 15:16

 */



class People_opinion extends CI_Controller

{

    public function index()

    {

        $theme = new theme();

        $theme->_loadmodules('config_people_opinion/tellme');

    }



    public function view()

    {

        $theme = new theme();

        $theme->_loadmodules('config_people_opinion/tellme_view');



    }



    public function save($name_type, $id = null)

    {



    }

}