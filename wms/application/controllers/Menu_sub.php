<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 10/4/2561
 * Time: 13:07
 */

class Menu_sub extends CI_Controller
{
    private function get_empty_folder()
    {
        $folder_old = $this->db->select('folder_name')->get('set_sub_menus')->result_array();
        $directory = glob(FOLDERUPLOAD . '/*', GLOB_ONLYDIR);
        $directories = array();
        foreach ($folder_old as $fKey => $fVal) {
            if ($fVal['folder_name'] != null) {
                $folder_olds[] = $fVal['folder_name'];
            }
        }
        foreach ($directory as $dKey => $dVal) {
            $dirName = explode('//', $dVal)[1];
            if (!in_array($dirName, $folder_olds)) {
                $directories[] = $dirName;
            }
        }
        return $directories;
    }

    private function get_table_name()
    {
        $tables = $this->db->query('SHOW TABLES LIKE \'%tb%\'')->result_array();
        $table_old = $this->db->select('table_name')->where('table_name !=', 'set_tb_contents')->get('set_sub_menus')->result_array();
        $table = array();
        foreach ($table_old as $key => $val) {
            $table_old[] = $val['table_name'];
        }
        foreach ($tables as $key => $val) {
            $table_name = $val['Tables_in_' . USEDATABASE . ' (%tb%)'];
            if (!in_array($table_name, $table_old)) {
                $table[] = $table_name;
            }
        }
        return $table;
    }

    private function get_controller()
    {
        $controllers = array();
        $controller_back = get_filenames(APPPATH . 'controllers/');
        $controller_front = get_filenames('../page/application/controllers/');
        foreach ($controller_back as $key => $val) {
            $name = explode('.', $val);
            $controllers['controller_back'][] = strtolower($name[0]) . 's';
        }
        foreach ($controller_front as $key => $val) {
            $name = explode('.', $val);
            $controllers['controller_front'][] = strtolower($name[0]) . 's';
        }
        return $controllers;
    }

    public function index($name_type)
    {
        $theme = new theme();
        $data = [];
        $set = get_view($name_type);
        $view = $set['wms_path'] . 'index';
        $data['head'] = $set['sub_name'];
        $data['site'] = site_url('menu_sub/detail/' . $name_type);
        $data['site_add'] = site_url('menu_sub/view/' . $name_type);
        $data['btn_add'] = 'เพิ่ม' . $set['sub_name'];
        $theme->_loadmodules($view, $data);
    }

    public function view($name_type, $id = null)
    {
        $data = [];
        $set_data = [];
        $files = [];
        $theme = new theme();
        $set = get_view($name_type);
        $view = $set['wms_path'] . 'view';
        $table_name = $set['table_name'];
        $folder_name = $set['folder_name'];
        $table_file_name = 'filename';
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
            $set_data = $this->db->where('sub_id', $id)->get($set['table_name'])->row_array();
            $files = $this->db->where('masterid', $id)->where('tablename', $table_name)->get($table_file_name)->result_array();
        endif;
        $data['head'] = $head;
        $data['site'] = site_url('menu_sub/save/' . $name_type . '/' . $id);
        $data['site_remove'] = site_url('file/remove/' . $name_type . '/');
        $data['set_data'] = $set_data;

        $data['controllers'] = self::get_controller();
        $data['folders'] = self::get_empty_folder();
        $data['folder_name'] = $folder_name;
        $data['tables'] = self::get_table_name();
        $data['files'] = $files;
        $data['back_menus'] = $this->db->get('tb_modtype')->result_array();
        $data['front_menus'] = $this->db->get('set_menus')->result_array();
        $data['table_type'] = $this->db->where('create_table !=', null)->get('set_view')->result_array();
        $data['view_path'] = $this->db->get('set_view')->result_array();
        $theme->_loadmodules($view, $data);
    }

    public function detail($name_type, $page = 1)
    {
        $set = get_view($name_type);
        if (isset($_POST['data'])) {
            $Search = $_POST['data'];
            $limit = 10;
            $pageS = $page - 1;
            $offset = $limit * $pageS;
            $table_name = $set['table_name'];
            $data['data'] = $this->db->select('*')
                ->like('sub_name', $Search)
                ->limit($limit, $offset)
                ->get($table_name)
                ->result_array();
            $pageAll = $this->db->select('*')
                ->like('sub_name', $Search)
                ->get($table_name)
                ->num_rows();
            $data['page'] = ceil($pageAll / $limit);
            $data['site'] = site_url('menu_sub/detail/' . $name_type . '/');
            $data['site_view'] = site_url('menu_sub/view/' . $name_type . '/');
            $data['site_change'] = site_url('menu_sub/change/' . $name_type . '/' . $page . '/');
            $data['site_remove'] = site_url('menu_sub/remove_all/' . $name_type . '/' . $page . '/');
            $data['table_name'] = $table_name;
            $data['folder_name'] = $set['folder_name'];
            $data['pageNow'] = $page;
            $data['offset'] = $offset;
            $view = 'modules/' . $set['wms_path'] . 'detail';
            $this->load->view($view, $data);
        }
    }

    public function save($name_type, $id = null)
    {
        $data = [];
        $result = false;
        $set_id = 'sub_id';
        $this->load->model('saveimg_model');
        $Saveimg_model = new Saveimg_model();
        $set = get_view($name_type);
        $TableName = $set['table_name'];
        $Dirfoder = $set['folder_name'];
        $data = CreateArray(['img'], $_POST);
        $Dir = FOLDERIMG . $Dirfoder . '/';
        $File_name = isset($_FILES['menufile']['name']) ? $_FILES['menufile']['name'] : '';
        if ($File_name != '') {
            copy($_FILES['menufile']['tmp_name'], $Dir . $File_name);
            $data['group_img'] = $File_name;
        }
        if ($id) {
            $num = [$set_id => $id];
            $result = $Saveimg_model->Update($TableName, $data, $num);
            $masterid = $id;
        } else {
            $result = $Saveimg_model->Insert($TableName, $data);
            $masterid = $this->db->order_by($set_id, 'DESC')->get($TableName)->row($set_id);
        }
        $site_return = site_url('menu_sub/view/' . $name_type . '/' . $masterid);
        if ($result) {
            echo '<script>alert(\'บันทึกสำเร็จ\');window.location.href = \'' . site_url('menu_subs/' . $name_type) . '\'</script>';
        } else {
            echo '<script>alert(\'ผิดพลาด\');window.location.href = \'' . $site_return . '\'</script>';
        }
    }

    public function change($name_type, $page, $id)
    {
        $Status_model = new Status_model();
        $set = get_view($name_type);
        $table_name = $set['table_name'];
        $status = $this->db->select('status')->where('group_id', $id)->get($table_name)->row('status');
        if ($status == 0):
            $status = 1;
        elseif ($status == 1):
            $status = 0;
        endif;
        $result = $Status_model->Change_Status(['group_id' => $id], $table_name, ['status' => $status]);
        $this->detail($name_type, $page);
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
                $Saveimg_model->Delete('filename', ['sub_id' => $fVal['id']]);
            };
        }
        $result = $Saveimg_model->Delete($table_name, ['sub_id' => $id]);
        $this->detail($name_type, $page);
    }

    public function test()
    {
        return JsonEncode($_POST);
    }
}