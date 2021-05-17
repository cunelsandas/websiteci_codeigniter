<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/3/2561
 * Time: 15:16
 */

class Catalog extends CI_Controller
{
    public function index($name_type)
    {
        $theme = new theme();
        $data = [];
        $set = get_view($name_type);
        $view = $set['wms_path'];
        $data['head'] = $set['sub_name'];
        $data['site'] = site_url('catalog/detail/' . $name_type);
        $data['site_add'] = site_url('catalog/view/' . $name_type);
        $data['btn_add'] = 'เพิ่ม' . $set['sub_name'];
        $theme->_loadmodules($view, $data);
    }

    public function view($name_type, $id = null)
    {
        $data = [];
        $set_data = [];
        $files = [];
        $theme = new theme();
        $view = 'configdata_image/view';
        $set = get_view($name_type);
        $table_name = $set['table_name'];
        $folder_name = $set['folder_name'];
        $table_file_name = 'filename';

        $officer_type = $this->db->get('tb_officertype')->result_array();
        $filter = $this->db->get('tb_filter')->result_array();

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
        $data['site'] = site_url('catalog/save/' . $name_type . '/' . $id);
        $data['site_remove'] = site_url('file/remove/' . $name_type . '/');
        $data['officer_type'] = $officer_type;
        $data['filter'] = $filter;
        $data['set_data'] = $set_data;
        $data['files'] = $files;
        $data['folder_name'] = $folder_name;
        $theme->_loadmodules($view, $data);
    }

//    function resize_image($fileName, $width, $height) {
//        list($w, $h) = getimagesize($fileName);
//        /* calculate new image size with ratio */
//        $ratio = max($width/$w, $height/$h);
//        $h = ceil($height / $ratio);
//        $x = ($w - $width / $ratio) / 2;
//        $w = ceil($width / $ratio);
//        /* read binary data from image file */
//        $imgString = file_get_contents($fileName);
//        /* create image from string */
//        $image = imagecreatefromstring($imgString);
//        $tmp = imagecreatetruecolor($width, $height);
//        imagecopyresampled($tmp, $image,
//            0, 0,
//            $x, 0,
//            $width, $height,
//            $w, $h);
//        imagejpeg($tmp, $fileName, 50);
//        return $fileName;
//        /* cleanup memory */
//        imagedestroy($image);
//        imagedestroy($tmp);
//    }

    public function save($name_type, $id = null)
    {
        include 'myfnc.php';
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
            'detail1' => $_POST['detail'],
            'datepost' => ExpoldDate($_POST['datepost']),
            'ip' => $ip,
            'status' => isset($_POST['active']) ? 1 : 0,
            'department' => isset($_POST['department']) ? $_POST['department'] : 0,
            'img_filter' => $_POST['filter'],
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
                if(isset($_FILES['file_upload']['name']) && implode("",$_FILES['file_upload']['name'])!=""){
                    $uploads_dir = "../fileupload/$Dirfoder/"; // โฟลเดอร์สำหรับเก็บไฟล์
                    $totalFile = count($_FILES['file_upload']['name']); // จำนวน input file ทั้งหมด
                    for($i = 0; $i < $totalFile; $i++){ // วนลูปจัดการไฟล์แต่ละไฟล์
                        $tmpFile = $_FILES['file_upload']['tmp_name'][$i];
                        $fileName = $_FILES['file_upload']['name'][$i];  // เก็บชื่อไฟล์
                        if($fileName!=""){
                            $info = pathinfo($fileName);
//                            echo "<pre>";
//                            print_r($info);
//                            print_r($i);// ข้อมูลไฟล์
//                            print_r($fileName);
//                            print_r($tmpFile);
//                            print_r($resize);
//                            echo "</pre>";
                            $ext = $info['extension']; // เก็บค่านามสกุลไฟล์
//                            if($ext!='pdf') {
//                                $resize = $this->resize_image($_FILES["file_upload"]["tmp_name"][$i], 700 , 400);
//                            }

                            echo getimagesize($fileName);
                            $setFileName = time()."_".$i; // กำหนดชื่อไฟล์ใหม่
                            $fileName_new = $setFileName.".".$ext;
                            // echo $fileName." --  ".$fileName_new."<br>"; // ชื่อไฟล์ และชื่อไฟล์ใหม่
                            if(is_dir($uploads_dir)){
                                if(move_uploaded_file($tmpFile, $uploads_dir."/".$fileName_new)){
                                    //      echo $fileName_new." uploaded!!<br>"; // ชื่อไฟล์ที่อัพโหลดสำเร็จ
                                    /////////  เพิ่มคำสั่งอื่นๆ ตามต้องการ
                                    $sql = "INSERT INTO filename(id,tablename,masterid,filename) VALUES ('','" . $TableName . "','" . $masterid . "','".$fileName_new. "')";
                                    $result = rsQuery($sql);
                                }else{  echo "อัพโหลดไฟล์ล้มเหลว "; }
                            }else{   echo "ไม่มีโฟลเดอร์นี้ ".$uploads_dir; }
                        }
                    }
                }
            }
        }
        $site_return = site_url('catalog/view/' . $name_type . '/' . $masterid);
        if ($result) {
            echo '<script>alert(\'บันทึกสำเร็จ\');window.location.href = \'' . site_url('catalogs/' . $name_type) . '\'</script>';
        } else {
            echo '<script>alert(\'ผิดพลาด\');</script>';
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
            $limil = 10;
            $pageS = $page - 1;
            $offset = $limil * $pageS;
            $table_name = $set['table_name'];

            $data['data'] = $this->db->select('*')
                ->like('subject', $Search)
                ->order_by('datepost', 'DESC')
                ->order_by('no', 'DESC')
                ->limit($limil, $offset)
                ->get($table_name)
                ->result_array();
            $pageAll = $this->db->select('*')
                ->like('subject', $Search)
                ->get($table_name)
                ->num_rows();

            $data['page'] = ceil($pageAll / $limil);
            $data['site'] = site_url('catalog/detail/' . $name_type . '/');
            $data['site_view'] = site_url('catalog/view/' . $name_type . '/');
            $data['site_change'] = site_url('catalog/change/' . $name_type . '/' . $page . '/');
            $data['site_remove'] = site_url('catalog/remove/' . $name_type . '/' . $page . '/');
            $data['table_name'] = $table_name;
            $data['folder_name'] = $set['folder_name'];
            $data['pageNow'] = $page;
            $data['offset'] = $offset;
            $view = 'modules/configdata_image/detail';
            $this->load->view($view, $data);
        }
    }

    public function remove($name_type, $page, $id)
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

