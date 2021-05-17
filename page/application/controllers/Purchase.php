<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 24/3/2561
 * Time: 10:00
 */

class Purchase extends CI_Controller
{
    public function index($name_type)
    {
        $theme = new theme();
        $view = '';
        $data = [];
        $set = get_view($name_type);
        $data['head'] = $set['sub_name'];
        $view = $set['view_path'];
        $data['table_name'] = $set['table_name'];
        $data['folder_name'] = $set['folder_name'];
        $data['site'] = site_url('purchase/detail/' . $name_type);
        $data['purchase_type'] = $this->db->select('*')->get('tb_purchase_group')->result_array();
        if ($data['head'] == null) {
            show_404();
        }
        $theme->_loadfrontend($view, $data);
    }

    public function view($name_type, $id)
    {
        $theme = new theme();
        $data = [];
        $theme = new theme();
        $set = get_view($name_type);
        $table_name = $set['table_name'];
        $view = 'purchases/view';
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
            $Type = $_POST['type'];
            $limil = 10;
            $page = $page - 1;
            $offset = $limil * $page;
            $table_name = $set['table_name'];

            $data['data'] = $this->db->select('*')
                ->where('groupid', $Type)
                ->where('status', 1)
                ->like('subject', $Search)
                ->order_by('datepost', 'DESC')
                ->limit($limil, $offset)
                ->get($table_name)
                ->result_array();
            $pageAll = $this->db->select('*')
                ->where('groupid', $Type)
                ->where('status', 1)
                ->like('subject', $Search)
                ->get($table_name)
                ->num_rows();

            $data['page'] = ceil($pageAll / $limil);
            $data['name_type'] = $this->db->where('id', $Type)->get('tb_purchase_group')->row('name');
            $data['site'] = site_url('purchase/detail/' . $name_type . '/');
            $data['site_view'] = site_url('purchase/view/' . $name_type . '/');
            $data['table_name'] = $table_name;
            $data['folder_name'] = $set['folder_name'];
            $data['pageNow'] = $page + 1;
            $data['offset'] = $offset;
            $view = 'frontend/purchases/purchase_detail';
            $this->load->view($view, $data);
        }
    }
}