<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/3/2561
 * Time: 15:45
 */

class Vote extends CI_Controller
{
    public $ci_name;

    public function __construct()
    {
        parent::__construct();
        $this->ci_name = $this->router->fetch_class();
        $this->load->model('vote_model');
    }

    public function index($name_type)
    {
        $theme = new theme();
        $data = [];
        $set = get_view($name_type);
        $ci = $this->ci_name;
        $view = $set['wms_path'] . 'index';
        $data['head'] = $set['sub_name'];
        $data['table_name'] = $set['table_name'];
        $data['folder_name'] = $set['folder_name'];
        $data['btn_add'] = 'เพิ่ม' . $set['sub_name'];
        $data['site'] = site_url($ci . '/detail/' . $name_type . '/');
        $data['site_add'] = site_url($ci . '/view/' . $name_type . '/');
        $theme->_loadmodules($view, $data);
    }

    public function view($name_type, $id = null)
    {
        $set = get_view($name_type);
        $ci = $this->ci_name;
        $table_name = $set['table_name'];
        $vote_detail = [];
        if ($id == null):
            $head = 'เพิ่ม' . $set['sub_name'];
            $set_data = $this->db->get($table_name)->row_array();
            if ($set_data != null):
                foreach ($set_data as $sKey => $sVal) {
                    $set_data[$sKey] = '';
                }
            endif;
        else:
            $head = 'แก้ไข' . $set['sub_name'];
            $set_data = $this->db->where('id', $id)->get($set['table_name'])->row_array();
            $vote_detail = $this->db->where('masterid', $id)->get('vote_detail')->result_array();
        endif;
        $data['set_data'] = $set_data;
        $data['head'] = $head;
        $data['vote_detail'] = $vote_detail;
        $data['site_save'] = site_url($ci . '/save/' . $name_type . '/' . $id);
        $data['site_save_detail'] = site_url($ci . '/save_detail/');
        $data['site_del_detail'] = site_url($ci . '/del_detail/');
        $data['table_name'] = $set['table_name'];
        $data['folder_name'] = $set['folder_name'];
        $view = 'modules/' . $set['wms_path'] . 'view';
        $this->load->view($view, $data);
    }

    public function save($name_type, $id = null)
    {
        if ($_POST) {
            $Vote_model = new Vote_model();
            $result = false;
            $set = get_view($name_type);
            $ci = $this->ci_name;
            $table_name = $set['table_name'];
            $Data = ['name' => $_POST['name'], 'date' => ExpoldDate($_POST['date']), 'status' => 1];
            $num = ['id' => $id];
            if (!$id) {
                $result = $Vote_model->Insert($table_name, $Data);
            } else {
                $result = $Vote_model->Update($table_name, $Data, $num);
            }
            return JsonEncode($result);
        }
    }

    public function save_detail($id = null)
    {
        if ($_POST['field']):
            $Vote_model = new Vote_model();
            $result = false;
            $table_name = 'vote_detail';
            $data = ['masterid' => $_POST['field'], 'name' => $_POST['data']];
            $num = ['id' => $id];
            $set = [];
            if (!$id):
                $result = $Vote_model->Insert($table_name, $data);
                $set = $this->db->select('id as value,name')->order_by('id', 'DESC')->get($table_name)->row_array();
            else:
                $result = $Vote_model->Update($table_name, $data, $num);
                $set = $this->db->select('name')->where($num)->get($table_name)->row_array();
            endif;
            return JsonEncode($set);
        endif;
    }

    public function del_detail($id = null)
    {
        if ($_POST) {
            $id = $_POST['field'];
            $Vote_model = new Vote_model();
            $table_name = 'vote_detail';
            $result = false;
            $num = ['id' => $id];
            $result = $Vote_model->Delete($table_name, $num);
            return JsonEncode($result);
        }
    }

    public function change($name_type, $page, $id)
    {
        $Status_model = new Status_model();
        $set = get_view($name_type);
        $table_name = $set['table_name'];
        $status = $this->db->select('status')->where('id', $id)->get($table_name)->row('status');
        if ($status == 0):
            $status = 1;
        elseif ($status == 1):
            $status = 0;
        endif;
        $result = $Status_model->Change_Status(['id' => $id], $table_name, ['status' => $status]);
        $this->detail($name_type, $page);
    }

    public function detail($name_type, $page = 1)
    {
        $set = get_view($name_type);
//        if (isset($_POST['data'])) {
        $Search = $_POST['data'];
        $ci = $this->ci_name;
        $limit = 5;
        $pageS = $page - 1;
        $offset = $limit * $pageS;
        $table_name = $set['table_name'];

        $data['data'] = $this->db->select('*')
            ->like('name', $Search)
            ->order_by('date', 'DESC')
            ->limit($limit, $offset)
            ->get($table_name)
            ->result_array();
        $pageAll = $this->db->select('*')
            ->like('name', $Search)
            ->get($table_name)
            ->num_rows();

        $data['page'] = ceil($pageAll / $limit);
        $data['site'] = site_url($ci . '/detail/' . $name_type . '/');
        $data['site_view'] = site_url($ci . '/view/' . $name_type . '/');
        $data['site_change'] = site_url($ci . '/change/' . $name_type . '/' . $page . '/');
        $data['site_remove'] = site_url($ci . '/remove_all/' . $name_type . '/' . $page . '/');
        $data['table_name'] = $table_name;
        $data['folder_name'] = $set['folder_name'];
        $data['pageNow'] = $page;
        $data['offset'] = $offset;
        $view = 'modules/' . $set['wms_path'] . 'detail';
        $this->load->view($view, $data);
//        }
    }

    public function remove_all($name_type, $page, $id)
    {
        $Saveimg_model = new Saveimg_model();
        $set = get_view($name_type);
        $table_name = $set['table_name'];
        $folder_name = $set['folder_name'];
        $files = $this->db->where('tablename', $table_name)->where('masterid', $id)->get('filename')->result_array();
        $file = [];
        foreach ($files as $fKey => $fVal) {
            $file[$fKey] = FOLDERUPLOAD . $folder_name . '/' . $fVal['filename'];
            if (file_exists($file[$fKey])) {
                unlink($file[$fKey]);
                $Saveimg_model->Delete('filename', ['id' => $fVal['id']]);
            };
        }
        $result = $Saveimg_model->Delete($table_name, ['id' => $id]);
        $this->detail($name_type, $page);
    }
}