<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/3/2561
 * Time: 15:16
 */

 class Content extends CI_Controller
 {
     private function get_data($table, $id)
     {
         $data = $this->db->select('content_detail')->from($table)->where('sub_id', $id)->get()->row('content_detail');
         return $data;
     }

     public function index($name_type)
     {
         $theme = new theme();
         $data = [];
         $set = get_view($name_type);
         $all = self::get_data($set['table_name'], $set['sub_id']);
         $view = $set['view_path'];
         $data['head'] = $set['sub_name'];
         $data['detail'] = $all;
         $theme->_loadfrontend($view, $data);
     }
 }
