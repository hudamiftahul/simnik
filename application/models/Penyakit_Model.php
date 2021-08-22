<?php

class Penyakit_Model extends CI_Model
{

    public function get_all()
    {
        return $this->db->get('tb_pnykt')->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('tb_pnykt', ['id_pnykt' => $id])->row_array();
    }

    public function insert($penyakit)
    {
        $this->db->insert('tb_pnykt', $penyakit);
    }

    public function update($penyakit, $id)
    {
        $this->db->update('tb_pnykt', $penyakit, ['id_pnykt' => $id]);
    }

    public function delete($id)
    {
        $this->db->delete('tb_pnykt', ['id_pnykt' => $id]);
    }
}
