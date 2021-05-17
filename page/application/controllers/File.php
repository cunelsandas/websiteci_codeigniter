<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 9:07
 */

class File extends CI_Controller
{
    public function index($name_type, $type)
    {
        $theme = new theme();
        $view = '';
        $data = [];
        $set = get_view($name_type);
        $data['head'] = $this->db->select('file_type_name')->from('set_file_type')->where('file_type_id', $type)->get()->row('file_type_name');
        $view = $set['view_path'];
        $data['table_name'] = $set['table_name'];
        $data['folder_name'] = $set['folder_name'];
        $data['site'] = site_url('file/detail/' . $name_type . '/' . $type);
        if ($data['head'] == null) {
            show_404();
        }
        $theme->_loadfrontend($view, $data);
    }

    public function view($name_type, $id)
    {
        $theme = new theme();
        $set = get_view($name_type);
        $table_name = $set['table_name'];
        $view = 'files/view';
        $data['set'] = $this->db->select('*')->where('no', $id)->get($table_name)->row_array();
        $data['file_type'] = $this->db->select('file_type_name')->where('file_type_id', $data['set']['filetypeid'])->get('set_file_type')->row('file_type_name');
        $data['table_name'] = $set['table_name'];
        $data['folder_name'] = $set['folder_name'];
        $theme->_loadfrontend($view, $data);
    }

    public function detail($name_type, $type, $page = 1)
    {
        $set = get_view($name_type);
        if (isset($_POST['data'])) {
            $Search = $_POST['data'];
            $limil = 10;
            $page = $page - 1;
            $offset = $limil * $page;
            $table_name = $set['table_name'];

            $data['data'] = $this->db->select('*')
                ->where('filetypeid', $type)
                ->where('status', 1)
                ->like('subject', $Search)
                ->limit($limil, $offset)
                ->order_by('datepost DESC', 'no DESC')
                ->get($table_name)
                ->result_array();
            $pageAll = $this->db->select('*')
                ->where('filetypeid', $type)
                ->where('status', 1)
                ->like('subject', $Search)
                ->get($table_name)
                ->num_rows();
            $data['page'] = ceil($pageAll / $limil);
            $data['site'] = site_url('file/detail/' . $name_type . '/' . $type . '/');
            $data['site_view'] = site_url('file/view/' . $name_type . '/');
            $data['pageNow'] = $page + 1;
            $data['offset'] = $offset;
            $view = 'frontend/files/table_detail';
            $this->load->view($view, $data);
        } else {
            show_404('404_override');
        }
    }
}