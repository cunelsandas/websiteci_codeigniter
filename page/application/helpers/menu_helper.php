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
    return GetInstance()->db->select('*')->where('list_no !=', 0)->order_by('list_no')->get('set_group_menus')->result_array();
}

function GetMenus($id)
{
    $data = [];
    GetInstance()->db->select('*');
    GetInstance()->db->from('set_menus a');
    GetInstance()->db->join('set_group_menus b', 'a.group_id = b.group_id');
    GetInstance()->db->where('a.group_id', $id);
    $data = GetInstance()->db->get()->result_array();
    return $data;
}

/*function GetMenusSub($id)
{
    $data = [];
    GetInstance()->db->select('*');
    GetInstance()->db->from('set_menus a');
    GetInstance()->db->join('set_sub_menus b', 'a.menu_id = b.menu_id');
    GetInstance()->db->where('a.menu_id', $id);
    GetInstance()->db->where('b.list_no > ', 0);
    GetInstance()->db->order_by('b.list_no');
    $data = GetInstance()->db->get()->result_array();
    return $data;
}*/

function GetMenusSub($id)
{
    $data = [];
    $id = GetInstance()->db->escape($id);
    $sql = 'SELECT * FROM (SELECT b.controller,b.name_type,b.sub_name,b.list_no,\'\' AS type 
            FROM set_menus a INNER JOIN set_sub_menus b ON a.menu_id = b.menu_id 
            WHERE b.menu_id > 0 AND a.menu_id = ' . $id;
    $sql .= ' UNION SELECT \'officers\' as controller,\'office\' as name_type,b.office_type_name AS sub_name ,b.list_no, b.office_type_id AS type
              FROM set_menus a INNER JOIN set_office_type b ON a.menu_id = b.menu_id 
              WHERE a.menu_id = ' . $id;
    $sql .= ' UNION SELECT \'files\' as controller,\'file\' as name_type,b.file_type_name AS sub_name ,b.list_no, b.file_type_id AS type
              FROM set_menus a INNER JOIN set_file_type b ON a.menu_id = b.menu_id 
              WHERE a.menu_id = ' . $id;
    $sql .= ' ) AS a ORDER BY a.list_no';
    $data = GetInstance()->db->query($sql)->result_array();
    return $data;
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