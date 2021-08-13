<?php

class Obat_Model extends CI_Model
{

    public function get_all()
    {
        return $this->db->get('tb_obt')->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('tb_obt')->row_array();
    }

    public function insert($obat)
    {
        $this->db->insert('tb_obt', $obat);
    }

    public function update($obat, $id)
    {
        $this->db->update('tb_obt', $obat, ['id_obt' => $id]);
    }

    public function delete($id)
    {
        $this->db->delete('tb_obt', ['id_obt' => $id]);
    }
}
