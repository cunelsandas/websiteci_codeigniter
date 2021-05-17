<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 26/4/2561
 * Time: 8:40
 */

class Slideshow extends CI_Controller
{
    public $ci_name;

    public function __construct()
    {
        parent::__construct();
        $this->ci_name = $this->router->fetch_class() . '/';
        $this->load->model('saveimg_model');
    }

    public function index($name_type)
    {
        $theme = new theme();
        $data = [];
        $set = get_view($name_type);
        $ci_site = $this->ci_name;
        $view = $set['wms_path'] . 'index';
        $table_name = $set['table_name'];
        $folder_name = $set['folder_name'];
        $data['head'] = $set['sub_name'];
        $data['site'] = site_url($ci_site . 'save/' . $name_type);
        $data['btn_add'] = 'เพิ่ม' . $set['sub_name'];
        $data['files'] = $this->db->select('filename')->get($table_name)->result_array();
        $data['folder_name'] = $folder_name;
        $data['site_remove'] = site_url($ci_site . 'remove/' . $name_type . '/');
        $theme->_loadmodules($view, $data);
    }

    public function save($name_type, $id = null)
    {
        $result = false;
        $Save_img = new Saveimg_model();
        $set = get_view($name_type);
        $ci_site = $this->ci_name;
        $table_name = $set['table_name'];
        $folder_name = $set['folder_name'];
        $file = put_file($_POST, $_FILES, $table_name, $folder_name);
        $File = [];
        foreach ($file as $key => $val) {
            $File[$key]['filename'] = $val['name'];
            $File[$key]['detail'] = '';
            $File[$key]['link'] = '';
            $result = $Save_img->Insert($table_name, $File[$key]);
        }
        $site = site_url('slideshows/slideshow');
        if ($result):
            echo '<script>alert(\'บันทึกสำเร็จ\');window.location.href=\'' . $site . '\'</script>';
        endif;
    }

    public function remove($name_type, $filename)
    {
        $Saveimg_model = new Saveimg_model();
        $set = get_view($name_type);
        $table_name = $set['table_name'];
        $folder_name = $set['folder_name'] . '/';
        $file = FOLDERUPLOAD . $folder_name . $filename;
        if (file_exists($file)):
            $Saveimg_model->Delete($table_name, ['filename' => $filename]);
            unlink($file);
            echo '<script>window.history.back();</script>';
        endif;
    }
}