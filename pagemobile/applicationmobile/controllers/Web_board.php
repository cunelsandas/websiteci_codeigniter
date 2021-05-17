<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 29/3/2561
 * Time: 10:25
 */

class Web_board extends CI_Controller
{
    public function index($name_type)
    {
        $theme = new theme();
        $data = [];
        $set = get_view($name_type);
        $view = $set['view_path'];
        $data['head'] = $set['sub_name'];
        $data['table_name'] = $set['table_name'];
        $data['folder_name'] = $set['folder_name'];
        $data['site'] = $data['site'] = site_url('web_board/detail/' . $name_type . '/');
        $data['site_view'] = site_url('web_board/view/' . $name_type . '/');
        $theme->_loadfrontend($view, $data);
    }

    public function view($name_type, $id = null)
    {
        $theme = new theme();
        $set = get_view($name_type);
        $table_name = $set['table_name'];
        $view = 'webboard/view';
        $data['set'] = $this->db->select('*')->where('wid', $id)->get($table_name)->row_array();
        $data['set_sub'] = $this->db->select('*')->where('wid', $id)->get('tb_wb_sub')->result_array();
        $data['head'] = $set['sub_name'];
        $data['table_name'] = $set['table_name'];
        $data['folder_name'] = $set['folder_name'];
        $data['site_save'] = site_url('web_board/save/' . $name_type . '/' . $id);
        $data['inform'] = site_url('web_board/inform/' . $id . '/' . $name_type);
        $data['inform_sub'] = site_url('web_board/inform/');
        $theme->_loadfrontend($view, $data);
    }

    public function save($name_type, $id = null)
    {
        $this->load->model('wbs_model');
        $Wbs_model = new Wbs_model();

        $set = get_view($name_type);
        $table_name = $set['table_name'];
        $table_name_sub = 'tb_wb_sub';
        $ip = $this->input->ip_address();
        $datepost = date('Y-m-d');
        $createdate = date('Y-m-d H:i:s');
        $result = false;
        $data = [];
        if (isset($_POST['submit'])) {
            if ($id == null) {
                $data = ['subject' => $_POST['topic'],
                    'detail' => $_POST['detail'],
                    'postby' => $_POST['person'],
                    'ip' => $ip,
                    'datepost' => $datepost,
                    'status' => 1,
                    'createdate' => $createdate,
                    'deleted' => 0,
                ];
                $result = $Wbs_model->Insert($table_name, $data);
            } else {
                $data = ['wid' => $id,
                    'detail' => $_POST['detail'],
                    'postby' => $_POST['person'],
                    'ip' => $ip,
                    'datepost' => $datepost,
                    'status' => 1,
                    'createdate' => $createdate,
                    'deleted' => 0,
                ];
                $result = $Wbs_model->Insert($table_name_sub, $data);
            }
            if ($result) {
                echo '<script>alert(\'บันทึกสำเร็จ\');window.location.href = \'' . site_url('web_boards/web_board') . '\'</script>';
            } else {
                echo '<script>alert(\'พบข้อผิดพลาด\');window.location.href = \'' . site_url('web_boards/web_board') . '\'</script>';
            }
        } else {
            echo '<script>alert(\'พบข้อผิดพลาด\');window.location.href = \'' . site_url('web_boards/web_board') . '\'</script>';
        }
    }

    public function inform($id, $name_type = '')
    {
        $this->load->model('wbs_model');
        $Wbs_model = new Wbs_model();
        $result = false;
        $no = [];
        if ($name_type != '') {
            $set = get_view($name_type);
            $table_name = $set['table_name'];
            $no = ['wid' => $id];
        } else {
            $table_name = 'tb_wb_sub';
            $name_type = 'web_board';
            $no = ['no' => $id];
        }
        $result = $Wbs_model->Update($table_name, ['deleted' => 1], $no);
        if ($result) {
            echo '<script>alert(\'แจ้งลบสิ่งนี้แล้ว\');window.location.href = \'' . site_url('web_board/view/' . $name_type . '/' . $id) . '\'</script>';
        } else {
            echo '<script>alert(\'พบข้อผิดพลาด\');window.location.href = \'' . site_url('web_board/view/' . $name_type . '/' . $id) . '\'</script>';
        }
    }

    public function detail($name_type, $page = 1)
    {
        $set = get_view($name_type);
        if (isset($_POST['data'])) {
            $Search = $_POST['data'];
            $limil = 10;
            $page = $page - 1;
            $offset = $limil * $page;
            $table_name = $set['table_name'];

            $data['data'] = $this->db->select('*')
                ->like('subject', $Search)
                ->where('status', 1)
                ->limit($limil, $offset)
                ->order_by('datepost DESC')
                ->get($table_name)
                ->result_array();
            $pageAll = $this->db->select('*')
                ->like('subject', $Search)
                ->where('status', 1)
                ->get($table_name)
                ->num_rows();

            $data['page'] = ceil($pageAll / $limil);
            $data['site'] = site_url('web_board/detail/' . $name_type . '/');
            $data['site_view'] = site_url('web_board/view/' . $name_type . '/');
            $data['table_name'] = $table_name;
            $data['folder_name'] = $set['folder_name'];
            $data['pageNow'] = $page + 1;
            $data['offset'] = $offset;
            $view = 'frontend/webboard/detail';
            $this->load->view($view, $data);
        }
    }

}