<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13/3/2561
 * Time: 14:50
 */
class Get_file extends CI_Controller
{
    public function fd_img($FileName, $folder = null)
    {
        $Dri_file = $FileName;
        if ($folder != null) {
            $Dri_file = $folder . DIRECTORY_SEPARATOR . $FileName;
        }
        $image = FOLDERIMG . $Dri_file;
        if (file_exists($image)) {
            $extent = mime_content_type($image);
            header("Content-Type: $extent");
            header('Content-disposition: inline; filename="' . $FileName . '"');
        } else {
            header("Content-Type: image/jpeg");
            $image = FOLDERIMG . 'notfound.jpg';
        }
        readfile($image);
    }

    public function fd_ul($FileName, $folder = null)
    {
        $Dri_file = $FileName;
        if ($folder != null) {
            $Dri_file = $folder . DIRECTORY_SEPARATOR . $FileName;
        }
        $image = FOLDERUPLOAD . $Dri_file;
        if (file_exists($image)) {
            $extent = mime_content_type($image);
            header("Content-Type: $extent");
            header('Content-disposition: inline; filename="' . $FileName . '"');
        } else {
            header("Content-Type: image/jpeg");
            $image = FOLDERIMG . 'notfound.jpg';
        }
        readfile($image);
    }
}