<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/2/2561
 * Time: 14:37
 */
function GetInstance()
{
    $ob =& get_instance();
    return $ob;
}

function GetGroupMenu()
{
    return GetInstance()->db->select('*')->get('tb_modtype')->result_array();
}

function GetMenuSub($type_id)
{
    $user_id = $_SESSION['user_id'];
    return GetInstance()->db->select('*')
        ->from('set_sub_menus a')
        ->join('set_permission b', 'b.sub_id = a.sub_id')
        ->where('a.type_id', $type_id)
        ->where('b.user_id', $user_id)
        ->order_by('a.list_no', 'ASC')
        ->get()->result_array();
}

function get_view($id)
{
    $id = GetInstance()->db->escape_str($id);
    $data = GetInstance()->db->select('*')->from('set_sub_menus a')->join('set_view b', 'a.view_id = b.view_id')->where('a.name_type', $id)->get()->row_array();
    if ($data) {
        return $data;
    } else {
        show_404(site_url('notfound'));
    }
}