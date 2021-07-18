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
}
