<?php



/**

 * Created by PhpStorm.

 * User: Administrator

 * Date: 19/3/2561

 * Time: 15:16

 */



class Reportelectric extends CI_Controller

{



    public function index()

    {

        $this->load->view('/modules/config_report/html_electric');

    }

}