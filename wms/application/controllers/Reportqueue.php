<?php



/**

 * Created by PhpStorm.

 * User: Administrator

 * Date: 19/3/2561

 * Time: 15:16

 */



class Reportqueue extends CI_Controller

{



    public function index()

    {
        $this->load->view('/modules/config_report/print_queue_present');
    }

    public function index2()

    {
        $this->load->view('/modules/config_report/print_queue_future');
    }

}