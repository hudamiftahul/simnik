<?php

class Tindakan_Model extends CI_Model
{

    public function get_all()
    {
        return $this->db->get('tb_tindakan')->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('tb_tindakan')->row_array();
    }

    public function insert($penyakit)
    {
        $this->db->insert('tb_tindakan', $penyakit);
    }

    public function update($penyakit, $id)
    {
        $this->db->update('tb_tindakan', $penyakit, ['id_tindakan' => $id]);
    }

    public function delete($id)
    {
        $this->db->delete('tb_tindakan', ['id_tindakan' => $id]);
    }
}
