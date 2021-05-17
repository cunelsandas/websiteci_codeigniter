<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 24/4/2561
 * Time: 14:18
 */

class Utility extends CI_Controller
{
    public function GetName()
    {
        if (isset($_POST['type'])) {
            if ($_POST['name'] != '') {
                $table_old = $this->db->query('SHOW TABLES LIKE \'' . $_POST['name'] . '\'')->result_array();
                $result = count($table_old) > 0 ? false : true;
            } else {
                $result = false;
            }
        } else {
            $directory = glob(FOLDERUPLOAD . '/*', GLOB_ONLYDIR);
            foreach ($directory as $dKey => $dVal) {
                $dirName = explode('//', $dVal)[1];
                $directories[] = $dirName;
            }
            $result = !in_array($_POST['name'], $directories) ? true : false;
        }
        return JsonEncode($result);
    }

    public function create_table()
    {
        $result = false;
        $sql = 'CREATE TABLE IF NOT EXISTS ' . $_POST['name'];
        $sql .= $this->db->select('create_table')->where('view_id', $_POST['type'])->get('set_view')->row('create_table');
        $result = $this->db->query($sql);
        return JsonEncode($result);
    }

    public function create_folder()
    {
        $result = false;
        $dir = FOLDERUPLOAD . $_POST['name'];
        if (!is_dir($dir)) {
            mkdir($dir, '0777', true);
            $result = true;
        }
        return JsonEncode($result);
    }
}