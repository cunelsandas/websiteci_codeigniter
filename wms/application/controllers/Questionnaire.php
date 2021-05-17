<?php

/**

 * Created by PhpStorm.

 * User: Administrator

 * Date: 19/3/2561

 * Time: 15:16

 */



class Questionnaire extends CI_Controller

{

    public function index()

    {
        $theme = new theme();

        $theme->_loadmodules('configquestionnaire/questionnaire_project');
    }



    public function view($name_type, $id = null)

    {


    }



    public function save($name_type, $id = null)

    {



    }


}