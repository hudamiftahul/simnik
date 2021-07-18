<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{

    public function get_all()
    {
        $this->db->order_by('id_user', 'ASC');
        return $this->db->from('tb_user')
            ->join('tb_hak', 'tb_hak.id_hak=tb_user.id_hak')
            ->get()
            ->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->get('tb_user', ['id_user' => $id])->row_array();
    }

    public function get_hak()
    {
        return $this->db->get('tb_hak')->result_array();
    }

    public function insert($user)
    {
        $this->db->insert('tb_user', $user);
    }

    public function update($user, $id)
    {
        $this->db->update('tb_user', $user, ['id_user' => $id]);
    }

    public function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('tb_user');
    }
}
