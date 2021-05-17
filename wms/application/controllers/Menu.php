<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 10/4/2561
 * Time: 13:07
 */

class Menu extends CI_Controller
{
    public function index($name_type)
    {
        $theme = new theme();
        $data = [];
        $set = get_view($name_type);
        $view = $set['wms_path'] . 'index';
        $data['head'] = $set['sub_name'];
        $data['site'] = site_url('menu/detail/' . $name_type);
        $data['site_add'] = site_url('menu/view/' . $name_type);
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
            $set_data = $this->db->where('menu_id', $id)->get($set['table_name'])->row_array();
            $files = $this->db->where('masterid', $id)->where('tablename', $table_name)->get($table_file_name)->result_array();
        endif;
        $data['head'] = $head;
        $data['site'] = site_url('menu/save/' . $name_type . '/' . $id);
        $data['site_remove'] = site_url('file/remove/' . $name_type . '/');
        $data['set_data'] = $set_data;
        $data['group_menus'] = $this->db->get('set_group_menus')->result_array();
        $data['files'] = $files;
        $data['folder_name'] = $folder_name;
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
                ->like('menu_name', $Search)
                ->limit($limit, $offset)
                ->get($table_name)
                ->result_array();
            $pageAll = $this->db->select('*')
                ->like('menu_name', $Search)
                ->get($table_name)
                ->num_rows();
            $data['page'] = ceil($pageAll / $limit);
            $data['site'] = site_url('menu/detail/' . $name_type . '/');
            $data['site_view'] = site_url('menu/view/' . $name_type . '/');
            $data['site_change'] = site_url('menu/change/' . $name_type . '/' . $page . '/');
            $data['site_remove'] = site_url('menu/remove_all/' . $name_type . '/' . $page . '/');
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
        $this->load->model('saveimg_model');
        $Saveimg_model = new Saveimg_model();
        $set = get_view($name_type);
        $TableName = $set['table_name'];
        $Dirfoder = $set['folder_name'];
        $data = CreateArray(['img'], $_POST);
        $Dir = FOLDERIMG . $Dirfoder . '/';
        $File_name = $_FILES['menufile']['name'];
        if ($File_name != '') {
            copy($_FILES['menufile']['tmp_name'], $Dir . $File_name);
            $data['image'] = $File_name;
        }
        if ($id) {
            $num = ['menu_id' => $id];
            $result = $Saveimg_model->Update($TableName, $data, $num);
            $masterid = $id;
        } else {
            $result = $Saveimg_model->Insert($TableName, $data);
            $masterid = $this->db->order_by('menu_id', 'DESC')->get($TableName)->row('menu_id');
        }
        $site_return = site_url('menu/view/' . $name_type . '/' . $masterid);
        if ($result) {
            echo '<script>alert(\'บันทึกสำเร็จ\');window.location.href = \'' . site_url('menus/' . $name_type) . '\'</script>';
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

    public function remove($name_type, $filename)
    {
        $Saveimg_model = new Saveimg_model();
        $set = get_view($name_type);
        $table_name = $set['table_name'];
        $folder_name = $set['folder_name'] . '/';
        $file = FOLDERUPLOAD . $folder_name . $filename;
        if (file_exists($file)):
            $Saveimg_model->Delete('filename', ['filename' => $filename]);
            unlink($file);
            echo '<script>window.history.back();</script>';
        endif;
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
                $Saveimg_model->Delete('filename', ['menu_id' => $fVal['id']]);
            };
        }
        $result = $Saveimg_model->Delete($table_name, ['menu_id' => $id]);
        $this->detail($name_type, $page);
    }
}