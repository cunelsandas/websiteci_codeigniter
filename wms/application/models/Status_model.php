<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 21/2/2561
 * Time: 9:36
 */

class Status_model extends CI_Model
{
    public function Change_Status($id, $table, $data)
    {
        $this->db->trans_begin();
        $this->db->set($data);
        $this->db->where($id);
        $this->db->update($table);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }
}