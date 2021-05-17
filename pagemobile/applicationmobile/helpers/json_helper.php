<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 13/1/2561
 * Time: 10:34
 */
function JsonEncode($data)
{
    header('Content-Type: application/json');
    echo json_encode($data);
}