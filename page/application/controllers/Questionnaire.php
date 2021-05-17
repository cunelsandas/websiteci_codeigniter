<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 15:45
 */

class Questionnaire extends CI_Controller
{

    public function index()
    {

            $theme = new theme();
            $theme->_loadfrontend('questionnaire/questionnaire');
    }

}

