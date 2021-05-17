<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 15:45
 */

class People_opinion extends CI_Controller
{

    public function index()
    {

//        $theme = new theme();  ปิด index ไว้ไม่ให้ frontend เข้าถึงข้อมูล
//        $theme->_loadfrontend('tellme/index');
    }

    public function add()
    {
        $theme = new theme();
        $theme->_loadfrontend('people_opinion/addnew');
    }

    public function view()
    {
        $theme = new theme();
        $theme->_loadfrontend('people_opinion/view');


    }

    public function menu_index()
    {
        $theme = new theme();
        $theme->_loadfrontend('people_opinion/menu_index');


    }



}

