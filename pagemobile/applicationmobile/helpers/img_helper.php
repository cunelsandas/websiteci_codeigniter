<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13/1/2561
 * Time: 10:35
 */

function CreateArrayFile($File, $FileName, $dri)
{
    $exfile = [];
    $i = 1;
    foreach ($File as $key => $value) {
        $time = microtime(true);
        $time = explode('.', $time);
        $time = $time[0] . '_' . $time[1];
        foreach ($value as $id => $item) {
            if ($item == 'name' && $exfile[$key]['name'] != '') {
                $exten = explode('.', $exfile[$key]['name']);
                $exfile[$key]['name'] = $FileName . $time . '.' . $exten[1];
                move_uploaded_file($exfile[$key]['tmp_name'], $dri . $exfile[$key]['name']);
            }
            $exfile[$key][$id] = $item;
        }
        $i++;
    }
    return $exfile;
}

function CreateArrayFileImg($File, $FileName, $dri)
{
    $time = microtime(true);
    $time = explode('.', $time);
    $time = $time[0] . '_' . $time[1];
    $exFile = [];
    foreach ($File as $key => $item) {
        if ($item != '') {
            $item = explode(',', $item);
            $data = base64_decode($item[1]);
            $exten = explode('.', $item[2])[1];
            $fileName = $FileName . $time . $key . '.' . $exten;
            $file = $dri . $fileName;
            $success = file_put_contents($file, $data);
            $exFile[$key]['name'] = $fileName;
        }
    }
    return $exFile;
}

function get_img($filename, $folder_name)
{
    if ($filename == '') {
        $filename = 'not_found';
    }
    echo site_url('get_file/fd_img/' . $filename . '/' . $folder_name);
}

function get_ul($filename, $folder_name)
{
    $ex = '';
    if ($filename == '') {
        $filename = 'not_found';
    } else {
        $ex = explode('.', $filename)[1];
    }
    if ($ex == 'pdf' || $ex == 'PDF') {
        echo site_url('get_file/fd_img/pdf.png');
    }
    elseif ($ex == 'doc' || $ex == 'docx' || $ex == 'DOC'|| $ex == 'DOCX'){
        echo site_url('get_file/fd_img/doc.png');
    }
    elseif ($ex == 'xls' || $ex == 'xlsx' || $ex == 'XLS' || $ex == 'XLSX'){
        echo site_url('get_file/fd_img/xls.png');
    }
    else {
        echo site_url('get_file/fd_ul/' . $filename . '/' . $folder_name);
    }

}

function get_pdf($filename, $folder_name)
{
    if ($filename == '') {
        $filename = 'not_found';
    }
    echo site_url('get_file/fd_ul/' . $filename . '/' . $folder_name);
}

function search_img($tablename, $masterid)
{
    $ob =& get_instance();
    $file = $ob->db->select('filename')->from('filename')->where('tablename', $tablename)->where('masterid', $masterid)->get()->result_array();
    return $file;
}

function search_img_one($tablename, $masterid)
{
    $ob =& get_instance();
    $file = $ob->db->select('filename')->from('filename')->where('tablename', $tablename)->where('masterid', $masterid)->order_by('id', 'RANDOM')->get()->row('filename');
    return $file;
}