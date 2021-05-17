<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 19/2/2561
 * Time: 12:57
 */

class Users_model extends CI_Model
{
    public function CheckLogin($user, $pass)
    {
        $User = [];
        $pass = md5($pass);
        $this->db->select('userid AS user_id , nameuser AS name, username AS user_name');
        $this->db->from('tb_user');
        $this->db->where('username', $user);
        $this->db->where('pw', $pass);
        $User = $this->db->get()->row_array();
        return $User;
    }
}