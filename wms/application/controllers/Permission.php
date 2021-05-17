<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 26/4/2561
 * Time: 8:40
 */

class Permission extends CI_Controller
{
    public $ci_name;

    public function __construct()
    {
        parent::__construct();
        $this->ci_name = $this->router->fetch_class() . '/';
    }

    public function index($name_type)
    {
        $theme = new theme();
        $data = [];
        $set = get_view($name_type);
        $ci_site = $this->ci_name;
        $view = $set['wms_path'] . 'index';
        $data['head'] = $set['sub_name'];
        $data['site'] = site_url($ci_site . 'detail/' . $name_type);
        $data['site_add'] = site_url($ci_site . 'view/' . $name_type);
        $data['btn_add'] = 'เพิ่ม' . $set['sub_name'];
        $data['user'] = $this->db->get('tb_user')->result_array();
        $theme->_loadmodules($view, $data);
    }

    public function view($name_type)
    {
        $data = [];
        $set = get_view($name_type);
        $table_name = $set['table_name'];
        $ci_site = $this->ci_name;
        if ($_POST['type'] == 'add') {
            $id = null;
        } else {
            $id = $_POST['user'];
        }
        if ($id == null):
            $set_data = $this->db->get($table_name)->row_array();
            if ($set_data != null):
                foreach ($set_data as $sKey => $sVal) {
                    $set_data[$sKey] = '';
                }
            endif;
            $head = 'เพิ่มผู้ใช้งาน';
        else:
            $set_data = $this->db->where('userid', $id)->get($set['table_name'])->row_array();
            $head = 'แก้ไขผู้ใช้งาน';
        endif;
        $view = 'modules/' . $set['wms_path'] . 'view';
        $data['office_type'] = $this->db->get('set_office_type')->result_array();
        $data['set_data'] = $set_data;
        $data['head'] = $head;
        $data['site_save'] = site_url($ci_site . 'save/' . $name_type . '/' . $id);
        $this->load->view($view, $data);
    }

    public function save($name_type, $id = null)
    {
        $result = false;
        $set = get_view($name_type);
        $table_name = $set['table_name'];
        $this->load->model('permission_model');
        $Permission_model = new Permission_model();
        $data = array();
        $send = [];
        $user = [];
        if (isset($_POST)) {
            $data = array(
                'nameuser' => $_POST['name'],
                'surname' => $_POST['surname'],
                'username' => $_POST['username'],
                'pwfix' => $_POST['password'],
                'pw' => md5($_POST['password']),
                'depid' => $_POST['section'],
            );
            if ($_POST['username'] != '' || $_POST['password'] != ''):
                if ($id == null) {
                    $type = 'insert';
                    $result = $Permission_model->Insert($table_name, $data);
                    $id = $this->db->select('userid')->order_by('userid', 'DESC')->get($table_name)->row('userid');
                } else {
                    $num = ['userid' => $id];
                    $type = 'update';
                    $result = $Permission_model->Update($table_name, $data, $num);
                    $user = $this->db->select('userid as id,nameuser as text')->get($table_name)->result_array();
                }
                $send['value'] = $id;
                $send['option'] = $_POST['name'];
                $send['type'] = $type;
                $send['user'] = $user;
            else:
                $result = false;
            endif;
        }
        if ($result):
            return JsonEncode($send);
        else:
            return JsonEncode($result);
        endif;
    }

    public function pms($name_type)
    {
        $this->load->model('permission_model');
        $Permission_model = new Permission_model();
        $table_name = 'set_permission';
        $data = [];
        $user_id = $_POST['User'];
        foreach ($_POST['Permission'] as $val) {
            $data = ['user_id' => $user_id, 'sub_id' => $val];
            $Permission_model->Insert($table_name, $data);
        }
        self::detail($name_type);
    }

    public function detail($name_type)
    {
        $data = [];
        $set = get_view($name_type);
        $ci_site = $this->ci_name;
        $view = 'modules/' . $set['wms_path'] . 'detail';
        $user_id = $_POST['data'];
        $permission = $this->db->select('sub_id,sub_name')
            ->where('sub_id NOT IN (SELECT sub_id FROM set_permission WHERE user_id = ' . $user_id . ')')
            ->get('set_sub_menus')->result_array();
        $user_permission = $this->db->select('b.sub_id,b.sub_name')
            ->from('set_permission a')
            ->join('set_sub_menus b', 'a.sub_id = b.sub_id')
            ->where('a.user_id', $_POST['data'])
            ->order_by('b.sub_id')
            ->get()->result_array();

        $data['permission'] = $permission;
        $data['user_permission'] = $user_permission;
        $data['site_permission'] = site_url($ci_site . 'pms/' . $name_type);
        $data['site_delpermission'] = site_url($ci_site . 'dpms/' . $name_type);
        $this->load->view($view, $data);
    }

    public function dpms($name_type)
    {
        $this->load->model('permission_model');
        $Permission_model = new Permission_model();
        $table_name = 'set_permission';
        $data = [];
        $user_id = $_POST['User'];
        foreach ($_POST['UserPermission'] as $val) {
            $data = ['user_id' => $user_id, 'sub_id' => $val];
            $Permission_model->Delete($table_name, $data);
        }
        self::detail($name_type);
    }
}