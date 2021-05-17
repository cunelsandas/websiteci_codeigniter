<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/4/2561
 * Time: 11:43
 */

class File extends CI_Controller
{

    public function index($name_type)
    {
        $theme = new theme();
        $data = [];
        $set = get_view($name_type);
        $view = $set['wms_path'];
        $data['head'] = $set['sub_name'];
        $data['site'] = site_url('file/detail/' . $name_type);
        $data['site_add'] = site_url('file/view/' . $name_type);
        $data['btn_add'] = 'เพิ่ม' . $set['sub_name'];
        $data['file_type'] = $this->db->get('set_file_type')->result_array();
        $theme->_loadmodules($view, $data);
    }

    public function view($name_type, $id = null)
    {
        $data = [];
        $set_data = [];
        $files = [];
        $theme = new theme();
        $view = 'config_files/view';
        $set = get_view($name_type);
        $table_name = $set['table_name'];
        $folder_name = $set['folder_name'];
        $table_file_name = 'filename';

        $file_type = $this->db->get('set_file_type')->result_array();

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
            $set_data = $this->db->where('no', $id)->get($set['table_name'])->row_array();
            $files = $this->db->where('masterid', $id)->where('tablename', $table_name)->get($table_file_name)->result_array();
        endif;

        $data['head'] = $head;
        $data['site'] = site_url('file/save/' . $name_type . '/' . $id);
        $data['site_remove'] = site_url('file/remove/' . $name_type . '/');
        $data['file_type'] = $file_type;
        $data['set_data'] = $set_data;
        $data['files'] = $files;
        $data['folder_name'] = $folder_name;
        $theme->_loadmodules($view, $data);
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
        $Dirfoder = $set['folder_name'];

        $ip = $this->input->ip_address();
        $data = [
            'subject' => $_POST['subject'],
            'detail' => $_POST['detail'],
            'datepost' => ExpoldDate($_POST['datepost']),
            'status' => isset($_POST['active']) ? 1 : 0,
            'filetypeid' => isset($_POST['filetypeid']) ? $_POST['filetypeid'] : 0,
        ];
        if ($id) {
            $num = ['no' => $id];
            $result = $Saveimg_model->Update($TableName, $data, $num);
            $masterid = $id;
        } else {
            $result = $Saveimg_model->Insert($TableName, $data);
            $masterid = $this->db->order_by('no', 'DESC')->get($TableName)->row('no');
        }
        if ($result) {
            $file = put_file($_POST, $_FILES, $TableName, $Dirfoder);
            $FileAll = [];
            foreach ($file as $key => $val) {
                $FileAll[$key]['masterid'] = $masterid;
                $FileAll[$key]['tablename'] = $TableName;
                $FileAll[$key]['filename'] = $val['name'];
                $FileAll[$key]['edittime'] = date('Y-m-d H:i:s');
                if ($val['name'] != '') {
                    $result = $Files_model->Insert('filename', $FileAll[$key]);
                }
            }
        }
        $site_return = site_url('file/view/' . $name_type . '/' . $masterid);
        if ($result) {
            echo '<script>alert(\'บันทึกสำเร็จ\');window.location.href = \'' . site_url('files/file') . '\'</script>';
//            echo '<script>alert(\'บันทึกสำเร็จ\');window.location.href = \'' . $site_return . '\'</script>'; กรณีให้กลับไปที่ไฟล์ที่เพิ่ม
        } else {
            echo '<script>alert(\'ผิดพลาด\');window.location.href = \'' . $site_return . '\'</script>';
        }
    }

    public function change($name_type, $page, $id)
    {
        $Status_model = new Status_model();
        $set = get_view($name_type);
        $table_name = $set['table_name'];
        $status = $this->db->select('status')->where('no', $id)->get($table_name)->row('status');
        if ($status == 0):
            $status = 1;
        elseif ($status == 1):
            $status = 0;
        endif;
        $result = $Status_model->Change_Status(['no' => $id], $table_name, ['status' => $status]);
        $this->detail($name_type, $page);
    }

    public function detail($name_type, $page = 1)
    {
        $set = get_view($name_type);
        if (isset($_POST['data'])) {
            $Search = $_POST['data'];
            $File_type = $_POST['file_type'];
            $limil = 10;
            $pageS = $page - 1;
            $offset = $limil * $pageS;
            $table_name = $set['table_name'];

            $data['data'] = $this->db->select('*')
                ->where('filetypeid', $File_type)
                ->like('subject', $Search)
                ->limit($limil, $offset)
                ->order_by('datepost DESC ,no DESC')
                ->get($table_name)
                ->result_array();
            $pageAll = $this->db->select('*')
                ->where('filetypeid', $File_type)
                ->like('subject', $Search)
                ->get($table_name)
                ->num_rows();

            $data['page'] = ceil($pageAll / $limil);
            $data['site'] = site_url('file/detail/' . $name_type . '/');
            $data['site_view'] = site_url('file/view/' . $name_type . '/');
            $data['site_change'] = site_url('file/change/' . $name_type . '/' . $page . '/');
            $data['site_remove'] = site_url('file/remove_all/' . $name_type . '/' . $page . '/');
            $data['table_name'] = $table_name;
            $data['folder_name'] = $set['folder_name'];
            $data['pageNow'] = $page;
            $data['offset'] = $offset;
            $view = 'modules/config_files/detail';
            $this->load->view($view, $data);
        }
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
                $Saveimg_model->Delete('filename', ['id' => $fVal['id']]);
            };
        }
        $result = $Saveimg_model->Delete($table_name, ['no' => $id]);
        $this->detail($name_type, $page);
    }
}