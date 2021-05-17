<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 15:45
 */

class Catalog extends CI_Controller
{
    public function index($name_type)
    {
        $theme = new theme();
        $data = [];
        $set = get_view($name_type);
        $view = $set['view_path'];
        $data['head'] = $set['sub_name'];
        $data['table_name'] = $set['table_name'];
        $data['folder_name'] = $set['folder_name'];
        $data['site'] = $data['site'] = site_url('catalog/detail/' . $name_type . '/');
        $theme->_loadfrontend($view, $data);
    }

    public function view($name_type, $id)
    {
        $theme = new theme();
        $set = get_view($name_type);
        $table_name = $set['table_name'];
        $view = 'catalog/view';
        $data['set'] = $this->db->select('*')->where('no', $id)->get($table_name)->row_array();
        $data['table_name'] = $set['table_name'];
        $data['folder_name'] = $set['folder_name'];
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
                ->like('subject', $Search)
                ->where('status', 1)
                ->order_by('datepost DESC', 'no DESC')
                ->limit($limil, $offset)
                ->get($table_name)
                ->result_array();
            $pageAll = $this->db->select('*')
                ->like('subject', $Search)
                ->where('status', 1)
                ->get($table_name)
                ->num_rows();

            $data['page'] = ceil($pageAll / $limil);
            $data['site'] = site_url('catalog/detail/' . $name_type . '/');
            $data['site_view'] = site_url('catalog/view/' . $name_type . '/');
            $data['table_name'] = $table_name;
            $data['folder_name'] = $set['folder_name'];
            $data['pageNow'] = $page + 1;
            $data['offset'] = $offset;
            $view = 'frontend/catalog/new_detail';
            $this->load->view($view, $data);
        }
    }
}