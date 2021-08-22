<?php

class Lab_Model extends CI_Model
{

    public function get_all()
    {
        return $this->db->get('tb_lab')->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('tb_lab', ['id_lab' => $id])->row_array();
    }

    public function insert($lab)
    {
        $this->db->insert('tb_lab', $lab);
    }

    public function update($lab, $id)
    {
        $this->db->update('tb_lab', $lab, ['id_lab' => $id]);
    }

    public function delete($id)
    {
        $this->db->delete('tb_lab', ['id_lab' => $id]);
    }
}
