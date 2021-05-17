<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/4/2561
 * Time: 8:44
 */

class Public_workgroup extends CI_Controller
{
    public function index($name_type)
    {
        $theme = new theme();
        $data = [];
        $set = get_view($name_type);
        $view = $set['wms_path'];
        $data['head'] = $set['sub_name'];
        $data['site'] = site_url('pbworkgroup/detail/' . $name_type);
        $data['site_add'] = site_url('pbworkgroup/view/' . $name_type);
        $data['office_type'] = $this->db->get('set_public_type')->result_array();
        if ($name_type == 'subgroup') {
            $data['work_type'] = $this->db->get('tb_public_workgroup')->result_array();
        }
        $data['btn_add'] = $set['sub_name'];
        $theme->_loadmodules($view, $data);
    }

    public function view($name_type, $id = null)
    {
        $data = [];
        $set_data = [];
        $files = [];
        $theme = new theme();
        $view = 'config_pbworkgroup/view';
        $set = get_view($name_type);
        $table_name = $set['table_name'];
        $folder_name = $set['folder_name'];
        $table_file_name = 'filename';

        $officer_group = [];
        $officer_subworkgroup = [];

        $officer_type = $this->db->get('set_public_type')->result_array();
        $officer_show = $this->db->get('tb_public_show')->result_array();

        if ($name_type == 'subgroup') {
            $data['work_type'] = $this->db->get('tb_public_workgroup')->result_array();
        }

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
            $officer_group = $this->db->where('offid', $set_data['offid'])->get('tb_public_workgroup')->result_array();
        endif;
        $data['head'] = $head;
        $data['site'] = site_url('pbworkgroup/save/' . $name_type . '/' . $id);
        $data['site_remove'] = site_url('file/remove/' . $name_type . '/');
        $data['public_type'] = $officer_type;
        $data['public_show'] = $officer_show;
        $data['public_group'] = $officer_group;
        $data['public_subworkgroup'] = $officer_subworkgroup;
        $data['set_data'] = $set_data;
        $data['files'] = $files;
        $data['folder_name'] = $folder_name;
        $theme->_loadmodules($view, $data);
    }

    public function detail($name_type, $page = 1)
    {
        $set = get_view($name_type);
        if (isset($_POST['data'])) {
            $table_name = $set['table_name'];
            $data['site'] = site_url('pbworkgroup/detail/' . $name_type . '/');
            $data['site_view'] = site_url('pbworkgroup/view/' . $name_type . '/');
            $data['site_change'] = site_url('pbworkgroup/change/' . $name_type . '/' . $page . '/');
            $data['site_remove'] = site_url('pbworkgroup/remove_all/' . $name_type . '/' . $page . '/');
            $data['table_name'] = $table_name;
            $data['folder_name'] = $set['folder_name'];

            $Search = $_POST['data'];
            $limil = 10;
            $pageS = $page - 1;
            $offset = $limil * $pageS;
            $table_name = $set['table_name'];
            if (isset($_POST['work_type'])) {
                $data['data'] = $this->db->select('*')
                    ->like('name', $Search)
                    ->where('workgroupid', $_POST['work_type'])
                    ->limit($limil, $offset)
                    ->get($table_name)
                    ->result_array();
                $pageAll = $this->db->select('*')
                    ->like('name', $Search)
                    ->where('workgroupid', $_POST['work_type'])
                    ->get($table_name)
                    ->num_rows();
            } else {
                $data['data'] = $this->db->select('*')
                    ->like('name', $Search)
                    ->where('offid', $_POST['type'])
                    ->limit($limil, $offset)
                    ->get($table_name)
                    ->result_array();
                $pageAll = $this->db->select('*')
                    ->like('name', $Search)
                    ->where('offid', $_POST['type'])
                    ->get($table_name)
                    ->num_rows();
            }


            $data['page'] = ceil($pageAll / $limil);
            $data['pageNow'] = $page;
            $data['offset'] = $offset;
            $view = 'modules/config_pbworkgroup/detail';
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
        $Dirfoder = $set['folder_name'];
        if ($name_type == 'subgroup') {
            $data = [
                'offid' => $_POST['type'],
                'name' => $_POST['name'],
                'listno' => $_POST['listno'],
                'workgroupid' => $_POST['work_type']
            ];
        } else {
            $data = [
                'offid' => $_POST['type'],
                'name' => $_POST['work_name'],
                'listno' => $_POST['listno']
            ];
        }
        if ($id) {
            $num = ['id' => $id];
            $result = $Saveimg_model->Update($TableName, $data, $num);
            $masterid = $id;
        } else {
            $result = $Saveimg_model->Insert($TableName, $data);
            $masterid = $this->db->order_by('id', 'DESC')->get($TableName)->row('id');
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
        $site_return = site_url('pbworkgroup/view/' . $name_type . '/' . $masterid);
        if ($result) {
            echo '<script>alert(\'บันทึกสำเร็จ\');window.location.href = \'' . $site_return . '\'</script>';
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

    public function search_group()
    {
        $data = $_POST;
        $result = [];
        if ($data['type'] == '') {
            $table = 'tb_public_workgroup';
            $where = ['offid' => $data['select']];
        } else {
            $table = 'tb_public_subworkgroup';
            $where = ['workgroupid' => $data['select']];
        }
        $result = $this->db->where($where)->get($table)->result_array();
        return JsonEncode($result);
    }
}