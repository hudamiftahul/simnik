<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tindakan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tindakan_Model', 'pm');
    }

    public function index()
    {
        $data['tindakan'] = $this->pm->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('tindakan/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('tindakan/create');
            $this->load->view('templates/footer');
        } else {
            $tindakan = array(
                'id_tindakan' => $this->input->post('id_tindakan'),
                'nm_tindakan' => $this->input->post('nm_tindakan'),
                'kd_tindakan' => $this->input->post('kd_tindakan'),
                'tarifdlm_tindakan' => $this->input->post('tarifdlm_tindakan'),
                'tarifluar_tindakan' => $this->input->post('tarifluar_tindakan'),
            );

            $this->pm->insert($tindakan);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan!');
            redirect('tindakan');
        }
    }

    public function edit($id)
    {
        $data['tindakan'] = $this->pm->get_by_id($id);
        $this->form_validation->set_rules('nm_tindakan', 'Nama Tindakan', 'required');
        $this->form_validation->set_rules('kd_tindakan', 'Kandungan Tindakan', 'required');
        $this->form_validation->set_rules('tarifdlm_tindakan', 'Tarif Dalam Tindakan', 'required');
        $this->form_validation->set_rules('tarifluar_tindakan', 'Tarif Luar Tindakan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('tindakan/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $tindakan = array(
                'nm_tindakan' => $this->input->post('nm_tindakan'),
                'kd_tindakan' => $this->input->post('kd_tindakan'),
                'tarifdlm_tindakan' => $this->input->post('tarifdlm_tindakan'),
                'tarifluar_tindakan' => $this->input->post('tarifluar_tindakan'),
            );

            $this->pm->update($tindakan, $id);
            $this->session->set_flashdata('message', 'Data berhasil diubah!');
            redirect('tindakan');
        }
    }

    public function delete($id)
    {
        $this->pm->delete($id);
        $this->session->set_flashdata('message', 'Data berhasil dihapus!');
        redirect('tindakan');
    }

    private function _rules()
    {
        $this->form_validation->set_rules('id_tindakan', 'Id Tindakan', 'required');
        $this->form_validation->set_rules('nm_tindakan', 'Nama Tindakan', 'required');
        $this->form_validation->set_rules('kd_tindakan', 'Kandungan Tindakan', 'required');
        $this->form_validation->set_rules('tarifdlm_tindakan', 'Tarif Dalam Tindakan', 'required');
        $this->form_validation->set_rules('tarifluar_tindakan', 'Tarif Luar Tindakan', 'required');
    }
}
