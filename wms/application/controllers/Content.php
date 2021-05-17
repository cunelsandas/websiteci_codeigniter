<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/3/2561
 * Time: 15:16
 */

class Content extends CI_Controller
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

    private function get_data($table, $id)
    {
        $data = $this->db->select('content_detail')->from($table)->where('sub_id', $id)->get()->row('content_detail');
        return $data;
    }

    public function index($name_type)
    {
        $theme = new theme();
        $data = [];
        $set = get_view($name_type);
        $all = self::get_data($set['table_name'], $set['sub_id']);
        $view = $set['wms_path'];
        $data['head'] = $set['sub_name'];
        $data['detail'] = $all;
        $data['site'] = site_url('content/save/' . $name_type);
        $theme->_loadmodules($view, $data);
    }

    public function save($name_type)
    {
        $data = [];
        $set_id = 'sub_id';
        $this->load->model('content_model');
        $Content_model = new Content_model();
        $set = get_view($name_type);
        $table_name = $set['table_name'];
        $chk_content = $this->db->select($set_id)->where($set_id, $set['sub_id'])->get($table_name)->row($set_id);
        $data['content_detail'] = $_POST['detail'];
        if ($chk_content == null) {
            $data['content_type'] = $name_type;
            $data['sub_id'] = $set['sub_id'];
            $result = $Content_model->Insert($table_name, $data);
        } else {
            $id[$set_id] = $set['sub_id'];
            $data['content_type'] = $name_type;
            $result = $Content_model->Update($table_name, $data, $id);
        }

        $site_return = site_url($set['controller'] . '/' . $name_type);
        if ($result) {
            echo '<script>alert(\'บันทึกสำเร็จ\');window.location.href = \'' . $site_return . '\'</script>';
        } else {
            echo '<script>alert(\'ผิดพลาด\');window.location.href = \'' . $site_return . '\'</script>';
        }
    }
}