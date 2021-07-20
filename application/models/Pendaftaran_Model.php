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

    public function get_by_id($id)
    {
        $this->db->order_by('id_dftr', 'ASC');
        $this->db->where('id_dftr', $id);
        return $this->db->from('tb_dftr')
            ->join('tb_pasien', 'tb_pasien.id_pasien=tb_dftr.id_pasien')
            ->get()
            ->row_array();
    }

    public function insert_dftr($pendaftaran)
    {
        $this->db->insert('tb_dftr', $pendaftaran);
    }

    public function insert_pasien($pasien)
    {
        $this->db->insert('tb_pasien', $pasien);
    }

    public function update_dftr($pendaftaran, $id)
    {
        $this->db->update('tb_dftr', $pendaftaran, ['id_dftr' => $id]);
    }

    public function update_pasien($pasien, $id_pasien)
    {
        $this->db->update('tb_pasien', $pasien, ['id_pasien' => $id_pasien]);
    }

    public function get_antrian()
    {
        $this->db->select('*');
        $this->db->where('MONTH(tgl_dftr)', date('m'));
        $this->db->where('YEAR(tgl_dftr)', date('Y'));
        $this->db->order_by('no_antrian', 'DESC');
        $this->db->limit(1);
        $query = $this->db->from('tb_dftr')->get();
        if ($query->num_rows() >= 1) {
            $data = $query->row_array();
            $nomor = (int)$data['no_antrian'] + 1;
        } else {
            $nomor = 1;
        }
        return sprintf('%03d', $nomor);
    }
}
