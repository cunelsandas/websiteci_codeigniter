<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 21/2/2561
 * Time: 14:03
 */

class Permission_model extends CI_Model
{
    public function Insert($table, $data)
    {
        $this->db->trans_begin();
        $this->db->set($data);
        $this->db->insert($table);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function Update($table, $data, $id)
    {
        $this->db->trans_begin();
        $this->db->set($data);
        $this->db->where($id);
        $this->db->update($table);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function Delete($table, $id)
    {
        $this->db->trans_begin();
        $this->db->where($id);
        $this->db->delete($table);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
}