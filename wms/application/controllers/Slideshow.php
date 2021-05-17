<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/3/2561
 * Time: 15:16
 */

class Slideshow extends CI_Controller
{

    public function index($name_type)
    {
        $theme = new theme();
        $data = [];
        $set = get_view($name_type);
        $view = $set['wms_path'] . 'index';
        $data['head'] = $set['sub_name'];
        $data['site'] = site_url('slideshow/detail/' . $name_type);
        $data['site_add'] = site_url('slideshow/view/' . $name_type);
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
            $set_data = $this->db->where('id', $id)->get($set['table_name'])->row_array();
            $files = $this->db->where('masterid', $id)->where('tablename', $table_name)->get($table_file_name)->result_array();
        endif;
        $data['head'] = $head;
        $data['site'] = site_url('slideshow/save/' . $name_type . '/' . $id);
        $data['site_remove'] = site_url('file/remove/' . $name_type . '/');
        $data['set_data'] = $set_data;
        $data['files'] = $files;
        $data['folder_name'] = $folder_name;
        $theme->_loadmodules($view, $data);
    }

    public function detail($name_type, $page = 1)
    {
        $set = get_view($name_type);
        if (isset($_POST['data'])) {
            $Search = $_POST['data'];
            $limil = 10;
            $pageS = $page - 1;
            $offset = $limil * $pageS;
            $table_name = $set['table_name'];
            $data['data'] = $this->db->select('*')
                ->limit($limil, $offset)
                ->get($table_name)
                ->result_array();
            $pageAll = $this->db->select('*')
                ->get($table_name)
                ->num_rows();
            $data['page'] = ceil($pageAll / $limil);
            $data['site'] = site_url('slideshow/detail/' . $name_type . '/');
            $data['site_view'] = site_url('slideshow/view/' . $name_type . '/');
            $data['site_remove'] = site_url('slideshow/remove_all/' . $name_type . '/' . $page . '/');
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
        $Files_model = new Files_model();

        $set = get_view($name_type);
        $TableName = $set['table_name'];
        $Dirfoder = $set['folder_name'];;
        $file = put_file($_POST, $_FILES, $TableName, $Dirfoder);
        foreach ($file as $key => $val) {
            $File['filename'] = $val['name'];
        }
        $File['detail'] = '';
        $File['link'] = $_POST['link'];
        if ($id) {
            $filename = $this->db->select('filename')->where('id', $id)->get($TableName)->row_array();
            $file = FOLDERUPLOAD . $Dirfoder . '/' . $filename['filename'];
            if (file_exists($file) && isset($File['filename'])) {
                unlink($file);
            };
            $result = $Saveimg_model->Update($TableName, $File, ['id' => $id]);
        } else {
            $result = $Saveimg_model->Insert($TableName, $File);
        }
        $site_return = site_url('slideshows/' . $name_type);
        if ($result) {
            echo '<script>alert(\'บันทึกสำเร็จ\');window.location.href = \'' . $site_return . '\'</script>';
        } else {
            echo '<script>alert(\'ผิดพลาด\');window.location.href = \'' . $site_return . '\'</script>';
        }
    }

    public function remove_all($name_type, $page, $id)
    {
        $Saveimg_model = new Saveimg_model();
        $set = get_view($name_type);
        $table_name = $set['table_name'];
        $folder_name = $set['folder_name'];
        $file = [];
        $filename = $this->db->select('filename')->where('id', $id)->get($table_name)->row_array();
        $file = FOLDERUPLOAD . $folder_name . '/' . $filename['filename'];
        if (file_exists($file)) {
            unlink($file);
        };
        $result = $Saveimg_model->Delete($table_name, ['id' => $id]);
        $this->detail($name_type, $page);
    }
}