<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/3/2561
 * Time: 15:16
 */

class Youtube extends CI_Controller
{
    public function index($name_type)
    {
        $theme = new theme();
        $data = [];
        $set = get_view($name_type);
        $view = $set['view_path'];
        $data['head'] = $set['sub_name'];
        $data['site'] = site_url('youtube/detail/' . $name_type);
        $theme->_loadfrontend($view, $data);
    }

    public function detail($name_type, $page = 1)
    {
        $set = get_view($name_type);
        if (isset($_POST['data'])) {
            $Search = $_POST['data'];
            $limil = 5;
            $page = $page - 1;
            $offset = $limil * $page;
            $table_name = $set['table_name'];

            $data['data'] = $this->db->select('*')
                ->like('name',$Search)
                ->limit($limil, $offset)
                ->get($table_name)
                ->result_array();
            $pageAll = $this->db->select('*')
                ->like('name',$Search)
                ->get($table_name)
                ->num_rows();

            $data['page'] = ceil($pageAll / $limil);
            $data['site'] = site_url('youtube/detail/' . $name_type . '/');
            $data['site_view'] = site_url('youtube/view/' . $name_type . '/');
            $data['table_name'] = $table_name;
            $data['folder_name'] = $set['folder_name'];
            $data['pageNow'] = $page + 1;
            $data['offset'] = $offset;
            $view = 'frontend/youtube/detail';
            $this->load->view($view, $data);
        }
    }
}