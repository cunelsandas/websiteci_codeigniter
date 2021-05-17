<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/4/2561
 * Time: 9:12
 */

class Test extends CI_Controller
{
    public function index()
    {
        /*$theme = new theme();
        $data = [];
        $get = $_GET['type'];
        $set = get_view($get);
        $view = $set['wms_path'] . 'index';
        $data['head'] = $set['sub_name'];
        $data['site'] = site_url('menu_sub/detail/' . $get);
        $data['site_add'] = site_url('menu_sub/view/' . $get);
        $data['btn_add'] = 'เพิ่ม' . $set['sub_name'];
        $theme->_loadmodules($view, $data);*/
        $this->db->select('sub_name,sub_id,');
    }

    public function view($id)
    {
        echo $id;
    }

}