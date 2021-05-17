<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/3/2561
 * Time: 15:16
 */

class Marquee extends CI_Controller
{
    /* private function get_view($id)
     {
         $data = $this->db->select('*')->from('set_sub_menus a')
             ->join('set_view b', 'a.view_id = b.view_id')
             ->where('a.name_type', $id)->get()->row_array();
         if ($data) {
             return $data;
         } else {
             show_404(site_url('notfound'));
         }
     }*/
    public function index($name_type)
    {
        $theme = new theme();
        $data = [];
        $set = get_view($name_type);
        $table = $set['table_name'];
        $all = $this->db->get($table)->row_array();
        $view = $set['wms_path'];
        $data['head'] = $set['sub_name'];
        $data['detail'] = $all['txt1'];
        $data['site'] = site_url('marquee/save/' . $name_type . '/' . $all['no']);
        $theme->_loadmodules($view, $data);
    }

    public function save($name_type, $id)
    {
        $data = [];
        $this->load->model('content_model');
        $Content_model = new Content_model();
        $set = get_view($name_type);
        $table = $set['table_name'];
        $data = ['txt1' => $_POST['detail']];
        $id = ['no' => $id];
        $site_return = site_url($set['controller'] . '/' . $name_type);
        $result = $Content_model->Update($table, $data, $id);
        if ($result) {
            echo '<script>alert(\'บันทึกสำเร็จ\');window.location.href = \'' . $site_return . '\'</script>';
        } else {
            echo '<script>alert(\'ผิดพลาด\');window.location.href = \'' . $site_return . '\'</script>';
        }
    }
}