<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penyakit_Model', 'pm');
    }

    public function index()
    {
        $data['penyakit'] = $this->pm->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('penyakit/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('penyakit/create');
            $this->load->view('templates/footer');
        } else {
            $penyakit = array(
                'id_pnykt' => $this->input->post('id_pnykt'),
                'nm_pnykt' => $this->input->post('nm_pnykt'),
                'kd_pnykt' => $this->input->post('kd_pnykt'),
                'jenis_pnykt' => $this->input->post('jenis_pnykt'),
            );

            $this->pm->insert($penyakit);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan!');
            redirect('penyakit');
        }
    }

    public function edit($id)
    {
        $data['penyakit'] = $this->pm->get_by_id($id);
        $this->form_validation->set_rules('nm_pnykt', 'Nama Penyakit', 'required');
        $this->form_validation->set_rules('kd_pnykt', 'Kandungan Penyakit', 'required');
        $this->form_validation->set_rules('jenis_pnykt', 'Jenis Penyakit', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('penyakit/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $penyakit = array(
                'nm_pnykt' => $this->input->post('nm_pnykt'),
                'kd_pnykt' => $this->input->post('kd_pnykt'),
                'jenis_pnykt' => $this->input->post('jenis_pnykt'),
            );

            $this->pm->update($penyakit, $id);
            $this->session->set_flashdata('message', 'Data berhasil diubah!');
            redirect('penyakit');
        }
    }

    public function delete($id)
    {
        $this->pm->delete($id);
        $this->session->set_flashdata('message', 'Data berhasil dihapus!');
        redirect('penyakit');
    }

    private function _rules()
    {
        $this->form_validation->set_rules('id_pnykt', 'Id Penyakit', 'required');
        $this->form_validation->set_rules('nm_pnykt', 'Nama Penyakit', 'required');
        $this->form_validation->set_rules('kd_pnykt', 'Kandungan Penyakit', 'required');
        $this->form_validation->set_rules('jenis_pnykt', 'Jenis Penyakit', 'required');
    }
}
