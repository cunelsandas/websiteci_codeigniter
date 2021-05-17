<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 15:45
 */

class Tellme extends CI_Controller
{

    public function index()
    {

//        $theme = new theme();  ปิด index ไว้ไม่ให้ frontend เข้าถึงข้อมูล
//        $theme->_loadfrontend('tellme/index');
    }

    public function add()
    {
        $theme = new theme();
        $theme->_loadfrontend('tellme/addnew');
    }

    public function view()
    {
        $theme = new theme();
        $theme->_loadfrontend('tellme/view');


    }

    public function menu_index()
    {
        $theme = new theme();
        $theme->_loadfrontend('tellme/menu_index');


    }



}

