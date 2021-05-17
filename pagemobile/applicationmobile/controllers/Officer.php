<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 21/3/2561
 * Time: 16:22
 */

class Officer extends CI_Controller
{
    private function get_img($tablename, $masterid)
    {
        $file = $this->db->select('filename')->from('filename')->where('tablename', $tablename)->where('masterid', $masterid)->get()->row('filename');
        return $file;
    }

    private function get_data($table_name, $type)
    {
        return $data = $this->db->select('*')->where('status', 1)->where('offid', $type)->where('name !=', 'blank')->order_by('nolist')->get($table_name)->result_array();
    }

    public function index($id, $type)
    {
        $theme = new theme();
        $data = [];
        $set_data = $this->db->where('office_type_id', $type)->get('set_office_type')->row_array();
        $data['head'] = 'โครงสร้างบุคลากร ' . $set_data['office_type_name'];
        $set = get_view($id);
        $view = $set['view_path'];
        $all = self::get_data($set['table_name'], $type);
        foreach ($all as $aKey => $aVal) {
            $all[$aKey]['name'] = $aVal['name'];
            $all[$aKey]['position'] = $aVal['position'];
            $all[$aKey]['sid'] = $aVal['sid'];
            $all[$aKey]['status'] = $aVal['status'];
            $all[$aKey]['folder_name'] = $set['folder_name'];
            $all[$aKey]['filename'] = self::get_img($set['table_name'], $aVal['no']);
        }
        $type = ['offid' => $type];
        $data['table_name'] = $set['table_name'];
        $data['folder_name'] = $set['folder_name'];
        $data['set_data'] = $set_data;
        $data['all'] = $all;
        $data['office_name'] = $set_data['office_type_name'];
        $data['type'] = $type;
        $theme->_loadfrontend($view, $data);
    }
}