<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 20/3/2561
 * Time: 16:56
 */

class Personnel extends CI_Controller
{
    private function get_data($table_name)
    {
        return $data = $this->db->select('*')->where('status', 1)->order_by('no asc','sid asc','nolist asc')->get($table_name)->result_array();
    }

    private function get_img($tablename, $masterid)
    {
        $file = $this->db->select('filename')->from('filename')->where('tablename', $tablename)->where('masterid', $masterid)->get()->row('filename');
        return $file;
    }

    public function index($id)
    {
        $theme = new theme();
        $data = [];
        $set = get_view($id);
        $all = self::get_data($set['table_name']);
        foreach ($all as $aKey => $aVal) {
            $all[$aKey]['name'] = $aVal['name'];
            $all[$aKey]['position'] = $aVal['position'];
            $all[$aKey]['sid'] = $aVal['sid'];
            $all[$aKey]['status'] = $aVal['status'];
            $all[$aKey]['folder_name'] = $set['folder_name'];
            $all[$aKey]['filename'] = self::get_img($set['table_name'], $aVal['no']);
        }
        $view = $set['view_path'];
        $data['head'] = $set['sub_name'];
        $data['all'] = $all;
        $data['table_name'] = $set['table_name'];
        $theme->_loadfrontend($view, $data);
    }
}