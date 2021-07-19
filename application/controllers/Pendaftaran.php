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
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('pendaftaran/create');
            $this->load->view('templates/footer');
        } else {
            $pendaftaran = array(
                'id_user' => $this->input->post('id_user'),
                'id_hak' => $this->input->post('id_hak'),
                'nm_user' => $this->input->post('nama'),
                'pass_user' => md5($this->input->post('password')),
                'j_kel' => $this->input->post('jenis_kelamin'),
                'phone' => $this->input->post('phone')
            );

            $this->pm->insert($pendaftaran);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan!');
            redirect('pendaftaran');
        }
    }

    private function _rules()
    {
        $this->form_validation->set_rules('id_dftr', 'Id Daftar', 'required');
        $this->form_validation->set_rules('id_pasien', 'Id Pasien', 'required');
        $this->form_validation->set_rules('tgl_daftar', 'Tanggal Daftar', 'required');
        $this->form_validation->set_rules('umur', 'Umur', 'required');
        $this->form_validation->set_rules('jenis_pasien', 'Jenis Pasien', 'required');
        $this->form_validation->set_rules('poli_tujuan', 'Poli Tujuan', 'required');
    }
}
