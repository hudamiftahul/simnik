<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pendaftaran_Model', 'pm');
    }

    public function index()
    {
        $data['pendaftaran'] = $this->pm->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('pendaftaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['no_antrian'] = $this->pm->get_antrian();
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pendaftaran/create', $data);
            $this->load->view('templates/footer');
        } else {
            $pasienLama = $this->pm->get_by_rm($this->input->post('no_rm'));
            $pendaftaran = array(
                'id_dftr' => $this->input->post('id_dftr'),
                'id_pasien' => $this->input->post('id_pasien'),
                'no_antrian' => $this->input->post('no_antrian'),
                'tgl_dftr' => $this->input->post('tgl_dftr'),
                'umur' => $this->input->post('umur'),
                'jenis_pasien' => $this->input->post('jenis_pasien'),
                'poli_tujuan' => $this->input->post('poli_tujuan'),
            );
            $pasien = array(
                'id_pasien' => $this->input->post('id_pasien'),
                'id_user' => '001',
                'no_rm' => $this->input->post('no_rm'),
                'nm_pasien' => $this->input->post('nm_pasien'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lhr_pasien' => $this->input->post('tgl_lhr_pasien'),
                'kk_pasien' => $this->input->post('kk_pasien'),
                'j_kel_pasien' => $this->input->post('jenis_kelamin'),
                'almt_pasien' => $this->input->post('almt_pasien'),
                'kota_pasien' => $this->input->post('kota_pasien'),
                'kec_pasien' => $this->input->post('kec_pasien'),
                'desa_pasien' => $this->input->post('desa_pasien'),
                'pkjr_pasien' => $this->input->post('pkjr_pasien'),
            );

            if ($pasienLama == null) {
                $this->pm->insert_pasien($pasien);
                $this->pm->insert_dftr($pendaftaran);
            } else {
                $this->pm->insert_dftr($pendaftaran);
            }

            $this->session->set_flashdata('message', 'Data berhasil ditambahkan!');
            redirect('pendaftaran');
        }
    }

    public function edit($id)
    {
        $data['dftr'] = $this->pm->get_by_id($id);
        $data['tgl_dftr'] = date('Y-m-d', strtotime($data['dftr']['tgl_dftr'])) . 'T' . date('h:i', strtotime($data['dftr']['tgl_dftr']));
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pendaftaran/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $pendaftaran = array(
                'id_dftr' => $this->input->post('id_dftr'),
                'id_pasien' => $this->input->post('id_pasien'),
                'no_antrian' => $this->input->post('no_antrian'),
                'tgl_dftr' => $this->input->post('tgl_dftr'),
                'umur' => $this->input->post('umur'),
                'jenis_pasien' => $this->input->post('jenis_pasien'),
                'poli_tujuan' => $this->input->post('poli_tujuan'),
            );
            $pasien = array(
                'id_pasien' => $this->input->post('id_pasien'),
                'id_user' => '001',
                'no_rm' => $this->input->post('no_rm'),
                'nm_pasien' => $this->input->post('nm_pasien'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lhr_pasien' => $this->input->post('tgl_lhr_pasien'),
                'kk_pasien' => $this->input->post('kk_pasien'),
                'j_kel_pasien' => $this->input->post('jenis_kelamin'),
                'almt_pasien' => $this->input->post('almt_pasien'),
                'kota_pasien' => $this->input->post('kota_pasien'),
                'kec_pasien' => $this->input->post('kec_pasien'),
                'desa_pasien' => $this->input->post('desa_pasien'),
                'pkjr_pasien' => $this->input->post('pkjr_pasien'),
            );

            $this->pm->update_pasien($pasien, $this->input->post('id_pasien'));
            $this->pm->update_dftr($pendaftaran, $id);
            $this->session->set_flashdata('message', 'Data berhasil diubah!');
            redirect('pendaftaran');
        }
    }

    public function delete($id, $id_pasien)
    {
        $this->pm->delete_dftr($id);
        $this->pm->delete_pasien($id_pasien);
        $this->session->set_flashdata('message', 'Data berhasil dihapus!');
        redirect('pendaftaran');
    }

    public function getRM()
    {
        $no_rm = $this->input->get('no_rm');
        $pend = $this->pm->get_by_rm($no_rm);
        echo json_encode($pend);
    }

    private function _rules()
    {
        $this->form_validation->set_rules('id_dftr', 'Id Daftar', 'required');
        $this->form_validation->set_rules('id_pasien', 'Id Pasien', 'required');
        $this->form_validation->set_rules('tgl_dftr', 'Tanggal Daftar', 'required');
        $this->form_validation->set_rules('poli_tujuan', 'Poli Tujuan', 'required');
        $this->form_validation->set_rules('no_rm', 'No RM', 'required');
        $this->form_validation->set_rules('nm_pasien', 'Nama Pasien', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lhr_pasien', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('umur', 'Umur', 'required|numeric');
        $this->form_validation->set_rules('kk_pasien', 'Nama KK', 'required');
        $this->form_validation->set_rules('almt_pasien', 'Alamat', 'required');
        $this->form_validation->set_rules('kota_pasien', 'Kota', 'required');
        $this->form_validation->set_rules('kec_pasien', 'Kecamatan', 'required');
        $this->form_validation->set_rules('desa_pasien', 'Desa', 'required');
        $this->form_validation->set_rules('pkjr_pasien', 'Pekerjaan', 'required');
    }
}
