<?php

class Pendaftaran_Model extends CI_Model
{
    public function get_all()
    {
        $this->db->order_by('id_dftr', 'ASC');
        return $this->db->from('tb_dftr')
            ->join('tb_pasien', 'tb_pasien.id_pasien=tb_dftr.id_pasien')
            ->get()
            ->result_array();
    }

    public function insert_dftr($pendaftaran)
    {
        $this->db->insert('tb_dftr', $pendaftaran);
    }

    public function insert_pasien($pasien)
    {
        $this->db->insert('tb_pasien', $pasien);
    }
}
